<?php

namespace App\Services\Organization;


use App\Repository\Organization\AssessmentRepository;
use App\Traits\Utility;
use Illuminate\Http\Request;

class AssessmentServices extends AssessmentRepository
{
    use Utility;
    public function getEngaged($user, $selection = null){

        $org = $user->currentOrganization;

        return $this->engagedAssessments($org->uuid, $selection);

    }

    public function getSuccessfulCandidates($assessment, $selection=null){
        return $this->successfulCandidates($assessment, $selection);
    }

    public function handleSharedLinkAction(Request $request){
        //find assessment by uuid
        $uuid = $request->input('organization_id');
        $assessment = $this->findOneBy('uuid', $uuid);
        if(!empty($assessment)){
            $message = "";
            if(!empty($assessment->public_key)){
                $message = "Public link removed";
                $assessment->public_key = null;
            }else{
                $message = "New public shared link generated";
                $assessment->public_key = $this->genetateToken(47);
            }
            $assessment->update();
            return back()->withMessage($message);
        }
        return back()->withErrors(['Resource not found']);
    }
}