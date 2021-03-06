<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');
Route::get('/list', 'FileUploadController@listCsv')->name('/list');
Route::get('/listXML', 'FileUploadController@listXml')->name('/listXML');
Route::get('/listJSON', 'FileUploadController@listJson')->name('/listJSON');
Route::get('csvExport', 'FileUploadController@exportCSV');
Route::get('xmlExport', 'FileUploadController@exportXML');
Route::get('jsonExport', 'FileUploadController@exportJSON');
Route::get('pdfCSV','FileUploadController@exportCSVPDF');
Route::get('pdfXML','FileUploadController@exportXMLPDF');
Route::get('pdfJSON','FileUploadController@exportJSONPDF');