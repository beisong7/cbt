<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/05/2020
 * Time: 11:12 AM
 */

namespace App\Services\Repository;

use App\Models\Invite;
use Illuminate\Support\Facades\DB;


class InviteRepository
{

    public function update(Invite $invite){
        DB::beginTransaction();
        $invite->update();
        DB::commit();
    }

    public function save(Invite $invite){
        DB::beginTransaction();
        $invite->save();
        DB::commit();
    }

    public function oneWhere($key, $value){

        //todo have to optimize these functions to handle multiple key pair values
        return Invite::where($key, $value)->first();

    }

    public function oneWhereActive($key, $value){

        //todo have to optimize these functions to handle multiple key pair values
        return Invite::where($key, $value)->where('current', true)->where('completed', false)->first();

    }

}