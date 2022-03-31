<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngagedAnswer extends Model
{
    protected $fillable = [
        'uuid',
        'engaged_assessment_id',
        'engaged_question_id',
        'answer',
        'correct',
        'selected',
        'value',
    ];
    //
}
