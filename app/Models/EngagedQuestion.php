<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngagedQuestion extends Model
{
    protected $fillable = [
        'uuid',
        'engaged_assessment_id',
        'question',
        'resource_id',
        'minutes_expected',
        'seen',
        'seen_time',
        'answered',
        'answered_time',
        'answer_input',
    ];

    public function answers(){
        return $this->hasMany(EngagedAnswer::class, 'engaged_question_id', 'uuid');
    }

    public function answerID($uuid){
        return EngagedAnswer::where('engaged_question_id', $this->uuid)->where('uuid', $uuid)->first();
    }
}
