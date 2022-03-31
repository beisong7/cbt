<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [

        'uuid',
        'organization_id',
        'staff_id',
        'invite_id',
        'handled',
        'confirm',
        'action',

    ];

    public function organization(){
        return $this->hasOne(Organization::class, 'uuid', 'organization_id');
    }

    public function user(){
        return $this->hasOne(Staff::class, 'uuid', 'staff_id');
    }

    public function invite(){
        return $this->hasOne(Invite::class, 'uuid', 'invite_id');
    }
}
