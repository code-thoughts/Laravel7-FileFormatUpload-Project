<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class CSVExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //$posts = DB::select('SELECT * FROM table_x');
        $expCSV = DB::table('Test_CSV_CSV_Good')->get();
        return $expCSV;
    }

    
    public function headings(): array
    {
        
        return [
            'Name',
            'Sell',
            'List',
            'Living',
            'Rooms',
            'Beds',
            'Baths',
            'Age',
            'Acres',
            'Taxes'
        ];
    }
}
