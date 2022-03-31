<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable =[
        'uuid',
        'assessment_id',
        'question',
        'resource_id',
        'minutes_expected',
        'answer_input',
    ];

    public function assessment(){
        return $this->belongsTo(Assessment::class, 'assessment_id', 'uuid');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'question_id', 'uuid');
    }

    public function getRandomAnswersAttribute(){
        if(!empty($this->answers)){
            return Answer::inRandomOrder()->where('question_id', $this->uuid)->get();
        }
        return null;
    }
}
