<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    //
    public function staffRequests(Request $request){
        $user = $request->user('staff');
        $tenders = Tender::where('staff_id', $user->uuid)->where('handled', false)->paginate(20);
        return view('organization.pages.tenders.index')->with('tenders', $tenders);
    }

    public function organizationRequests(Request $request){
        $user = $request->user('staff');
        $currentOrg = $user->currentOrganization;

        if(empty($currentOrg) || $user->currentLevel < 4){
            return redirect()->route('staff.dashboard');
        }
        $tenders = Tender::where('organization_id', $currentOrg->uuid)->where('handled', false)->where('confirm', true)->paginate(20);
        return view('organization.pages.request.index')->with('tenders', $tenders);
    }
}
