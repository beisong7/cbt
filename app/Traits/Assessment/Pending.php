<?php

namespace App\Traits\Assessment;



trait Pending{

    public function sessionAssessment(){
        $exist = false;
        //get session
        $assessment_invite = session('assessment_invite');
        if(!empty($assessment_invite)){
            $exist = true;
        }

        $data['exist'] = $exist;
        if($exist){
            //get assessment
            $data['secret'] = $assessment_invite['secret'];
        }
        return $data;
    }
}