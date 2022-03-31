<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;

trait Registration{
    use CustomMailer, Utility;

    public function candidate(Request $request){

        $validatedData  = $request->validate([
            'email' => 'required|unique:users',
        ]);

        $candidate = new User();
        $candidate->first_name = $request->input('first_name');
        $candidate->last_name = $request->input('last_name');
        $candidate->email = $request->input('email');
        $candidate->password = $request->input('password');
        $candidate->uuid = $this->generateId();
        $candidate->save();
        $message ="Yay! Your account has been created. Please activate your account by validating your email ($candidate->email).";
        return [$message, $candidate];
    }
}