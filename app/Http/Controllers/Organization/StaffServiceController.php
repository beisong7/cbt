<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use App\Services\Organization\OrganizationServices;
use Illuminate\Http\Request;

class StaffServiceController extends Controller
{
    private $orgServices;
    //
    public function __construct(OrganizationServices $orgServices)
    {
        $this->orgServices = $orgServices;
    }

    public function acceptInvite(Request $request, $tender_id, $user_id){
        try{
            $user_id = decrypt($user_id);
        }catch (\Exception $e){
            return back()->withErrors(['unable to process']);
        }
        $user = $request->user('staff');
        if($user->uuid===$user_id){
            //accept reject action
            $tender = Tender::where('uuid', $tender_id)->first();
            if(!empty($tender)){
                //check the tender invite
                if($tender->invite->email===$user->email){
                    $this->orgServices->createJoint($tender->organization, $user, false, false, false, 1);
                    $tender->handled = true;
                    $tender->action = 'user accepted invite';
                    $tender->confirm = true;
                    return redirect()->route('staff.dashboard')->withMessage('You have joined a new organization');
                }else{
                    $tender->confirm = true;
                    $tender->update();
                    return back()->withMessage('Request sent to organization');
                }
            }
        }

        return redirect()->route('staff.dashboard')->withErrors(['Cannot complete request']);
    }

    public function rejectInvite(Request $request, $tender_id, $user_id){
        try{
            $user_id = decrypt($user_id);
        }catch (\Exception $e){
            return back()->withErrors(['unable to process']);
        }
        $user = $request->user('staff');

        if($user->uuid===$user_id){
            //accept reject action
            $tender = Tender::where('uuid', $tender_id)->first();

            if(!empty($tender)){
                //reject & disable request
                $tender->handled = true;
                $tender->confirm = false;
                $tender->action = 'user rejected invite';
                $tender->update();
            }
        }

        return redirect()->route('staff.dashboard')->withErrors(['Cannot complete request']);
    }

}
