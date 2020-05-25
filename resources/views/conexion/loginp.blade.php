@extends('conexion.master')
@section('title', 'Login')

@section('content')
        <div class="box box_login shadow">
            <div class="inside">
                {!! Form::open(['url'=>'/login']) !!}
                <label for="email">Correo electrónico:</label>
                    <div class="input_group">
                        <div class="input_group_prepend">
                            <div class="input_group_text"><i></i></div>
                        </div>
                        {!! Form::email('email', null , ['class'=>'form-control']) !!}
                    </div>
                <label for="pass">Contraseña:</label>
                    <div class="input_group">
                        <div class="input_group_prepend">
                            <div class="input_group_text"><i></i></div>
                        </div>
                        {!! Form::password('pass' , ['class'=>'form-control']) !!}
                    </div>
                    {!! Form::submit("Ingresar", ['class'=>'btn btn-success mtop16']) !!}
                {!! Form::close() !!}

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
         
                <div class="footer mtop16">
                  <a href="{{url('/register')}}">No tienes una cuenta? Registrate!!!</a>
                  <a href="{{url('/recover')}}">Recuperar contraseña</a>
         
                </div>

            </div>
        </div>


@stop