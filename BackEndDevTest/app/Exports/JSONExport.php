<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class JSONExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $expJSON = DB::table('Test_JSON_Good')->get();
        return $expJSON;
    }

    
    public function headings(): array
    {
       
        return [
            'id',
            'firstName',
            'lastName',
            'gender',
            'age',
            'number'
        ];
    }
}
