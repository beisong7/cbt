<?php

namespace App\Services\Assessment;


use App\Models\Answer;
use App\Models\Question;
use App\Traits\Utility;
use Illuminate\Support\Facades\DB;

class BulkQuestionUpload
{
    use Utility;
    protected $headings = array();
    protected $qstConfig = array();
    protected $status = true;
    public function operation($data, $assessment_id){

        //check header
        $line = 0;

        foreach ($data as $row){

            if($this->status){
                if($line < 1){
                    //process heading
                    $this->heading($row);

                }else{

                    //process question and answers
                    $this->body($row, $assessment_id);

                }
            }else{
                break;
            }



            $line++;
        }

//        dd($this->status);
        return $this->status;


//        return $data;
    }

    private function heading($data){
        $this->headings['items'] = count($data);
        $this->headings['factors'] = array();
        $hasQuestion = false;
        $hasOptions = false;
        $hasAnswer = false;
        $answerCount = 0;
        $optionCount = 0;

        foreach ($data as $pos=>$item){

            if(strtolower($item)==='question'){
                $hasQuestion = true;
                $this->qstConfig['questionPosition'] = $pos;
            }
            if(strpos(strtolower($item), 'option') !== false){
                $hasOptions = true;
                $optionCount++;
            }
            if(strtolower($item)==='answer'){
                $hasAnswer = true;
                $answerCount++;
                $this->qstConfig['answerPosition'] = $pos;
            }
            array_push($this->headings['factors'], $item);
        }

        $this->headings['answerCount'] = $answerCount;
        $this->headings['optionCount'] = $optionCount;


        if($hasAnswer && $hasOptions && $hasQuestion && $answerCount > 0 && $optionCount > 1){
        }else{
            $this->status = false;
        }
//        dd($this->headings);
//        dd($this->qstConfig);

    }

    private function body($data, $assessment_id){

        //refactor
        $newData = $this->refactorItems($data);


        $hasQuestion = false;
        $hasOptions = false;
        $hasAnswer = false;
        $settings = [
            'items'=>0,
            'answer'=>'',
            'options'=>[],
            'question'=>'',
            'answer_input'=>'radio'
        ];

        $settings['items'] = count($data);


        $answers = 0;
        foreach ($newData as $key=>$val){
//                dd($key);
            //get the question
            if($key==='question'){

                $hasQuestion = !empty($val)?true:false;
                $settings['question'] = $val;

            }elseif($key==='answer'){

                $hasAnswer = !empty($val)?true:false;
                $settings['answer'] = $val;

            }else{

                $answers++;
                $correctAnswer = strtolower($newData['answer'])=== strtolower($key)?true:false;

                array_push($settings['options'], ['detail'=>$val, 'answer'=>$correctAnswer]);

            }
        }



        if($answers >1 && $hasAnswer && $hasQuestion){
//            dd($settings);
            DB::beginTransaction(); //open saving

            $this->saveQuestion($assessment_id, $settings);

            DB::commit(); // confirm or ignore saving
        }else{
            //skip
            // dd('skipping');
        }

    }

    private function refactorItems($data){

        $newData = array();
        foreach ($this->headings['factors'] as $key=>$value){
            $newData[strtolower($value)] = $data[$key];
        }
        // dd($newData);
        return $newData;
    }

    private function saveQuestion($assessment_id, $data){

//        dd($data);
        $question_id = $this->generateId();
        $question = new Question();
        $question->uuid = $question_id;
        $question->assessment_id = $assessment_id;
        $question->question = $data['question'];
        $question->answer_input = $data['answer_input'];

        $question->save();

//        dd($question);

        $this->saveAnswers($assessment_id, $question_id, $data);

    }


    private function saveAnswers($assessment_id, $question_id, $dataArray){

        foreach ($dataArray['options'] as $key=>$val){

            if(!empty($val['detail'])){
                //            dd($val);
                $answer = new Answer();
                $answer->uuid = $this->generateId();
                $answer->assessment_id = $assessment_id;
                $answer->question_id = $question_id;
                $answer->answer = $val['detail'];
                $answer->correct = $val['answer'];
                $answer->save();
            }
        }

    }

}