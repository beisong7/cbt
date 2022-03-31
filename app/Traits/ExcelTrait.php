<?php

namespace App\Traits;

use App\Exports\Assessments\AssessmentExport;
use Maatwebsite\Excel\Facades\Excel;


trait ExcelTrait{

    public function exportFile($type, $data, $title=null, $filename=null, $heading){

        if(empty($filename)){
            $filename=time();
        }
        if(empty($title)){
            $title='export - '.date('F d, Y');
        }

        $export = new AssessmentExport([$data],$heading, $title);

        return Excel::download($export, "$filename.$type");

//        Excel::create($filename, function($excel) use ($title, $data) {
//
//            // Set the spreadsheet title, creator, and description
//            $excel->setTitle($title);
////            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
////            $excel->setDescription('payments file');
//
//            empty($title)?$title='Exports':$title;
//
//            $excel->sheet($title, function($sheet) use ($data, $title)
//
//            {
//
//                $sheet->row(1, $title);
//
//                $sheet->fromArray($data);
//
//            });
//
//        })->download($type);

    }
}