<?php

namespace App\Traits;

use App\Models\Tender;
use App\Services\Invites\InviteServices;
use App\Services\Organization\OrganizationServices;
use Illuminate\Http\Request;

trait Session{
    use Utility;

    private $inviteService;
    private $orgService;
    public function __construct(InviteServices $services, OrganizationServices $organizationServices)
    {
        $this->inviteService = $services;
        $this->orgService = $organizationServices;
    }

    public function setPreOrganizationInviteData($invite){
        session(['pre_org_invite'=>$invite]);
    }

    public function getPreOrganizationInviteData(){
        return session('pre_org_invite');
    }

    public function handleOrganizationInviteData($staff){

        $invite = $this->getPreOrganizationInviteData();

        if(!empty($invite)){

            //validate organization
            $organization = $this->orgService->oneWhere('token', $invite->token);
            if(!empty($organization)){

                //validate staff
                if(!$organization->hasStaff($staff->uuid)){

                    //validate tender to organization
                    $eTender = Tender::where('staff_id', $staff->uuid)->where('organization_id', $organization->uuid)->where('handled', false)->first();
                    if(empty($eTender)){

                        //create invite request from the organization
                        if($invite->mode==="public" && $invite->current){
                            $tender = new Tender();
                            $tender->uuid = $this->generateId();
                            $tender->organization_id = $organization->uuid;
                            $tender->staff_id = $staff->uuid;
                            $tender->invite_id = $invite->uuid;
                            $tender->handled = false;

                            $tender->save();

                            session()->forget('pre_org_invite');
                            session()->forget('organization_invite');

                            return [true, 'staff.tenders'];
                        }

                        if($invite->mode==="private"){

                            if($invite->email === $staff->email){

                                $this->orgService->createJoint($organization, $staff, false, false, false, 1);

                                $invite->completed = true;
                                $invite->update();

                            }
                            session()->forget('pre_org_invite');
                            session()->forget('organization_invite');
                            return [true, 'staff.dashboard'];
                        }
                    }

                }
            }

            //try to clear session for invites
            session()->forget('pre_org_invite');
            session()->forget('organization_invite');
            return [false];
        }
        return [false];
    }


    public function setPublicAssessmentInviteData($data){

        //check to remove any other session message
        session()->forget('organization_invite');
        session(['assessment_invite'=>$data]);
    }

    public function forgetAssessmentInviteData(){
        //check to remove any other session message
        session()->forget('assessment_invite');
    }



    public function setOrganizaionInviteData($data){
        session()->forget('assessment_invite');
        session(['organization_invite'=>$data]);
    }

    public function allStored(Request $request){
        return $request->session()->all();
    }
}