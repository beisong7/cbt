<?php

namespace App\Http\Controllers;

use App\Logic\RegistrationLogic;
use App\Traits\VerifyEmail;
use App\Logic\VerifyEmail as VerifyLogic;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use VerifyEmail;
    //this controller handel all the auth routes. all auth should pass here for easy debug
    //aside from forms on the home page, all get and post routes to forms or for validation should pass through here

    /**
     * Get Routes Below
     */

    public function loginOptions(){
        return view('pages.auth.login');
    }

    public function organisationLogin(){
        return view('pages.auth.org_login');
    }

    public function candidateLogin(){
        return view('pages.auth.candidate_login');
    }
    public function candidateRegister(){
        return view('pages.auth.candidate_login');
    }

    public function adminLogin(){
        return view('admin.auth.login');
    }

    public function verifyMailSuccess($secret){
        try{
            return view('pages.auth.verified')->with('message', decrypt($secret));
        }catch (\Exception $e){

        }
        return redirect()->route('home');
    }

    public function successDetails($payload, $uuid, $type){
        if(!empty($uuid)){
            try{
                $message = decrypt($payload);
                if($type==="candidate"||$type==="staff"||$type==="admin"){
                    return view('pages.auth.success')
                        ->with('user_id',$uuid)
                        ->with('type',$type)
                        ->with('message',$message);
                }


            }catch (\Exception $e){

            }
        }

        return redirect()->route('login');
    }

    //controller for verification from email
    public function verifyEmail(Request $request, $uuid, $table){
        //verify signed url
        $verifyEmail = new VerifyLogic();
        return $verifyEmail->verifyUserEmail($request, $uuid, $table);

    }

    //controller to resend verification email
    public function reVerifyEmail(Request $request, $uuid){
        //get type i.e candidate or admin or staff
        $table = $request->input('type');
        if(!empty($table)){
            $verify = new VerifyLogic();

            return $verify->resendSignedUrl($request, $uuid, $table);
        }



        return redirect()->route('home');

        //should resign the email verification url

    }

    /**
     * Post Routes Below
     */

    /**
     * Candidate
     */
    public function registerCandidate(Request $request){

        /**
         * register() returns array with message and candidate object or false
         */
        $registration = new RegistrationLogic();
        $response = $registration->register('candidate', $request);
        if($response){
            return redirect()->route('reg.success', [encrypt($response[0]), $response[1]->uuid,'candidate']);
        }
        return redirect()->route('candidate.register');
    }

    public function loginCandidate(Request $request){
        return $this->see($request);
    }

    /**
     * Organization
     */
    public function registerOrganisation(Request $request){
        return $this->see($request);
    }

    public function loginToOrganisation(Request $request){
         return $this->see($request);
    }


}
