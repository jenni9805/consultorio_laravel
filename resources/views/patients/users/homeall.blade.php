@extends('patients.master')

@section('title','Patients')

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{url('/admin/patients')}}"><i class="fas fa-user-friends"></i>Patients</a>
    </li>
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-user-friends"></i>All patients</h2>
        </div>
        <div class="inside">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Last name</td>
                        <td>Email</td>
                        <td>Confirmed</td>
                        <td>By:</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{!! Form::checkbox('confirmed', $user->confirmed, $user->confirmed, ['class'=>'form-control-box', 'required']) !!}</td>
                            <td>{{$user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('/admin/patients/create') }}"data-toggle="tooltip" data-placement="top" title="Crear">
                <i class="fas fa-user"></i> New patient
            </a>
            <a href="{{ url('/admin/patients') }}"data-toggle="tooltip" data-placement="top" title="All">
                <i class="fas fa-user-friends"></i> My patients
            </a>
        </div>
    </div>
</div>

@endsection
