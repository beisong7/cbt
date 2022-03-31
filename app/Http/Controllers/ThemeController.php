<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    //
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function switchTheme(Request $request, $type){

        $user = null;
        //look for the logged in user - i feel this could be done better
        if(Auth::guard('staff')->check()) {
            $user = $request->user('staff');
        }elseif(Auth::guard('web')->check()) {
            $user = $request->user('web');
        }elseif(Auth::guard('admin')->check()) {
            $user = $request->user('admin');
        }else{
            return redirect()->route('home');
        }

        //set theme in database
        if($type==="light"){
            $user->theme_type = "light";
        }elseif($type==="dark"){
            $user->theme_type = "dark";
        }else{
            $user->theme_type = "light";
        }

        //update and return back
        $user->update();
        return back();
    }
}
