<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CSVExport;
use App\Exports\XMLExport;
use App\Exports\JSONExport;
use PDF;

use RecursiveIteratorIterator;
use SimpleXMLElement;
use DOMDocument;

//use Validator;

class FileUploadController extends Controller
{
        // $fullfileName; 
        // $fileExplode;
        // $fileNameOnly;
        // $fileExtension;
        // $snakeCasefileName;

    public function listCsv()
    {
        //
        $shows = DB::table('Test_CSV_CSV_Good')->get();
        return view('List', compact('shows'));


    }
    
    public function listXml()
    {
        //
        $shows = DB::table('Test_XML_Good')->get();
        return view('ListXML', compact('shows'));


    }

    public function listJson()
    {
        //
        $shows = DB::table('Test_JSON_Good')->get();
        return view('ListJSON', compact('shows'));


    }
    

    public function exportCSV() 
    {
            return Excel::download(new CSVExport, 'csvExport.xlsx');
    }

    public function exportXML() 
    {
            return Excel::download(new XMLExport, 'xmlExport.xlsx');
    }

    public function exportJSON() 
    {
            return Excel::download(new JSONExport, 'jsonExport.xlsx');
    }

    public function exportCSVPDF() 
    {
            $shows = DB::table('Test_CSV_CSV_Good')->get();
            $pdf = PDF::loadView('List', compact('shows'));
            return $pdf->download('Test_CSV_CSV_Good.pdf');

    }

    public function exportXMLPDF() 
    {
            $shows = DB::table('Test_XML_Good')->get();
            $pdf = PDF::loadView('ListXML', compact('shows'));
            return $pdf->download('Test_XML_Good.pdf');

    }

    public function exportJSONPDF() 
    {
            $shows = DB::table('Test_JSON_Good')->get();
            $pdf = PDF::loadView('ListJSON', compact('shows'));
            return $pdf->download('Test_JSON_Good.pdf');

    }

    
    /*------------------------------File uploads--------------------------------*/

    public function fileUpload()

    {

        return view('fileUpload');

    }

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUploadPost(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:json,xml,csv,txt|max:2048',
        ]);
   



      
        $fullfileName = $request->file('file')->getClientOriginalName();
        
        $fileExplode = explode('.',$fullfileName);
        $fileNameOnly = $fileExplode[0];
        $fileExtension = $fileExplode[1];
        $snakeCasefileName = $str = str_replace(' ', '_', $fileNameOnly);
        //dd($fileNameOnly);
         
        // check for all three file formats json,xml,csv/text

        if(($fileExtension == 'csv')|| ($fileExtension == 'txt'))
        {
            $row = 1;
            if (($handle = fopen("/home/sharks/Downloads/".$fullfileName, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);//gets the number of columns
               
             
                if($row == 1)
                {
                    Schema::create($snakeCasefileName, function (Blueprint $table) use($num,$data) {
                        $table->id()->nullable();
    
                        for ($c=0; $c < $num; $c++) {
                            $table->string($data[$c])->nullable();
                        }
                    });
                }
            else
            {
                //only if $row = 2, but insert should start at row 1
                $columns= Schema::getColumnListing($snakeCasefileName);
                $colStart = 1;
                $rowStartId = 1;
                $collngth = $num;
                //first for loop is for the row,inner for loop for the fields
    
                
                  
       
                //insert the row id first then enter data
                $newRowInsert = $row-1;
                DB::insert("insert into $snakeCasefileName ($columns[0]) values (?)", [$newRowInsert]);
                for ($c=0; $c < $num; $c++) {
    
                    DB::table($snakeCasefileName)
                    ->where('id', $newRowInsert)
                    ->update([$columns[$colStart] => $data[$c]]);
    
                    $colStart++;
                }
    
    
            }
            
             
                $row++;
    
               
               
    
    
            }
    
        }//if for table creation and data insert
    

        }
        else if($fileExtension == 'xml')
        {
           

                //     start of table maker
                    $xml = simplexml_load_file("/home/sharks/Downloads/".$fullfileName) or die("Error: Cannot create object");
                    Schema::create($snakeCasefileName, function (Blueprint $table)use($xml){
                    $table->id()->nullable();    
                    foreach($xml->children() as $child1) { 
                    
                    foreach($child1->children() as $child2) 
                        {
                            $table->string($child2->getName())->nullable();    
            
                        } 
                        
                    break; 
                    }
                });
            
                //  end of table maker


       
                $x = 0;
                //$colStart = 1;
                $columns= Schema::getColumnListing($snakeCasefileName);
                $newRowInsert = 1;
                $loops= 1;

                
                foreach($xml->children() as $child1) { 
                    DB::insert("insert into $snakeCasefileName ($columns[0]) values (?)", [$newRowInsert]);    
                    $elemInList = $child1->count(); 
                    $colStart = 1; 
                    foreach($child1->children() as $child2) 
                    {  
                            if($colStart < 5)
                            {
                                DB::table($snakeCasefileName)
                                ->where('id', $newRowInsert)
                                ->update([$columns[$colStart] => $child2]);
                                
                            }
                            else
                            {
                                $colStart=1;
                                // break;
                            }
                            $colStart++; 
                    } 
                    
                    $newRowInsert++;
                }

         }

         else
         {

           

            $path = "/home/sharks/Downloads/".$fullfileName;
            $json = json_decode(file_get_contents($path), true); 
            //dd($json);


                Schema::create($snakeCasefileName, function (Blueprint $table)use($json){
                $table->id()->nullable(); 
                 foreach($json as $key=>$value){
                    $table->string('firstName')->nullable();
                    $table->string('lastName')->nullable();
                    $table->string('gender')->nullable();
                    $table->string('age')->nullable();
                    $table->string('number')->nullable();
                
            }
        });

        $columns= Schema::getColumnListing($snakeCasefileName);
        $newRowInsert = 1;
        
        $obj=0;
        while($obj < 3)
        {
            DB::insert("insert into $snakeCasefileName ($columns[0]) values (?)", [$newRowInsert]);
            foreach($json as $key=>$value)
            {
                $colStart = 1;
                if($colStart < 6)
                {
                    
                    DB::table($snakeCasefileName)
                    ->where('id', $newRowInsert)
                    ->update(
                        [$columns[$colStart++] => $value[$obj]['firstName'],
                        $columns[$colStart++] => $value[$obj]['lastName'],
                        $columns[$colStart++] => $value[$obj]['gender'],
                        $columns[$colStart++] => $value[$obj]['age'],
                        $columns[$colStart++] => $value[$obj]['number']]);
                }
               
                
            }
            $obj++; 
            $newRowInsert++;
        }
       
                   
         } 
        
         return back()

         ->with('success','You have successfully uploaded file.--'.$snakeCasefileName)

         ->with('file',$fullfileName);

 




    }

}
