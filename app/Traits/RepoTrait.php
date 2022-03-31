<?php

namespace App\Traits;

trait RepoTrait {

    public function modify($query, $selection, $paginate=null, $order=null, $first=false){

        if(!empty($selection)){
            $query->select($selection);
        }

        if(!empty($order)){
            $query->orderBy($order[0],$order[1]);
        }

        if(!empty($paginate)){
            return $query->paginate($paginate)->onEachSide(2);
        }else{
            if($first){
                return $query->first();
            }
            return $query->get();
        }


    }

}