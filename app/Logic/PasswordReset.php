<?php

namespace App\Logic;

use App\Models\Staff;
use App\Traits\CustomMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PasswordReset{

    use CustomMailer;

    /**
     * @param Request $request
     * @return view
     */
    public function startReset(Request $request){
        $email = $request->input('email');
        $staff = Staff::where('email', $email)->first();

        if(!empty($staff)){
            $staff->countdown_pass = time()+(86399); //add 23 hrs 59 mins
            $staff->token = Str::random(70); //generate random token for user
            $staff->update(); //update
            $this->prepareMail("password-reset", $staff); //send email
            return redirect()->route('password.email.success', encrypt(['organization', $staff->email]))->withMessage('Successful');
        }

        return back()->withErrors(['email'=>'No account found with above email.'])->withInput($request->input());
    }

    /**
     * @param Request $request
     * @From User email - Link from user email
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function confirmReset(Request $request){

        $uuid =  $request->input('uuid');
        $token =  $request->input('token');

        try{
            $uuid = decrypt($uuid);

            //check if url is signed
            $this->urlSigned($request);

            $staff = Staff::where('uuid', $uuid)->where('token', $token)->first();

            if(!empty($staff)){
                //check if the time is still valid to reset password
                if($staff->countdown_pass > time()){
                    return view('auth.passwords.reset')->with(
                        ['token'=>encrypt($staff->uuid), 'type'=>'organization', 'email'=>$staff->email]
                    );
                }
            }

            return redirect()->route('login', ['#organization']);
        }catch (\Exception $e){
            return redirect()->route('login', ['#organization']);
        }
    }

    /**
     * @param Request $request
     * @From New password page
     * @return $this
     */
    public function verifyStaffPasswordReset(Request $request){

        $token = $request->input('token');
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password_confirmation');

        //confirm is password match
        if($password!==$password2){
            return back()->withErrors(['password'=>'Password Mismatch. Try carefully again.'])->withInput($request->input());
        }
        $uuid = decrypt($token);
        $staff = Staff::where('uuid', $uuid)->where('email', $email)->first();
        if(!empty($staff)){
            $staff->password = bcrypt($password);
            $staff->token = "";
            $staff->update();

            return redirect()->route('login', ['#organization'])->withMessage('Password Reset Successful');
        }

        return back()->withErrors(['email'=>'Error validating provided email.'])->withInput($request->input());

    }
}