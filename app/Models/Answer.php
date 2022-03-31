<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'uuid',
        'assessment_id',
        'question_id',
        'answer',
        'correct',
    ];

    public function question(){
        return $this->belongsTo(Question::class, 'uuid', 'question_id');
    }
}
