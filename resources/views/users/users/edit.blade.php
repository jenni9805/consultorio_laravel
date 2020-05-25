@extends('users.master')
@section('title','Editar')

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{url('/admin/users/edit')}}"><i class="fas fa-user-friends"></i>Edit users</a>
    </li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="panel show">
            <div class="box box_register shadow">
                <div class="inside">
               {!!Form::open(['url' => '/admin/users/'.$user->id.'/edit'])!!} 
              
               <label for="name">Nombre:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                {!!Form::text('name',$user->name,['class' => 'form-control', 'required'])!!}
               </div>
              
               <label for="lastname" class="mtop16">Apellido:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                {!!Form::text('lastname',$user->lastname,['class' => 'form-control', 'required'])!!}
               </div>
              
               <label for="email" class="mtop16">Correo electrónico:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                  </div>
                {!!Form::email('email',$user->email,['class' => 'form-control', 'required'])!!}
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