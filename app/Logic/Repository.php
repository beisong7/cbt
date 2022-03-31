<?php

namespace App\Logic;

use App\Models\Organization;

class Repository{

    public function LoadOrganization(){
        return Organization::class;
    }
}