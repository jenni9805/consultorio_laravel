@extends('patients.master')
@section('title','Editar')

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{url('/admin/patients/edit')}}"><i class="fas fa-user-friends"></i>Edit users</a>
    </li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="panel show">
            <div class="box box_register shadow">
                <div class="inside">
                    {!!Form::open(['url' => '/admin/patients/'.$patient->id.'/edit'])!!} 
                    <label for="name">Name:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        {!!Form::text('name',$patient->name,['class' => 'form-control', 'required'])!!}
                    </div>
                    <label for="lastname">Lastname:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        {!!Form::text('lastname',$patient->lastname,['class' => 'form-control', 'required'])!!}
                    </div>
                    <label for="email">Email:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        {!!Form::email('email',$patient->email,['class' => 'form-control', 'required'])!!}
                    </div>
                    <label for="confirmed">Confirmed:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        {!! Form::select('confir', ['1'=>'Compartir','0'=>'No compartir'], $patient->confirmed, ['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit('Editar', ['class' => 'btn btn-success mtop16'])!!}
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