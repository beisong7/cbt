<?php

namespace App\Services\Assessment;

use App\Imports\Assessments\AssessmentImport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UploadServices extends BulkQuestionUpload {
    public function __construct()
    {
    }

    public function uploadExcel($excel, $assessment_id){
        $file = "";

        $ext = $excel->getClientOriginalExtension();
        $allowedfileExtension = ['xlsx', 'xls'];

        $check = in_array(strtolower($ext), $allowedfileExtension);
        if(!$check){
            return back()->withErrors(['error'=>'unsupported file']);
        }

        $upload_path = 'uploads/temp';

        $file_name = Str::random(20);

        $full_name = $file_name.'.'.$ext;

        $size = $excel->getSize();

        if ($size > 5000000) {
            return back()->withErrors(['error'=>"file too large"]);
        }

        $excel->move(public_path($upload_path) ,$full_name);
//        $image->storeAs($upload_path, $image_full_name, 'public'); //alternative code

        $path = $upload_path."/".$full_name;
        $file = $path;

//        return $this->operation($data[0], $assessment_id); //debug

        try{

            $data = Excel::toArray(new AssessmentImport(), $path);
            unlink($file);

            //live code
            if($this->operation($data[0], $assessment_id)){
                return back()->withMessage('Upload Successful. Review Questions');
            }

            return back()->withErrors(['Unable to complete, Kindly review upload format']);

        }catch (\Exception $e){
            //log error to server
            return back()->withErrors(['Unable to complete at the moment - '.$e->getMessage()]);
        }
    }
}