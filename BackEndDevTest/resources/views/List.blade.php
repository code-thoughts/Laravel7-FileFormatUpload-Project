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
<!--code was edited 2 November 2021,to make the pdf look more presentable -->
<table align="center" width="500px" border="0">
  <thead>
    <th scope="col">ID</th>
    <th scope="col">Sell</th>
    <th scope="col">List</th>
    <th scope="col">Living</th>
    <th scope="col">Rooms</th>
    <th scope="col">Beds</th>
    <th scope="col">Baths</th>
    <th scope="col">Age</th>
    <th scope="col">Acres</th>
    <th scope="col">Taxes</th> 
  </thead>
  <tbody>
     <!-- //for the rows are less than 40 -->
     @php
        $rowCount = 0;
      @endphp

   <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
  </tr>
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
    @php
        $rowCount++;
        if($rowCount==37)
        {
          $rowCount=0;
         echo " <tr> ";
         echo " <td>&nbsp;</td>";
         echo "<td>&nbsp;</td>";
         echo "<td>&nbsp;</td> ";
         echo " <td>&nbsp;</td>";
         echo "<td>&nbsp;</td>";
         echo " <td>&nbsp;</td>";
         echo " <td>&nbsp;</td>";
         echo " <td>&nbsp;</td>";
         echo "<td>&nbsp;</td>";
         echo "<td>&nbsp;</td>";
         echo " </tr> ";
        }
      @endphp
      
    @endforeach
  </tbody>
</table>

</div>
@endsection
