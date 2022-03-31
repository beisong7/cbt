<?php

namespace App\Services\Candidate;

use App\Models\Assessment;
use App\Models\EngagedAnswer;
use App\Models\EngagedAssessment;
use App\Models\EngagedQuestion;
use App\Repository\Candidate\AssessmentRepository;
use App\Traits\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Matrix\Exception;

class AssessmentService extends AssessmentRepository
{
    use Utility;
    public function myAssessments(){

    }

    public function generateEngagedAssessment($assessment, $user){
        DB::beginTransaction();

        $engagedAssessment = new EngagedAssessment();
        $engagedAssessment->uuid = $this->generateId();
        $engagedAssessment->assessment_id = $assessment->uuid;
        $engagedAssessment->candidate_id = $user->uuid;
        $engagedAssessment->organization_id = $assessment->organization_id;
        $engagedAssessment->to_expire_at = !empty($assessment->expire_at)?$assessment->expire_at:null;
        $engagedAssessment->start_time = time();
        $engagedAssessment->resume_time = time();
        $engagedAssessment->last_update = time();
        $engagedAssessment->end_time =  !empty($assessment->duration)?time() + ($assessment->duration * 60):null;
        $engagedAssessment->completed = false;
        $engagedAssessment->active = true;
        $engagedAssessment->has_started = true;

        $engagedAssessment->save();

        //store the answers

        foreach ($assessment->randomQuestions as $question){
            $engagedQuestion = new EngagedQuestion();

            $engagedQuestion->uuid = $this->generateId();
            $engagedQuestion->engaged_assessment_id = $engagedAssessment->uuid;
            $engagedQuestion->question = $question->question;
            $engagedQuestion->resource_id = null;
            $engagedQuestion->minutes_expected = $question->minutes_expected;
            $engagedQuestion->seen = false;
            $engagedQuestion->seen_time = null;
            $engagedQuestion->answered = null;
            $engagedQuestion->answered_time = null;
            $engagedQuestion->answer_input = $question->answer_input;
            $engagedQuestion->save();

            foreach ($question->randomAnswers as $answer){
                $engagedAnswer = new EngagedAnswer();
                $engagedAnswer->uuid = $this->generateId();
                $engagedAnswer->engaged_assessment_id = $engagedAssessment->uuid;
                $engagedAnswer->engaged_question_id = $engagedQuestion->uuid;
                $engagedAnswer->answer = $answer->answer;
                $engagedAnswer->correct = $answer->correct;
                $engagedAnswer->save();
            }
        }

        DB::commit();

        return $engagedAssessment;
    }

    public function ongoingEngagedUpdate($assessment_id, $question_id, $answer_id){
        DB::beginTransaction();
        $status = false;
        //todo -validate that the user still has access
        $enAssessment = EngagedAssessment::where('uuid', $assessment_id)->first();
        if(!empty($enAssessment)){

            $enQuestion = $enAssessment->questionID($question_id);

            if(!empty($enQuestion)){

                $enAnswer = $enQuestion->answerID($answer_id);
                if(!empty($enAnswer)){
                    //update all required fields
                    $enAnswer->selected = true;
                    $enAnswer->update();
                    $status = true;
                }

                $enQuestion->seen = true;
                $enQuestion->seen_time = time();
                $enQuestion->answered = true;
                $enQuestion->answered_time = time();
                $enQuestion->update();
            }

            $enAssessment->last_update = time();
            $enAssessment->update();
            $status = true;

        }
        DB::commit();
        return $status;
    }

    public function signofAssessment($user, $enAssessment, $answers){
        DB::beginTransaction();



//        return $answers;

        if(!empty($enAssessment)){
            $allQuestions = $enAssessment->assessment->allowedQuestionCount;
            $correct = 0;
            $canswers = array();


            //invalidate all existing questions
            foreach ($enAssessment->answers as $answer){
                $answer->selected = false;
                $answer->value = null;
                $answer->update();
            }




            foreach ($answers as $objects){
                $question_id = $objects[0];
                $answer_id = $objects[1];

                $enQuestion = $enAssessment->questionID($question_id);

                if(!empty($enQuestion)){
                    $enAnswer = $enQuestion->answerID($answer_id);

                    if(!empty($enAnswer)){
                        //update all required fields
                        if($enAnswer->correct){
                            $correct += 1;
                        }

                        array_push($canswers, $enAnswer);
                        $enAnswer->selected = true;
                        $enAnswer->update();
                    }

                    $enQuestion->seen = true;
                    $enQuestion->seen_time = empty($enQuestion->seen_time)?time():$enQuestion->seen_time;
                    $enQuestion->answered = true;
                    $enQuestion->answered_time = time();
                    $enQuestion->update();

                    $enAssessment->last_update = time();
                    $enAssessment->update();
                }
            }

            $questionAnswered = EngagedQuestion::where('engaged_assessment_id', $enAssessment->uuid)->where('answered', true)->get();

            $enAssessment->last_update = time();
            $enAssessment->end_time = time();
            $enAssessment->completed = true;
            $enAssessment->score = number_format((($correct/$allQuestions) * 100), 1);
            $enAssessment->questions_answered = $questionAnswered->count();
            $enAssessment->update();
        }


        DB::commit();
    }

    public function oneCompletedAssessment($secret){
        try{

            $uuid = decrypt($secret);

            $enAssessment = $this->engagedAssessment($uuid);
            if($enAssessment->assessment->allow_review){

                return view('candidate.pages.assessment.review_engaged')->with(['engaged'=>$enAssessment]);
            }
            return back()->withErrors(['Review not allowed by sponsor']);
        }catch (\Exception $e){
            return back()->withErrors(['Unable to get data : '.$e->getMessage()]);
        }

    }

}