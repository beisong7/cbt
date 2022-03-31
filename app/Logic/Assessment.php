<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 14/05/2020
 * Time: 11:06 AM
 */

namespace App\Logic;
use App\Models\Answer;
use App\Models\Assessment as Assessments;
use App\Models\Question;
use App\Traits\Utility;
use Illuminate\Http\Request;


class Assessment
{

    use Utility;


    /**
     * @param null $selection = Array
     * @param null $page = Integer
     * @return mixed
     */
    public function get($page=null){
        $query = Assessments::class;

        if(!empty($page)){
            return $query::paginate($page);
        }

        return $query::get();
    }

    public function getSelect($user, $selection, $page=null){

        $org = $user->currentOrganization;
        if(empty($org)){return [];}

        $query = Assessments::class;

        $query = $query::where('organization_id', $org->uuid)->select($selection);

        if(!empty($page)){
            return $query->paginate($page);
        }

        return $query->get();
    }

    public function getSelectWhere($user, $whereArray, $selection, $page=null){
        $org = $user->currentOrganization;
        if(empty($org)){return [];}

        $query = Assessments::class;

        $query = $query::where('organization_id', $org->uuid)->select($selection);

        foreach ($whereArray as $key=>$val){
            $query->where($key, $val);
        }

        if(!empty($page)){
            return $query->paginate($page);
        }

        return $query->get();
    }

    public function first($uuid){
        $query = Assessments::class;

        return $query::where('uuid', $uuid)->first();
    }

    public function firstSelect($uuid, $selection){
        $query = Assessments::class;

        $query = $query::select($selection);

        return $query->where('uuid', $uuid)->first();
    }



    public function validateNewRequest(Request $request){
        //

        $valid = true;
        $errors = array();

        $duration = null;
        $active_from = null;
        $expire_at = null;
        $mode = "";
        $pass_percent = $request->input('pass_percent');

        if(intval($pass_percent)>100){
            $valid = false;
            array_push($errors, ['Pass Score'=>'Percentage value less than or equal to 100 Required.']);
        }

        if($request->input('timed')){
            if(empty($request->input('timed_value'))){
                $valid = false;
                array_push($errors, ['timed'=>'You forgot to fill this field']);
            }else{
                $duration = intval($request->input('timed_value'));
                if($duration < 6){
                    array_push($errors, ['Duration'=>'Cannot be less than 5 minutes']);
                    $valid = false;
                }else{
                    $mode .= "timed ";
                }
            }
        }

        if($request->input('entry')){
            if(empty($request->input('entry_value'))){
                $valid = false;
                array_push($errors, ['entry'=>'You forgot to fill this field.']);
            }else{
                $active_from = strtotime($request->input('entry_value'));
                $mode .= "entry ";
            }
        }

        if($request->input('expiry')){
            if(empty($request->input('expiry_value'))){
                $valid = false;
                array_push($errors, ['expiry'=>'You forgot to fill this field']);
            }else{
                $mode .= "expiry ";
                $expire_at = strtotime($request->input('expiry_value'));
            }
        }

        if($request->input('entry') and $request->input('expiry')){
            if(!empty($request->input('entry_value')) and !empty($request->input('expiry_value'))){
                $entry = strtotime($request->input('entry_value'));
                $expiry = strtotime($request->input('expiry_value'));

                if($entry > $expiry){
                    $valid = false;
                    if(!empty($errors['entry'])){
                        $errors['entry'] .=' Your entry date cannot come after expiry date';
                    }else{
                        array_push($errors, ['entry'=>'Your entry date cannot come after expiry date']);
                    }
                }
            }
        }

        if(!$valid){
            return back()->withErrors($errors)->withInput($request->input());
        }

        return $this->saveNewAssessment($request, $mode, $duration, $active_from, $expire_at);
    }

    public function saveNewAssessment(Request $request, $mode, $duration=null, $active_from=null, $expire_at=null){

        $user = $request->user('staff');

        //check if user has a default organization using its joint (organizationStaff model)
        if(empty($user->joint)){
            return redirect()->route('staff.dashboard')->withMessage('Kindly set one organization as default.');
        }

        $imgurl = "";
        if ($request->hasFile('image')) {
            $imageData = $request->file('image');
            $uploadResponse = $this->uploadImage($imageData, "organization/assessment/image");

            if($uploadResponse[0]){
                $imgurl = $uploadResponse[1];
            }else{
                return back()->withErrors(['image'=>$uploadResponse[1]])->withInput($request->input());
            }
        }

        $assessment = new Assessments();
        $assessment->uuid = $this->generateId();
        $assessment->organization_id = $user->joint->organization_id;
        $assessment->title = $request->input('title');
        $assessment->instructions = $request->input('instructions');
        $assessment->introduction = $request->input('introduction');
        $assessment->global_name = $request->input('global_name');
        $assessment->attempts_allowed = $request->input('attempts_allowed');
        $assessment->questions_allotted = $request->input('questions_allotted');
        $assessment->show_score = $request->input('show_score')==="on"?true:false;
        $assessment->allow_review = $request->input('allow_review')==="on"?true:false;
        $assessment->photo = $imgurl;
        $assessment->pass_percent = $request->input('pass_percent');
        $assessment->mode = $mode;
        $assessment->duration = $duration;
        $assessment->active_from = $active_from;
        $assessment->expire_at = $expire_at;
        $assessment->type = $request->input('type');
        $assessment->published = false;
        $assessment->active = true;

        $assessment->save();

        return redirect()->route('organization.assessment.show', $assessment->uuid)->withMessage('Assessment Created. You can include question via excel or add it manually.');
    }

    public function saveAssessmentQuestion(Request $request, $assessment_id){

        $question_id = $this->generateId();
        $question = new Question();
        $question->uuid = $question_id;
        $question->assessment_id = $assessment_id;
        $question->question = $request->input('question');
        $question->answer_input = $request->input('ans_input');

        //ensure there is a correct answer selected before submitting
        $none_right = true;
        foreach ($request->input('item_answer_is_correct') as $key=>$val){
            if($val==='yes'){
                $none_right = false;
            }
        }

        if($none_right){
            return back()->withErrors(['No correct answer selected'])->withInput();
        }

        //saving later will cause answers save to fail because of the cascade keys
        $question->save();

        $answer_items = $request->input('item_answer_is_correct');
        foreach ($request->input('item_answer_option') as $key=>$val){
            $answer = new Answer();
            $answer->uuid = $this->generateId();
            $answer->assessment_id = $assessment_id;
            $answer->question_id = $question_id;
            $answer->answer = $val;
            $answer->correct = $answer_items[$key]==="yes"?true:false;
            $answer->save();
        }

//        $question->save(); // as explained above



        return back()->withMessage('Question Added to Assessment');
    }

    public function getEngagedAssessment($user){
        $org = $user->currentOrganization;
        if(empty($org)){return [];}

        return [];
    }

    public function deleteQnA($uuid){
        $question = Question::where('uuid', $uuid)->first();
//        return $question;
        if(!empty($question)){
            $question->delete();
            return true;
        }
        return false;
    }

    public function handleUpdate($uuid, $data){
        $question = Question::where('uuid', $uuid)->first();

        if(!empty($question)){
            if(!empty($question->assessment)){
                if(!$question->assessment->published){
                    try{
                        $answers = $data['answers'];
                        $deletes = null;
                        if(!empty($data['deletedAnswers'])){
                            $deletes = $data['deletedAnswers'];
                        }

                        $this->updateAnswers($question, $answers, $deletes);

                        $questionData = $data['question'];
                        $this->updateQuestion($question, $questionData);

                        $res = Question::where('uuid', $uuid)->where('assessment_id', $question->assessment->uuid)->with('answers')->first();
                        return response()->json(['success'=> true, 'data'=>$res]);
                    }catch (\Exception $e){
                        return response()->json(['success'=>false, 'message'=>'Failed to Update. Contact support: '.$e->getMessage()]);
                    }

                }
                return response()->json(['success'=>false, 'message'=>'This assessment is already published. Un-publish and try again']);
            }

        }

        return response()->json(['success'=>false, 'message'=>'question is outdated. refresh and try again']);
    }

    public function updateQuestion($question, $questionData){
        $question->question = $questionData['question'];
        $question->update();
    }
    public function updateAnswers($question, $answers, $deletedAnswers=null){
//        return $answers;
        foreach ($answers as $item){
            //find answer
            $uuid= $item['uuid'];
            if(!empty($uuid)){
                $answer = Answer::where('question_id', $question->uuid)->where('uuid', $uuid)->first();
                if(!empty($answer)){
                    $answer->answer = $item['answer'];
                    $answer->correct = $item['correct']==='true'?true:false;
                    $answer->update();
                }
            }else{
                //create new answer option
                $answer = new Answer();
                $answer->uuid = $this->generateId();
                $answer->assessment_id = $question->assessment->uuid;
                $answer->question_id = $question->uuid;
                $answer->answer = $item['answer'];
                $answer->correct = $item['correct']==='true'?true:false;
                $answer->save();
            }
        }

        if(!empty($deletedAnswers)){
            foreach ($deletedAnswers as $uuid){
                $answer = Answer::where('question_id', $question->uuid)->where('uuid', $uuid)->first();
                if(!empty($answer)){
                    $answer->delete();
                }
            }
        }
    }

}