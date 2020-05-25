<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Hash, Aunt;
use App\User;
class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getUsers(){
        $users=User::orderBy('id','Desc')->get();
        $data=['users'=>$users];
        return view('users.users.home',$data);
    }

    public function getUsersEdit($id){
        $user = User::find($id);
        $data = ['user'=> $user];
        return view('users.users.edit',$data);
    }

    public function postUsersEdit(Request $request, $id){
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ];

        $messages=[
            'name.required'=>'Nombre es obligatorio.',
            'lastname.required'=>'Apellido es obligatorio.',
            'email.required'=>'Correo electronico es obligatorio.',
            'email.email'=>'El formato de su correo electrónico es invalido.',
            'email.unique'=>'El correo electronico ya esta en uso.'
        ];

        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user= User::find($id);
            $user->name=e($request->input('name'));
            $user->lastname=e($request->input('lastname'));
            $user->email=e($request->input('email'));

            if($user->save()):
                return redirect('/admin/users')->with('message','Tu usuario se modifico con exito')->with('typealert','success');
            endif;
        endif;
    }

    public function getUsersDelete($id){
        $user= User::find($id);
        if($user->delete()):
            return back()->with('message','Usuario eliminado con exito')->with('typealert','success');
        endif;
    }
}