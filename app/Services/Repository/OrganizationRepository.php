<?php

namespace App\Services\Repository;

use App\Models\Organization;
use Illuminate\Support\Facades\DB;

class OrganizationRepository{

    public function LoadOrganization(){
        return Organization::class;
    }

    public function oneWhere($key, $value){
        //todo have to optimize these functions to handle multiple key pair valies
        return Organization::where($key, $value)->first();
    }

    public function allWhere($key, $value){
        //todo have to optimize these functions to handle multiple key pair valies
        return Organization::where($key, $value)->get();
    }

    public function update(Organization $organization){
        DB::beginTransaction();
        $organization->update();
        DB::commit();
    }
}