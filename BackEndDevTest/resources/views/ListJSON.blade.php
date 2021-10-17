@extends('layouts.app')
@section('content')
<div>
<a href="{{action('FileUploadController@exportJSON')}}"><button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">ExportExcel</button> </a>
 

<a href="/pdfJSON"><button type="button" style="background-color: #4CAF50; /* Green */
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
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Number</th>
  </thead>
  <tbody>
    @foreach($shows as $show)
    <tr>
      <td>{{$show->id}}</td>
      <td>{{$show->firstName}}</td>
      <td>{{$show->lastName}}</td>
      <td>{{$show->gender}}</td>
      <td>{{$show->age}}</td>
      <td>{{$show->number}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection