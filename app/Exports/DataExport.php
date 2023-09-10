<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection ,WithHeadings
{
    private $data,$header;
    public function __construct($data,array $header) {
        $this->data = $data;
        $this->header = $header;
    }

    public function collection( )
    {
        return collect($this->data);
    }
    public function headings(): array
    {
        return  $this->header;
    }
}

