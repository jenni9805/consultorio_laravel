<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\User;

class UsuariosController extends Controller
{
    public function __Construct(){
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){
        return view('conexion.login');
    }
    
    public function postLogin(Request $request){
        $rules=[
            'email'=>'required|email',
            'pass'=>'required|min:8'
        ];
        $message=[
            'email.required'=>'El correo electrónico es obligatorio',
            'email.email'=>'El formato no es de email',
            'pass.required'=>'La contraseña es obligatoria',
            'pass.min'=>'La contraseña debe tener minimo 8 caracteres'
        ];
        $validar=Validator::make($request->all(),$rules,$message);
        if($validar->fails()):
           return back()->withErrors($validar)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
           if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('pass')],true)):
               return redirect('/admin');
           else:
               return back()->withErrors($validar)->with('message','Correo o contraseña incorrectos')->with('typealert','danger');
           endif;
       endif;
    }

    public function getRegister(){
        return view('conexion.Registro');
    }

    public function postRegister(Request $request){
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:App\User,email',
            'pass' => 'required|min:8',
            'cpass' => 'required|min:8|same:pass'
        ];

        $messages=[
            'name.required'=>'Nombre es obligatorio.',
            'lastname.required'=>'Apellido es obligatorio.',
            'email.required'=>'Correo electronico es obligatorio.',
            'email.email'=>'El formato de su correo electrónico es invalido.',
            'email.unique'=>'El cooreo electronico ya esta en uso.',
            'pass.required'=>'Porfavor escriba una contraseña.',
            'pass.min'=>'La contraseña debe tener almenos 8 caracteres.',
            'cpass.required'=>'Confirme la contraseña.',
            'cpass.min'=>'La confirmación de contraseña debe tener almenos 8 caracteres.',
            'cpass.same'=>'Las contraseñas no coinciden.'

        ];

        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user= new User;
            $user->name=e($request->input('name'));
            $user->lastname=e($request->input('lastname'));
            $user->email=e($request->input('email'));
            $user->password=Hash::make($request->input('pass'));

            if($user->save()):
                return redirect('/login')->with('message','Tu usuario se creo con exito')->with('typealert','success');
            endif;
        endif;
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
