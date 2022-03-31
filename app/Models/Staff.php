<?php

namespace App\Models;

use App\Traits\Tours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Staff extends Authenticatable
{
    use Tours;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'who',
        'uuid',
        'title',
        'first_name',
        'last_name',
        'email',
        'phone',
        'image_key',
        'address',
        'active',
        'password',
        'last_seen',
        'dob',
        'countdown_pass',
        'countdown_otp',
        'otp',
        'token',
        'theme_type',
        'email_verified_at',
    ];

    public function organization(){
        return $this->hasManyThrough(
            Organization::class,
            OrganizationStaff::class,
            'staff_id',
            'uuid',
            'uuid',
            'organization_id'
        );
    }

    public function getCurrentOrgNameAttribute(){
        $org = $this->currentOrganization;
        return !empty($org)?$org->name:$this->first_name;
    }

    public function getDefaultOrganizationAttribute(){
        $org = $this->currentOrganization;
        return !empty($org)?$org:false;
    }

    public function getCurrentOrganizationAttribute(){
        $joint = OrganizationStaff::where('staff_id', $this->uuid)->where('current', true)->first();
        return !empty($joint)?$joint->organization:null;
    }

    public function getImageAttribute(){
        if(file_exists($this->image_key)){
            return url($this->image_key);
        }else{
            return url('assets/images/user.png');
        }
    }

    public function getThemeAttribute(){
        return !empty($this->theme_type)?$this->theme_type:'light';
    }

    public function getNamesAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function getJointAttribute(){
        return OrganizationStaff::where('staff_id', $this->uuid)->where('current', true)->first();
    }

    public function joined($organization_id){
        $join = OrganizationStaff::where('staff_id', $this->uuid)->where('organization_id', $organization_id)->first();
        return !empty($join)?$join->created_at->diffForHumans():"";
    }

    public function getWhoAttribute(){
        return !empty($this->joint)?$this->joint->who:0;
    }

    public function getPendingTenderAttribute(){
        return Tender::where('staff_id', $this->uuid)->where('handled', false)->select(['id'])->get();
    }

    //get user role level from join
    public function getCurrentLevelAttribute(){
        $joint = $this->joint;
        if(!empty($joint)){
            return $joint->who;
        }
        return null;
    }

}
