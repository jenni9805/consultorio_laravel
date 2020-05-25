<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Hash, Auth;
use App\Patients;
use App\User;

class PatientsController extends Controller
{
    
    public function __Construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users=User::find(Auth::id());
        $users->patients;
        return view('patients.users.home', compact('users'));
    }

    public function getPatients(){
        
        //$patients=Patients::select('select id,name,lastname,email,confirmed,user_id from patients where active = ?', ['1']);
        //$patients=Patients::table('patients')->where('confirmed','=','1');
        //$users=DB::table('patients')->where('confirmed',1)->get();
        $users = DB::table('users')
        ->join('patients', 'users.id', '=', 'patients.user_id')
        ->select('users.name', 'patients.*')
        ->where('confirmed', 1)
        ->get();
        //dd($users);
        return view('patients.users.homeall',compact('users'));
    }

    public function getPatientsEdit($id){
        $patient=Patients::find($id);
        $data=['patient'=>$patient];
        return view('patients.users.edit',$data);
    }

    public function postPatientsEdit(Request $request, $id){
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            //'confirmed'=> 'required',
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
            $patient=Patients::find($id);
            $patient->name=e($request->input('name'));
            $patient->lastname=e($request->input('lastname'));
            $patient->email=e($request->input('email'));
            $patient->confirmed=e($request->input('confir'));

            if($patient->save()):
                return redirect('/admin/patients')->with('message','Tu usuario se modifico con exito')->with('typealert','success');
            endif;
        endif;
    }

    public function getPatientsDelete($id){
        $patient= Patients::find($id);
        if($patient->delete()):
            return back()->with('message','Usuario eliminado con exito')->with('typealert','success');
        endif;
    }



    public function getPatientsRegister(){
        return view('patients.users.create');
    }

    public function postPatientsRegister(Request $request){
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:App\Patients,email',

        ];

        $messages=[
            'name.required'=>'Nombre es obligatorio.',
            'lastname.required'=>'Apellido es obligatorio.',
            'email.required'=>'Correo electronico es obligatorio.',
            'email.email'=>'El formato de su correo electrónico es invalido.',
            'email.unique'=>'El cooreo electronico ya esta en uso.',

        ];

        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $patient= new Patients;
            $patient->name=e($request->input('name'));
            $patient->lastname=e($request->input('lastname'));
            $patient->email=e($request->input('email'));
            $patient->confirmed=e($request->input('confir'));
            $patient->user_id=(Auth::id());

            if($patient->save()):
                return redirect('/admin/patients')->with('message','Tu usuario se creo con exito')->with('typealert','success');
            endif;
        endif;
    }
}
