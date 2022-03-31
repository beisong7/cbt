<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Logic\Assessment;
use App\Models\Question;
use App\Services\Assessment\UploadServices;
use App\Services\Organization\AssessmentServices;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{

    private $assessment, $uploadServices, $assessmentServices;
    function __construct(Assessment $assessment, UploadServices $uploadServices, AssessmentServices $services)
    {
        $this->assessment = $assessment;
        $this->uploadServices = $uploadServices;
        $this->assessmentServices = $services;
    }

    //
    public function index(Request $request, $state){

        $user = $request->user('staff');
        if($state==='draft'){
            $assessments = $this->assessment->getSelectWhere($user,["published"=>false], ['title','type', 'created_at','published', 'uuid']);
        }elseif ($state==='published'){
            $assessments = $this->assessment->getSelectWhere($user, ["published"=>true], ['title','type', 'created_at','published', 'uuid']);
        }else{
            $assessments = $this->assessment->getSelect($user, ['title','type', 'created_at','published', 'uuid']);
        }


        return view('organization.pages.assessment.index')->with(['assessments'=>$assessments, 'state'=>$state]);
    }

    public function create(Request $request){
        //check if user has a current assessment set
        //check if user has privilege to create assessment
        //use gates to achieve this

        $user = $request->user('staff');

        if($user->who > 3){
            return view('organization.pages.assessment.create');
        }
        return redirect()->route('staff.dashboard');

    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string|unique:assessments',
            'type' => 'required|string',
        ]);

        //the validate New Request does additional checks and creates the assessment
        return $this->assessment->validateNewRequest($request);
    }

    public function show(Request $request, $uuid){
        //todo validate (gates)

        try{

            $uuid = decrypt($uuid);

            $user = $request->user('staff');
            $assessment = $this->assessment->first($uuid);

            if($user->who > 3){
                return view('organization.pages.assessment.manage')->with(['assessment'=>$assessment, 'state'=>$assessment->published?'published':'draft']);
            }

            return redirect()->route('staff.dashboard');

        }catch (\Exception $e){

            return redirect()->route('staff.dashboard');

        }

    }

    public function edit(Request $request, $uuid){
        //todo validate (gates)

        try{

            $uuid = decrypt($uuid);

            $user = $request->user('staff');
            $assessment = $this->assessment->first($uuid);

            $state = $assessment->published?'published':'draft';

            if($user->who > 3){
                return view('organization.pages.assessment.edit')->with(['assessment'=>$assessment, 'state'=>$state]);
            }

            return redirect()->route('staff.dashboard');

        }catch (\Exception $e){

            return redirect()->route('staff.dashboard');

        }

    }

    public function updateAssessment(Request $request, $uuid){

        //na here we dey ooo

        return back()->withMessage('Assessment Updated.');
    }

    public function saveQuestion(Request $request, $uuid){

        $request->validate([
            'question' => 'required',
            'ans_input' => 'required',
        ]);

        $assessment = $this->assessment->first($uuid);

        if(empty($assessment)){
            return back()->withErrors(['Assessment Not valid']);
        }

        if($assessment->published){
            return back()->withErrors(['Assessment Published. Un-publish Assessment and try again']);
        }



        return $this->assessment->saveAssessmentQuestion($request, $uuid);

    }

    public function saveBulkQuestion(Request $request, $assessment_id){

        if ($request->hasFile('excel')) {
            $excel = $request->file('excel');

            return $this->uploadServices->uploadExcel($excel, $assessment_id);

        }

        return back()->withMessage('No file found');
    }

    public function publish(Request $request){
        $user = $request->user('staff');
        $user_id = $request->input('id');
        $assessment_id = $request->input('key');
        $type = $request->input('type');
        if(!empty($type)){
            try{
                $user_id = decrypt($user_id);
                $assessment_id = decrypt($assessment_id);

                if($user->uuid === $user_id){
                    $assessment = $this->assessment->first($assessment_id);

                    if(!empty($assessment)){
                        //check questions

                        if(!empty($assessment->questions_allotted)){
                            if($assessment->questions->count() < $assessment->questions_allotted){
                                return response()->json([
                                    'success'=>false,
                                    'message'=>"Insufficient Questions. Add more questions to assessment or reduce the allocated questions",
                                ]);
                            }
                        }
                        $msg = "";
                        if($type==='yes'){
                            $assessment->published = true;
                            $assessment->publish_time = time();
                            $assessment->update();
                            $msg = 'Assessment Published Successfully';
                        }else{
                            $assessment->published = false;
                            $assessment->publish_time = time();
                            $assessment->update();
                            $msg = 'Assessment Un-Published';
                        }


                        return response()->json([
                            'success'=>true,
                            'message'=>$msg,
                        ]);
                    }

                    return response()->json([
                        'success'=>false,
                        'message'=>"Unable to validate user",
                    ]);
                }

                return response()->json([
                    'success'=>false,
                    'message'=>"Unable to validate user",
                ]);
            }catch (\Exception $e){
                return response()->json([
                    'success'=>false,
                    'message'=>"Failed. Contact support : ".$e->getMessage()
                ]);
            }
        }

        return response()->json([
            'success'=>false,
            'message'=>"Failed. Action not understood"
        ]);


    }

    public function engaged(Request $request){

        $user = $request->user('staff');

        $assessments = $this->assessmentServices->getEngaged($user, ['title','type', 'created_at','published', 'uuid', 'global_name']);

//        return $assessments;

        return view('organization.pages.assessment.engagement')->with(['assessments'=>$assessments]);
    }

    public function submissions($uuid){

        $assessment = $this->assessment->first($uuid);

        if(empty($assessment)){
            return back()->withErrors(['Resource not Found']);
        }

        $candidates = $this->assessmentServices->getSuccessfulCandidates($assessment);

        return view('organization.pages.assessment.submissions')->with([
            'candidates'=>$candidates,
            'assessment'=>$assessment
        ]);
    }

    public function removeQuestion(Request $request, $uuid){
        //find and remove question and options for this
        $status = $this->assessment->deleteQnA($uuid);
        return response()->json(['success'=>$status]);
    }

    public function editQuestion($uuid){
        $data = Question::where('uuid', $uuid)->with('answers')->first();
        if(!empty($data)){
            return response()->json(['data'=>$data, 'success'=>true]);
        }
        return response()->json(['success'=>false]);
    }

    public function updateQuestion(Request $request){
//        return $request->all();
        $question_id = $request->input('uuid');
        $payload = $request->input('payload');

        return $this->assessment->handleUpdate($question_id, $payload);

    }

    public function reveal($key, $uuid){

        //title
        $assessment = $this->assessment->first($uuid);

        if($key==='pending'){

            $assessments = $this->assessmentServices->incompletedAssessments($uuid, null, 20, ['id', 'desc']);
            return view('organization.pages.assessment.engagement_pending')->with(['engaged'=>$assessments, 'subject'=> $assessment->title]);
        }elseif ($key==='completed'){

            $assessments = $this->assessmentServices->completedAssessments($uuid, null, 20, ['id', 'desc']);
            return view('organization.pages.assessment.engagement_completed')->with(['engaged'=>$assessments, 'subject'=> $assessment->title]);
        }else{
            return back();
        }
    }


    public function preview(Request $request, $uuid){
        //todo validate (gates)

        try{

            $uuid = decrypt($uuid);

            $user = $request->user('staff');
            $assessment = $this->assessment->first($uuid);

            $state = $assessment->published?'published':'draft';

            if($user->who > 3){
                return view('organization.pages.assessment.preview')->with(['assessment'=>$assessment, 'state'=>$state]);
            }

            return redirect()->route('staff.dashboard');

        }catch (\Exception $e){

            return redirect()->route('staff.dashboard');

        }

    }

    public function sharedLinkToggle(Request $request){
        return $this->assessmentServices->handleSharedLinkAction($request);
    }

}
