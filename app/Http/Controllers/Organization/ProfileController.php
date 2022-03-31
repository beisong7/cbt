<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function my_profile(Request $request){
        return view('organization.pages.staff_profile.index');
    }

    public function testMe(Request $request){
        $user = $request->user('staff');
        return $user->organization;
    }
}
