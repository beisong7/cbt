<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Logic\Organization;
use Illuminate\Http\Request;
use App\Traits\Auth;

class DashboardController extends Controller
{
    use Auth;
    //
    private $organization;

    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
//        $this->middleware('staff');
    }

    public function dashboard(){
        return view('organization.pages.dashboard.index');
    }

    //method not in use, for test purpose currently
    public function organizations(Request $request){
        $user = $request->user('staff');
        return $user->organization;
    }


}
