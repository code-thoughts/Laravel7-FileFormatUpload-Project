@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div>
    <html>

<head>

    <title>laravel 7 file upload test - Backend Dev Test </title>

    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

</head>

  

<body  style="width:100%;">

<div class="container" style="width:100%;">

   

    <div class="panel panel-primary">

      <div class="panel-heading"><h2>laravel 7 file upload test </h2></div>

      <div class="panel-body">

   

        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <!-- <img src="uploads/{{ Session::get('file') }}"> -->

        @endif

  

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

  

        <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

  

                <div class="col-md-8">

                    <input type="file" name="file" class="form-control">

                </div>

   

                <div class="col-md-4">

                    <button type="submit" style="background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;">Upload</button>

                </div>

   

            </div>

        </form>

  

      </div>
      <div><br><a href="{{route('/list')}}"><button  style="background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;">Export/View-CSV</button></a>
      
    </div>
      <div><br><a href="{{route('/listXML')}}"><button style="background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;">Export/View-XML</button></a>
      
    </div>
      <div><br><a href="{{route('/listJSON')}}"><button  style="background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;">Export/View-JSON</button></div>
    </div>

</div>

</body>

</html>
    </div>    


    </div>
    </div>
@endsection
