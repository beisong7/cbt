<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Services\Invites\InviteServices;
use App\Traits\Auth;
use App\Traits\Session;
use App\Traits\Utility;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InviteController extends InviteServices
{
    use Auth, Session;
    public function publicOrgLink($code){

        $invite = $this->oneWhereActive('code', $code);

        if(!empty($invite)){
            //
            $guard = $invite->type==='organization'?'staff':'web';
            $this->setPreOrganizationInviteData($invite);
            if($this->loggedIn($guard)){
                return redirect()->route('staff.tenders');
            }else{
                $data = [
                    'id'=>encrypt($invite->uuid),
                    'message'=>encrypt("Hello, You have been invited to join ".$invite->organization->name . ". Create an account or login to continue.")
                ];
                $this->setOrganizaionInviteData($data);
                return redirect(route('login')."#organization");
            }
        }

        return redirect()->route('home');

    }

    public function privateOrgLink($code){

        $invite = $this->oneWhereActive('code', $code);

        if(!empty($invite)){
            //
            $guard = $invite->type==='organization'?'staff':'web';
            $this->setPreOrganizationInviteData($invite);
            if($this->loggedIn($guard)){
                return redirect()->route('staff.tenders');
            }else{
                $user = User::where('email', $invite->email)->first();

                if(!empty($user)){
                    $data = [
                        'id'=>encrypt($invite->uuid),
                        'message'=>encrypt("Hi ".$user->first_name.", You have been invited to join ".$invite->organization->name . ". Login to continue.")
                    ];
                    $this->setOrganizaionInviteData($data);
                    return redirect(route('login')."#organization");
                }else{
                    $data = [
                        'id'=>encrypt($invite->uuid),
                        'message'=>encrypt("Hello, You have been invited to join ".$invite->organization->name . ". Create an account with your email to continue.")
                    ];
                    $this->setOrganizaionInviteData($data);
                    return redirect(route('register')."#organization");
                }
            }
        }

        return redirect()->route('home');

    }

    public function assessmentInvite(Request $request, $code){

        $person = $request->user('web');
        if(!empty($person)){
            View::share('person', $person); // shares the logged in admin with all views
        }

        $assessment = Assessment::where('public_key', $code)->where('active', true)->first();
        if(!empty($assessment)){
            $data = [
                'secret'=>encrypt($assessment->uuid),
                'stage'=>'authenticate',
                'next'=>'validate',
            ];
            $this->setPublicAssessmentInviteData($data);
            // TODO
            // Open information page to let user know briefly the assessment to be taken
            return view('pages.assessment.intro')->with(['assessment'=>$assessment]);
            // validate user or login/register user
            // if assessment_invite exist, on login - open assessment instruction page.
            // when begin assessment is clicked, remove session invite and begin assessment

        }
        return redirect()->route('user.dashboard');
    }

    public function assessmentInviteIgnore(){
        $this->forgetAssessmentInviteData();
        return redirect()->route('user.dashboard');
    }
}
