<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    //
    protected $fillable = [
        'organization_id',
        'candidate_id',

        'uuid',
        'active',
    ];

    public function organization(){
        return $this->hasOne(Organization::class, 'uuid', 'organization_id');
    }
}
