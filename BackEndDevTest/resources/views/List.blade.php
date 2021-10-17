@extends('layouts.app')
@section('content')
<div>
<a href="{{action('FileUploadController@exportCSV')}}"><button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">ExportExcel</button> </a>
 

<a href="/pdfCSV"><button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">ExportPdf</button> </a>
</div><br> 
<div>
<table align="center" width="500px">
  <thead>
    <th>ID</th>
    <th>Sell</th>
    <th>List</th>
    <th>Living</th>
    <th>Rooms</th>
    <th>Beds</th>
    <th>Baths</th>
    <th>Age</th>
    <th>Acres</th>
    <th>Taxes</th>
  </thead>
  <tbody>
    @foreach($shows as $show)
    <tr>
      <td>{{$show->id}}</td>
      <td>{{$show->Sell}}</td>
      <td>{{$show->List}}</td>
      <td>{{$show->Living}}</td>
      <td>{{$show->Rooms}}</td>
      <td>{{$show->Beds}}</td>
      <td>{{$show->Baths}}</td>
      <td>{{$show->Age}}</td>
      <td>{{$show->Acres}}</td>
      <td>{{$show->Taxes}}</td>
    
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection