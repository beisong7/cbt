<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $fillable = [
        'uuid',
        'organization_id',
        'title',
        'instructions',
        'introduction',
        'photo',
        'course_id',
        'curriculum_item_id',
        'mode',
        'duration',
        'active_from',
        'expire_at',
        'type',
        'answer_number_mode',
        'published',
        'publish_time',
        'active',
        'global_name',
        'attempts_allowed',
        'pass_percent',
        'questions_allotted',
        'show_score',
        'allow_review',
        'max_candidate',
        'token',
    ];

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id', 'uuid');
    }

    public function questions(){
        return $this->hasMany(Question::class, 'assessment_id', 'uuid');
    }

    public function getImageAttribute(){
        if(file_exists($this->photo)){
            return url($this->photo);
        }else{
            return url('assets/images/test.png');
        }
    }

    public function getIsTimedAttribute(){
        return !empty($this->duration)?true:false;
    }

    public function getHasEntryAttribute(){
        return !empty($this->active_from)?true:false;
    }

    public function getEntryTimeAttribute(){
        return date('M d, Y | H:i | T', $this->active_from);
    }

    public function getHasExpiryAttribute(){
        return !empty($this->expire_at)?true:false;
    }

    public function getExpiryTimeAttribute(){
        return date('M d, Y | H:i | T', $this->expire_at);
    }

    public function getRandomQuestionAnswersAttribute(){
        if(!empty($this->questions)){

            if(!empty($this->questions_allotted) && $this->questions_allotted > 0){
                return Question::inRandomOrder()->where('assessment_id', $this->uuid)->with(['answers'=>function($query){
                    $query->inRandomOrder()->select(['answer','uuid', 'question_id']);
                }])->take($this->questions_allotted)->get();
            }else{
                return Question::inRandomOrder()->where('assessment_id', $this->uuid)->with(['answers'=>function($query){
                    $query->inRandomOrder()->select(['answer','uuid', 'question_id']);
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

    public function getRandomQuestionsAttribute(){
        return Question::inRandomOrder()->where('assessment_id', $this->uuid)->get();
    }

    public function getGlobalTitleAttribute(){
        return !empty($this->global_name)?$this->global_name:'Assessment';
    }

    public function  hasStarted($uuid){
        if(!empty($this->duration)){
            $engaged = EngagedAssessment::where('assessment_id', $this->uuid)
                ->where('completed', false)
                ->where('active', true)
                ->where('end_time', '>', time())
                ->where('candidate_id', $uuid)
                ->where('has_started', true)->first();
        }else{
            $engaged = EngagedAssessment::where('assessment_id', $this->uuid)
                ->where('completed', false)
                ->where('active', true)
                ->where('candidate_id', $uuid)
                ->where('has_started', true)->first();
        }

        return !empty($engaged)?$engaged:false;
    }


    public function getAllowedQuestionCountAttribute(){
        if(!empty($this->questions_allotted)&& $this->questions_allotted>0){
            return $this->questions_allotted;
        }
        return $this->questions->count();
    }

    public function engagedAssessments(){
        return $this->hasMany(EngagedAssessment::class, 'assessment_id', 'uuid');
    }

    public function getattemptsAttribute(){
        return $this->engagedAssessments->count();
    }

    public function getcompletedAttribute(){
        return $this->engagedAssessments->where('completed', true)->count();
    }

    public function getsuccessCandidateAttribute(){
        $engagedAssessments = $this->engagedAssessments;

        $keys = array();
        $candidates = array();

        foreach ($engagedAssessments as $engagedAssessment){

            if($engagedAssessment->completed){
                if($engagedAssessment->progress > $engagedAssessment->assessment->pass_percent){
                    if(!in_array($engagedAssessment->candidate->uuid, $keys)){
                        array_push($candidates, $engagedAssessment->candidate);
                        array_push($keys, $engagedAssessment->candidate->uuid);
                    }
                }
            }
        }

//        return $keys;

        return  collect($candidates);
    }

    public function getenrolledCandidatesAttribute(){
        $engagedAssessments = $this->engagedAssessments;

        $keys = array();
        $candidates = array();

        foreach ($engagedAssessments as $engagedAssessment){

            if($engagedAssessment->completed){

                if(!in_array($engagedAssessment->candidate->uuid, $keys)){
                    array_push($candidates, $engagedAssessment->candidate);
                    array_push($keys, $engagedAssessment->candidate->uuid);
                }
            }
        }

        return  collect($candidates);
    }




}
