<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

trait VerifyEmail {



    public function signUrl($routeName, $payload){
        $url = URL::signedRoute($routeName, $payload);
//        dd($url);
        return $url;
    }

    public function verify($uuid, $table)
    {

        if ($table === 'candidate') {
            $user = User::where("uuid", $uuid)->first();

            if (!empty($user)) {
                $user->active = true;
                $user->update();

                $msg = "Your email '$user->email' has been verified successfully.";
                return redirect()->route('email.verification.success', encrypt($msg));
            }

            return redirect()->route('home');
        }

    }

    public function urlSigned(Request $request){
        if(! $request->hasValidSignature()){
            abort(401);
        }
    }


}