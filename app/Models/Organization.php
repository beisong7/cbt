<?php

namespace App\Models;


use App\Traits\Auth;
use App\Traits\Utility;
use App\User;
use Illuminate\Database\Eloquent\Model;


class Organization extends Model
{
    use Utility, Auth;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'image_key',
        'public',
        'address',
        'active',
        'type',
        'token',
    ];

    public function getCurrentAttribute(){
        $user = $this->currentUser('staff');
        return OrganizationStaff::where('organization_id', $this->uuid)->where('staff_id', $user->uuid)->first()->current;
    }

    public function staffs(){
        return $this->belongsToMany(
            Staff::class,
            OrganizationStaff::class,
            'organization_id',
            'staff_id',
            'uuid',
            'uuid'
        );
    }

    public function members(){
        return $this->belongsToMany(
            User::class,
            OrganizationMember::class,
            'organization_id',
            'candidate_id',
            'uuid',
            'uuid'
        );
    }

    public function getImageAttribute(){
        //return $this->ImageAttribute($this->image_key);

        if(file_exists($this->image_key)){
            return url($this->image_key);
        }else{
            return url('assets/svg/office.svg');
        }
    }

    public function joints(){
        return $this->hasMany(OrganizationStaff::class, 'organization_id', 'uuid');
    }

    public function assessments(){
        return $this->hasMany(Assessment::class, 'organization_id', 'uuid');
    }

    public function getInviteLinkAttribute(){
        $invite = Invite::where('current', true)->where('token', $this->token)->where('type', 'organization')->where('mode', 'public')->first();
        if(!empty($invite)){
            return route('organization.invite.pub', $invite->code);
        }else{
            return "";
        }
    }

    public function hasStaff($uuid){
        $join = OrganizationStaff::where('staff_id', $uuid)->where('organization_id', $this->uuid)->first();
        return empty($join)?false:true;
    }

    public function getJointAttribute(){
        $staff = $this->currentUser('staff');
        return OrganizationStaff::where('organization_id', $this->uuid)->where('staff_id', $staff->uuid)->first();
    }

    public function getStaffLevelAttribute(){
        $joint = $this->joint;
        if(!empty($joint)){
            return $joint->who;
        }
        return null;
    }
}
