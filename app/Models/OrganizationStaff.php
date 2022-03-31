<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationStaff extends Model
{
    //
    protected $fillable = [
        'staff_id',
        'organization_id',
        'uuid',
        'active',
        'owner',
        'who',
        'role_id',
        'creator',
        'current',
        'last_accessed',
    ];

    public function organization(){
        return $this->hasOne(Organization::class, 'uuid', 'organization_id');
    }
}
