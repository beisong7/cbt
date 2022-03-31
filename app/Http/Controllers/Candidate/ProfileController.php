<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function candidateProfile(Request $request){
        return view('candidate.pages.candidate_profile.index');
    }
}
