<?php

namespace App\Repository\Organization;

use App\Models\Assessment;
use App\Models\EngagedAssessment;
use App\Traits\RepoTrait;
use App\User;
use Illuminate\Support\Facades\DB;

class AssessmentRepository
{
    use RepoTrait;

    public function model(){
        return Assessment::class;
    }

    public function engagedAssessments($organization_id, $selection = null){
        $query = Assessment::has('engagedAssessments', '>' , 0)->where('organization_id', $organization_id);

        return $this->modify($query, $selection);


//        $query = Assessment::whereIn('assessments.uuid', function($query){
//            $query->from('engaged_assessments')
//                ->select('engaged_assessments.assessment_id')
//                ->where('engaged_assessments.completed', true);
//        });

//        $query = Assessment::whereHas('engagedAssessments', function ($q){
//            $q->where('completed', false);
//        })->where('organization_id', $organization_id);

//        $query = EngagedAssessment::where('completed', true)->where('organization_id', $organization_id);
//        return $query->get()->unique('assessment_id');
    }

    public function completedAssessments($assessment_id, $selection = null, $page=null, $order=null){

        $query = EngagedAssessment::where('assessment_id', $assessment_id)
            ->where('completed', true);

        return $this->modify($query, $selection, $page, $order);
    }

    public function incompletedAssessments($assessment_id, $selection = null, $page=null, $order=null){

        $query = EngagedAssessment::where('assessment_id', $assessment_id)
            ->where('completed', false);

        return $this->modify($query, $selection);
    }

    public function successfulCandidates($assessment, $only=null){

        $query = User::whereIn('users.uuid', function($q) use ($assessment){
            $q->from('engaged_assessments')
                ->select('engaged_assessments.candidate_id')
                ->where('completed', true)
                ->where('assessment_id', $assessment->uuid)
                ->where('score','>=' ,$assessment->pass_percent);
        });

        return $this->modify($query, $only);
    }

    public function findOneBy($key, $value, $selection = null){
        $query = Assessment::where($key, $value);
        return $this->modify($query, $selection, null, null, true);
    }




}