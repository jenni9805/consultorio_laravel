@extends('patients.master')
@section('title','New Patient')

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{url('/admin/patients/create')}}"><i class="fas fa-user-friends"></i>Create users</a>
    </li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="panel show">
            <div class="box box_register shadow">
                <div class="inside">
                    {!!Form::open(['url' => '/admin/patients/create'])!!} 
                        <label for="name">Name:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            {!!Form::text('name',null,['class' => 'form-control','required'])!!}
                        </div>

                        <label for="lastname" class="mtop16">Lastname:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            {!!Form::text('lastname',null,['class' => 'form-control','required'])!!}
                        </div>

                        <label for="email" class="mtop16">Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            {!!Form::email('email',null,['class' => 'form-control','required'])!!}
                        </div>
                        <label for="confir" class="mtop16">Confirmed:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            {!! Form::select('confir', ['1'=>'Compartir','0'=>'No compartir'], '0', ['class'=>'form-control','required']) !!}
                        </div>

                        {!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16'])!!}
                        {!!Form::close()!!}

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
                                        setTimeout(function(){$('.alert').slideUp(); }, 10000);
                                    </script>
                                </div>
                            </div> 
                            @endif
                </div>
            </div>
        </div>
    </div>

@stop