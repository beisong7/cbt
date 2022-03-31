<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Services\Candidate\AssessmentService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $assessment;
    public function __construct(AssessmentService $service)
    {
        $this->assessment = $service;
    }

    //

    public function dashboard(Request $request){
        return view('candidate.pages.dashboard.index');
    }

    public function exploreOrganization(Request $request){
        return view('candidate.pages.organization.explorer');
    }

    public function reviewCompletedAssessment(Request $request, $secret){

        return  $this->assessment->oneCompletedAssessment($secret);
    }
}
