@extends('users.master')

@section('title','Users')

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"><i class="fas fa-user-friends"></i>Users</a>
    </li>
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-user-friends"></i>Users</h2>
        </div>
        <div class="inside">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Last name</td>
                        <td>Email</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="opts">
                                    <a href="{{url('/admin/users/'.$user->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="{{url('/admin/users/'.$user->id.'/delete')}}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
