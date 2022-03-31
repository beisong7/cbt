<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Tender;
use App\Services\Invites\InviteServices;
use App\Services\Organization\OrganizationServices;
use Illuminate\Http\Request;


class OrganizationController extends Controller
{

    private $services;
    private $inviteServices;

    public function __construct(OrganizationServices $services, InviteServices $inviteServices)
    {
        $this->services = $services;
        $this->inviteServices = $inviteServices;
//        $this->middleware('staff');
    }

    public function viewOrganization(Request $request, $uuid){

        $data = $this->services->first($uuid);
        if(!empty($data)){
            return view('organization.pages.organization.show')->with(['organization'=>$data]);
        }
        return back();
    }

    public function setActive(Request $request, $uuid){
        $org = $this->services->first($uuid);

        if(empty($org)){
            return redirect()->route('dashboard.index');
        }

        $user = $request->user('staff');
        if($this->services->setActive($uuid, $user->uuid )){
            return back()->withMessage("{$org->name} is now selected.");
        }
        return back()->withErrors(['Unable to complete']);
    }

    public function genInviteLink(Request $request){

        $type = $request->input('type');
        $organization_id = $request->input('organization_id');
        $emails = $request->input('emails');
        if(!empty($organization_id) || !empty($type)){
            if($this->inviteServices->organizationLinks($type, $organization_id)){
                return back();
            }else{
                return back()->withErrors(['Unable to complete']);
            }
        }

        return back();
    }

    public function rejectInvite($uuid, $secret){
        $tender = Tender::where('uuid', $uuid)->first();
        if(empty($tender)){
            return back();
        }
        try{
            $uuid = decrypt($secret);
            $applicant = Staff::where('uuid', $uuid)->first();

            if(!empty($applicant)){
                $tender->handled = true;
                $tender->action = 'rejected';
            }

            return back();
        }catch (\Exception $e){
            return back();
        }
    }

    public function acceptInvite($uuid, $secret){
        $tender = Tender::where('uuid', $uuid)->first();
        if(empty($tender)){
            return back();
        }
        try{
            $uuid = decrypt($secret);
            $staff = Staff::where('uuid', $uuid)->first();

            if(!empty($staff)){
                //create join
                $organization = $tender->organization;

                if(empty($organization)){
                    return back();
                }

                $this->services->createJoint($organization, $staff, false, false, false, 1);
                $tender->handled = true;
                $tender->action = 'organization accepted staff';
                $tender->save();
                //todo send email to staff
            }

            return back();
        }catch (\Exception $e){
            return back();
        }
    }

    public function bulkInvite(Request $request, $secrete){
        try{
            $organization_id = decrypt($secrete);


            if($this->inviteServices->bulkOrganizationInvite($request, $organization_id)){

                return back()->withMessage('Bulk invites sent');
            }

            return back()->withErrors(['Unable to send bulk']);

        }catch (\Exception $e){
            return back()->withErrors(['Unable to send bulk mails']);
        }
    }

    public function organizationMembers(Request $request){
        //get current organization
        return view('organization.pages.organization.members');
    }


}
