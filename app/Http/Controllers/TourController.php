<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function welcomeStaff(Request $request){
        $user = $request->user('staff');
        return view('organization.pages.tour.welcome');
    }

    public function completeTour(Request $request){
        $user = $request->user('staff');

        $tour = Tour::where('title', 'welcome')->where('target_id', $user->uuid)->first();
        if(empty($tour)){
            $tour = new Tour();
            $tour->title = 'welcome';
            $tour->target_id = $user->uuid;
            $tour->save();
        }else{
            $tour->title = 'welcome';
            $tour->target_id = $user->uuid;
            $tour->update();
        }

        return redirect()->route('staff.dashboard');

    }
}
