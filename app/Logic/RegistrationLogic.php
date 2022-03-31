<?php

namespace App\Logic;

use App\Traits\Registration;


class RegistrationLogic {
    use Registration;

    public function register($table, $request){
        if($table==="candidate"){

            $response = $this->candidate($request);
            //send signed url
            //prepareMail accepts email type, user object and table name
            $this->prepareMail('email-validation', $response[1], $table);

            return $response;
        }

        return false;
    }
}