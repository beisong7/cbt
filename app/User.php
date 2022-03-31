<?php

namespace App;

use App\Models\Assessment;
use App\Models\EngagedAssessment;
use App\Models\Organization;
use App\Models\OrganizationMember;
use App\Traits\Tours;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use Notifiable, Tours;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getThemeAttribute(){
        return !empty($this->theme_type)?$this->theme_type:'light';
    }

    public function getImageAttribute(){
        if(file_exists($this->image_key)){
            return url($this->image_key);
        }else{
            return url('assets/images/user.png');
        }
    }

    public function getNamesAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function organizations(){
        return $this->hasManyThrough(
            Organization::class,
            OrganizationMember::class,
            'candidate_id',
            'uuid',
            'uuid',
            'organization_id'
        );
    }

    public function assessments(){
        return $this->hasMany(EngagedAssessment::class, 'candidate_id', 'uuid');
    }

    public function getTrophyCountAttribute(){
        return 0;
    }

    public function getAssessmentInvitesAttribute(){
        return 0;
    }

    public function attempted($assessment_id){
        $count = EngagedAssessment::where('assessment_id', $assessment_id)->where('candidate_id', $this->uuid)->get()->count();
        return $count;
    }

    public function successfulAttempts($assessment_id, $pass){
        $assessments = array();
        foreach ($this->assessments->where('assessment_id', $assessment_id) as $engagedAssessment){
            if($engagedAssessment->score >= $pass){
                array_push($assessments, $engagedAssessment);
            }
        }
        return collect($assessments);
    }
}
