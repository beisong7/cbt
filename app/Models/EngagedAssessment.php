<?php

namespace App\Models;

use App\Traits\Utility;
use App\User;
use Illuminate\Database\Eloquent\Model;

class EngagedAssessment extends Model
{
    use Utility;
    protected $fillable = [
        'uuid',
        'assessment_id',
        'candidate_id',
        'organization_id',
        'to_expire_at',
        'start_time',
        'last_update',
        'end_time',
        'completed',
        'active',
        'resume_time',
        'seconds_remaining',
        'has_started',
        'score',
        'questions_answered',
    ];

    public function assessment(){
        return $this->belongsTo(Assessment::class, 'assessment_id', 'uuid');
    }

    public function questions(){
        return $this->hasMany(EngagedQuestion::class, 'engaged_assessment_id', 'uuid');
    }

    public function candidate(){
        return $this->belongsTo(User::class, 'candidate_id', 'uuid');
    }

    public function getOneFullRandomAttribute(){

    }

    public function getRandomQuestionAnswersAttribute(){
        if($this->questions->count()>0){

            if(!empty($this->assessment->questions_allotted) && $this->assessment->questions_allotted > 0){
                return EngagedQuestion::inRandomOrder()->where('engaged_assessment_id', $this->uuid)->with(['answers'=>function($query){
                    $query->inRandomOrder()->select(['answer','uuid', 'engaged_question_id', 'selected']);
                }])->take($this->assessment->questions_allotted)->get();
            }else{
                return EngagedQuestion::inRandomOrder()->where('engaged_assessment_id', $this->uuid)->with(['answers'=>function($query){
                    $query->inRandomOrder()->select(['answer','uuid', 'engaged_question_id', 'selected']);
                }])->get();
            }

            /**
             * to limit the number of questions where applicable
             * e.g: ->take($this->questions_allotted)
             * ->take(20)
             * ->get();
             */
        }
        return null;
    }

    public function questionID($uuid){
        return EngagedQuestion::where('uuid', $uuid)->where('engaged_assessment_id', $this->uuid)->first();
    }

    public function answers(){
        return $this->hasMany(EngagedAnswer::class, 'engaged_assessment_id', 'uuid');
    }

    public function getPassedAttribute(){
        return $this->score >= $this->assessment->pass_percent?true:false;
    }

    public function gettimeLeftAttribute(){
        $unixTime = $this->secondsLeft;

        $time = $unixTime / 60;
        $mins = intval($time);
        $sec = $unixTime%60;

        $timeinfo = "";

        if($mins >= 1){
            $timeinfo .= "$mins Minutes ";
        }

        if ($sec > 0 ){
            $timeinfo .= "$sec Seconds ";
        }

        $timeinfo .= " Left";

        if($mins < 1 && $sec==0){
            $timeinfo = "time elapsed";
        }

        return $timeinfo;
    }

    public function getProgressAttribute(){
        //returns answered questions
        $answered = EngagedQuestion::where('engaged_assessment_id', $this->uuid)->where('answered', true)->select(['id'])->get()->count();
        $all = EngagedQuestion::where('engaged_assessment_id', $this->uuid)->select(['id'])->get()->count();

        return intval(($answered / $all) * 100);
    }

    public function getSecondsLeftAttribute(){
        $seconds = 0;
        if(empty($this->seconds_remaining)){
            $time = $this->last_update - $this->start_time;


            $seconds = ($this->assessment->duration * 60) - $time;
        }else{
            $time = $this->last_update - $this->resume_time;

            $seconds = $this->seconds_remaining - $time;
        }


        return $seconds;
    }

    public function getNewSecondsLeftAttribute(){
        $seconds = 0;
        if(!empty($this->resume_time)){
            $time = time() - $this->resume_time;

            $seconds = $this->seconds_remaining - $time;

        }
        return $seconds>=0?$seconds:0;
    }

    public function getTimeUsedAttribute(){



        if(empty($this->seconds_remaining)){

            $seconds = $this->end_time - $this->start_time;
            return $this->secToTime($seconds);
        }else{
            $mins = $this->assessment->duration;
            $sec = $mins * 60;
            $seconds = $sec - $this->seconds_remaining; //seconds used

            return $this->secToTime($seconds);
        }

    }

    public function getQuestionsAnsweredAttribute(){
        return $this->questions->where('answered', true);
    }

    public function getScoreSummaryAttribute(){

        return "Scored $this->score% out of ".$this->questions->count()." questions.";
    }
}
