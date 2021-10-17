@extends('layouts.app')
@section('content')
<div>
<a href="{{action('FileUploadController@exportXML')}}"><button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">ExportExcel</button> </a>
 

<a href="/pdfXML"><button type="button" style="background-color: #4CAF50; /* Green */
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
    <th>Name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Videos</th>
  </thead>
  <tbody>
    @foreach($shows as $show)
    <tr>
      <td>{{$show->id}}</td>
      <td>{{$show->name}}</td>
      <td>{{$show->price}}</td>
      <td>{{$show->category}}</td>
      <td>{{$show->videos}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection