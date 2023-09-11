<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection ,WithHeadings
{
    private $data;
    public function __construct($data) {
        $this->data = $data;
    }

    public function collection( )
    {
        return collect($this->data);
    }
    public function headings(): array
    {
        $headerkey = array_keys($this->data[0]);
        return  $headerkey;
    }
}

