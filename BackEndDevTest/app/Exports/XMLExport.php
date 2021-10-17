<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class XMLExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $expXML = DB::table('Test_XML_Good')->get();
        return $expXML;
    }
    public function headings(): array
    {
       
        return [
            'id',
            'name',
            'price',
            'category',
            'videos'
        ];
    }
}
