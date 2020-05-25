<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="routeName" content="{{Route::currentRouteName()}}">
    <script src="{{ url('/static/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ url('/static/bootstrap.js') }}"></script>
    <script src="{{ url('/static/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/c43196becb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('/static/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/static/css/admin.css') }}">
    <title>@yield('title')-Administrador</title>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="col1">@include('users.sidebar')</div>
        <div class="col2">
            <div class="page">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin')}}" class="nav-link"><i class="fas fa-home"></i>Home</a>
                            </li>
                            @section('breadcrumb')
                            @show
                        </ol>
                    </nav>
                </div>

                @if (Session::has('message'))
                <div class="container">
                    <div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display:none;">
                        {{Session::get('message')}}
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                           setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                        </script>
                    </div>
                </div> 
                @endif

                @section('content')
                    
                @show
            </div>
        </div>
    </div>
</body>
</html>
