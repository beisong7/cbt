<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 09/05/2020
 * Time: 6:58 PM
 */

namespace App\Logic;


use App\Traits\CustomMailer;
use App\User;
use Illuminate\Http\Request;
use App\Traits\VerifyEmail as VerifyEmailTrait;

class VerifyEmail
{
    use CustomMailer;

    public function verifyUserEmail(Request $request, $uuid, $table){



        if(!empty($uuid) && !empty($table)){
            try{
                $uuid = decrypt($uuid);
                $table = decrypt($table);

                if(! $request->hasValidSignature()){
                    abort(401);
                }

                //trait
                return $this->verify($uuid, $table);


            }catch (\Exception $e){
                return redirect()->route('home');
            }
        }

        return redirect()->route('home');
    }

    public function resendSignedUrl(Request $request, $uuid, $table){
        //get the user
        if($table==='candidate'){
            $user = User::where('uuid', $uuid)->first();
            if(!empty($user)){
                $this->prepareMail('email-validation', $user, $table);
            }
        }

        return back()->withMessage("Email validation has been sent to your email again.");
    }
}