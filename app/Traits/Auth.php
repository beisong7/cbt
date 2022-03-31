<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth as AppAuth;


trait Auth {


    public function currentUser($guard){
        return AppAuth::guard($guard)->user();
    }

    public function auth(){
        return AppAuth::class;
    }

    public function loggedIn($guard){
        if($guard==='staff'){

            if(AppAuth::guard($guard)->check()){
                return true;
            }

        }elseif($guard==='web'){

            if(AppAuth::guard($guard)->check()){
                return true;
            }

        }else{
            if(AppAuth::guard('admin')->check()){
                return true;
            }
        }

        return false;

    }

    /**
     * Returns any logged in user
     */
    public function anyGuard(){
        $candidate = $this->currentUser('web');
        if(!empty($candidate)){
            return $candidate;
        }else{
            $staff = $this->currentUser('staff');
            if(!empty($staff)){
                return $staff;
            }else{
                $admin = $this->currentUser('admin');
                if(!empty($admin)){
                    return $admin;
                }else{
                    return null;
                }
            }
        }
    }


}