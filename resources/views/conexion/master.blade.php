<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="routeName" content="{{Route::currentRouteName()}}">
    <script src="{{ url('/static/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ url('/static/bootstrap.js') }}"></script>
    <script src="{{ url('/static/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/c43196becb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('/static/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/static/css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">Consultorio</span>
        <span class="site-heading-lower text-primary mb-5">@section('nav')@endsection</span>
    </h1>
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/conexion/login') }}">Administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/conexion/logind') }}">Doctor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/conexion/logins') }}">Secretaria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/conexion/loginp') }}">Pacientes</a>
        </li>
    </ul>

    @section('content')@show
</body>
</html>