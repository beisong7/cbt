<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [

        'uuid',
        'token',
        'code',
        'type',
        'mode',
        'email',
        'completed',
        'current',

    ];

    public function organization(){
        return $this->hasOne(Organization::class, 'token', 'token');
    }
}
