<?php

namespace App\Http\Controllers;

use App\Exports\Assessments\AssessmentExport;
use App\Traits\ExcelTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssessmentController extends Controller
{
    use ExcelTrait;

    public function __construct()
    {
    }

    /**
     * Exports bulk questions excel template
     */
    public function exportQuestionTemplate(){
        $questions = array();
        $heading = [
            'QUESTION',
            'OPTION_1',
            'OPTION_2',
            'OPTION_3',
            'OPTION_4',
            'ANSWER'
        ];

        $data1['question'] = 'How many colors are in the rainbow?';
        $data1['option_1'] = 'five colors';
        $data1['option_2'] = 'seven colors';
        $data1['option_3'] = 'too many colors';
        $data1['option_4'] = 'four colors';
        $data1['answer'] = 'OPTION_2';
        array_push($questions, $data1);

        $data2['question'] = 'A week is made up of seven working days. True or false';
        $data2['option_1'] = 'False';
        $data2['option_2'] = 'True';
        $data2['option_3'] = '';
        $data2['option_4'] = '';
        $data2['answer'] = 'OPTION_1';
        array_push($questions, $data2);

        $filename = "Question Template -".date('Y-m-d:i:s');
        $title = 'Questions';

        return $this->exportFile('xls', $questions, $title, $filename, $heading );

    }
}
