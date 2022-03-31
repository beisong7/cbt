<?php

namespace App\Traits;

use App\Models\Tour;

trait Tours{
    use Auth;

    public function hasSeen($title){
        $user = $this->anyGuard();
        if(!empty($user)){
            if(!empty(Tour::where('title', $title)->where('target_id', $user->uuid)->first())){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
}