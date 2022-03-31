<?php

namespace App\Exports\Assessments;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AssessmentExport implements FromArray, WithHeadings, WithTitle
{

    protected $array, $headings, $title;

    public function __construct(array $array, array $headings, string $title)
    {
        $this->array = $array;
        $this->headings = $headings;
        $this->title = $title;
    }

    public function headings(): array
    {
        return $this->headings;
    }

    public function array(): array
    {
        return $this->array;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}