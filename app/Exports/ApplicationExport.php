<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationExport implements FromCollection, WithHeadings
{
    use Exportable;

    public $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function collection()
    {
        return $this->collection;
    }

    public function headings(): array
    {
        return [
            'Salutation',
            'Name',
            'Email',
            'Phone',
            'WhatsApp',
            'locality',
            'PIN Code',
            'Card Number',
            'Valid Date',
            'OTP State',
            'Applied Date',
            'Last updated Date',
            'Notes',
            'Working Place ',
            'Gated community or Association',
            'State',
            'District',
            'UHID',
            'IP',
            'Card Image',
            'status'
        ];
    }
}
