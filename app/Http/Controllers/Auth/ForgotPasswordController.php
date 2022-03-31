<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    //override vendor method
    public function showLinkRequestForm(Request $request)
    {

        $secret = $request->input('_type');

        //try decryption
        try{
            $type = decrypt($secret);
            return view('auth.passwords.email')
                ->with("type", $type);
        }catch (\Exception $e){
            return redirect()->route('login');
        }

    }
}
