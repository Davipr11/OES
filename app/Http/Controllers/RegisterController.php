<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return redirect('/home');
        }
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'Nombres'=>'required',
            'Apellidos'=>'required',
            'Tipo_documento'=>'required',
            'Documento'=>'required',
            'Fecha_nacimiento'=>'required',
            'Correo'=>'required',
            'Direccion'=>'required',
            'Tipo_Usuario'=>'required',
            'Usuario'=>'required',
            'Contrasena'=>'required',
            'Estado'=>'required'
        ]);
        $user=new User;   
        $user->Nombres=$request->Nombres;
        $user->Apellidos=$request->Apellidos;
        $user->Tipo_documento=$request->Tipo_documento;
        $user->Documento=$request->Documento;
        $user->Fecha_nacimiento=$request->Fecha_nacimiento;
        $user->Correo=$request->Correo;
        $user->Direccion=$request->Direccion;
        $user->Tipo_Usuario=$request->Tipo_Usuario;
        $user->Usuario=$request->Usuario;
        $user->Contrasena=$request->Contrasena;
        $user->Estado=$request->Estado;

        $user->save();

        return redirect()->route('login')->with('success', 'Registrado');
    }
}
