<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\EngagedAssessment;
use Illuminate\Http\Request;
use App\Services\Candidate\AssessmentService;

class AssessmentController extends Controller
{
    private $service;
    function __construct(AssessmentService $service)
    {
        $this->service = $service;
    }

    //
    public function engaged(Request $request){

        $user = $request->user('web');

        $assessments = EngagedAssessment::where('candidate_id', $user->uuid)->orderBy('last_update', 'desc')->paginate(20);

        return view('candidate.pages.assessment.engaged')->with('engages', $assessments);
    }

    public function available(Request $request){
        $assessments = Assessment::where('type', 'public')->where('published', true)->where('active', true)->paginate(20);
        return view('candidate.pages.assessment.available')->with('assessments', $assessments);
    }

    public function previewAssessment($secret){
        try{
            $uuid = decrypt($secret);
            $assessment = Assessment::where('published', true)->where('active', true)->where('uuid', $uuid)->first();

//            return $assessment;

            return !empty($assessment)?view('candidate.pages.assessment.preview')->with('assessment', $assessment): redirect()->route('candidate.available.assessments');

        }catch (\Exception $e){

            return redirect()->route('candidate.available.assessments');

        }

    }

    public function takeAssessment(Request $request){
        $candidate_id = $request->input('id');
        $assessment_id = $request->input('key');
        $user = $request->user('web');
        try{
            $candidate_id = decrypt($candidate_id);
            $assessment_id = decrypt($assessment_id);
            if($user->uuid!==$candidate_id){
                return redirect()->route('candidate.available.assessments');
            }
            $assessment = Assessment::where('published', true)->where('active', true)->where('uuid', $assessment_id)->first();

            //check for open assessment
            $maybeOpen = EngagedAssessment::where('assessment_id', $assessment->uuid)->where('completed', false)->where('has_started', true)->first();

            if(!empty($maybeOpen)){
                //return to resume page
                return redirect()->route('candidate.assessments.resume', encrypt($maybeOpen->uuid))->withMessage('Sorry! it appears you still have an open assessment.');
            }

            return !empty($assessment)?view('candidate.pages.assessment.start')->with('assessment', $assessment): redirect()->route('candidate.available.assessments');

        }catch (\Exception $e){

            return redirect()->route('candidate.available.assessments');

        }

    }

    public function beginAssessment(Request $request)
    {
        $candidate_id = $request->input('id');
        $assessment_id = $request->input('key');
        $user = $request->user('web');
        try {

            //try decryption
            $candidate_id = decrypt($candidate_id);
            $assessment_id = decrypt($assessment_id);
            if ($user->uuid !== $candidate_id) {
                return redirect()->route('candidate.available.assessments');
            }

            $assessment = Assessment::where('published', true)->where('active', true)->where('uuid', $assessment_id)->first();

            if (!empty($assessment)) {
                // check if assessment has started.

                //check assessment attempts before generating
                if($user->attempted($assessment->uuid) < $assessment->attempts_allowed ){

                    //generate questions
                    $engagedAssessment = $this->service->generateEngagedAssessment($assessment, $user);


                    return response()->json([
                        'data' =>$engagedAssessment->randomQuestionAnswers,
                        'engagedID' => $engagedAssessment->uuid,
                        'success' => true,
                        'end_time' => !empty($assessment->duration)?$assessment->duration:null,
                        'message' => "Your $assessment->globalTitle has started!",
                    ]);

                }else{

                    return response()->json([
                        'success' => false,
                        'message' => "You cannot attempt this ".$assessment->globalTitle . " more than ". $assessment->attempts_allowed. " times.",
                    ]);

                }

            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Examination May have Expired.",
                ]);
            }

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);

        }
    }



    public function getOneQuestion(Request $request){

    }

    public function updateOngoingEngaged(Request $request){
        $assessment_id = $request->input('key');
        try {

            $question_id = $request->input('question_id');
            $answer_id = $request->input('answer_id');

            $seen = $this->service->ongoingEngagedUpdate($assessment_id, $question_id, $answer_id);

            return response()->json([
                'message'=>$seen,
                'id'=>$assessment_id
            ]);

        }catch (\Exception $e){
            return response()->json(['message'=>"error"], 500);
        }
    }

    public function submitOngoingEngaged(Request $request){

        $data = $request->all();

        $answers = array();
        foreach ($data as $question_id=>$answer_id){
            if($question_id!=="_token"&&$question_id!=="user_id"&&$question_id!=="key"){
                array_push($answers, [$question_id, $answer_id]);
            }
        }

        $user = $request->user('web');

        $user_id = $request->input('user_id');
        $assessment_id = $request->input('key');
        $user = $request->user('web');
        try {
            $user_id = decrypt($user_id);

            $enAssessment = $this->service->engagedAssessment($assessment_id);
//            return $enAssessment;
            if($user_id===$user->uuid){
                $this->service->signofAssessment($user, $enAssessment, $answers);
                return redirect()->route('candidate.engaged.assessments')->withMessage('Assessment Submitted Successfully');
            }else{
                return redirect()->route('candidate.engaged.assessments');
            }

        }catch (\Exception $e){
            return back()->withMessage('unable to submit form. | '.$e->getMessage());
        }
    }

    public function review(Request $request, $uuid){
        $user = $request->user('web');
        $enAssessment = EngagedAssessment::where('uuid', $uuid)->where('candidate_id',$user->uuid)->first();

        return !empty($enAssessment)?view('')->with($enAssessment):back();
    }

    public function resume(Request $request, $uuid){

        $user = $request->user('web');
        try{
            $assessment_id = decrypt($uuid);

            $assessment = EngagedAssessment::where('completed', false)->where('active', true)->where('uuid', $assessment_id)->where('candidate_id', $user->uuid)->first();

            return !empty($assessment)?view('candidate.pages.assessment.resume')->with('engagedAssessment', $assessment): redirect()->route('candidate.engaged.assessments');

        }catch (\Exception $e){

            return redirect()->route('user.dashboard');

        }

    }

    public function resumeAssessment(Request $request)
    {
        $candidate_id = $request->input('id');
        $assessment_id = $request->input('key');
        $user = $request->user('web');
        try {

            //try decryption
            $candidate_id = decrypt($candidate_id);
            $assessment_id = decrypt($assessment_id);
            if ($user->uuid !== $candidate_id) {
                return redirect()->route('candidate.available.assessments');
            }

            $engagedAssessment = EngagedAssessment::where('completed', false)->where('active', true)->where('uuid', $assessment_id)->first();

            $secondsLeft = $engagedAssessment->secondsLeft;
            if($secondsLeft > 0){
                if(!empty($engagedAssessment)){
                    $engagedAssessment->resume_time = time();
                    $engagedAssessment->last_update = time();
                    $engagedAssessment->seconds_remaining = $secondsLeft+5;
                    $engagedAssessment->update();
                    return response()->json([
                        'data' =>$engagedAssessment->randomQuestionAnswers,
                        'engagedID' => $engagedAssessment->uuid,
                        'success' => true,
                        'end_time' => !empty($secondsLeft)?$secondsLeft:null,
                        'message' => "Your ".$engagedAssessment->assessment->globalTitle." has resumed!",
                    ]);

                }
            }

            return response()->json([
                'success' => false,
                'message' => "Examination May have Expired.",
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);

        }
    }



}
