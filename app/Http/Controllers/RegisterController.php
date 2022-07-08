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
            return redirect('/Premio_nacional_OES/Evaluadores');
        }
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'Nombres'=>'required|string|max:30',
            'Apellidos'=>'required|string|max:30',
            'Tipo_documento'=>'required|numeric',
            'Documento'=>'required|string|max:11|unique:users',
            'Fecha_nacimiento'=>'required|date',
            'Correo'=>'required|email|unique:users',
            'Direccion'=>'required|string|max:15',
            'Tipo_Usuario'=>'required|numeric',
            'Usuario'=>'required|string|unique:users',
            'Contrasena'=>'required|string|min:3',
            'Estado'=>'required|string'
        ]);
        /*$request->messages([
            'required'=>'El/La :attribute es requerido',
            'date'=>'La :attribute debe ser una fecha valida',
            'Correo.email'=>'El correo debe ser un correo valido',
            'string'=>'El :attribute debe ser una cadena de texto',
            'max'=>'El/la :attribute tiene mas de los caracteres permitidos',
            'unique'=>'El/la :attribute ya se encuentra registrado, debe ser unico'

        ]);*/
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

        return redirect('/Premio_nacional_OES/Evaluadores/register')->with('success', 'Registrado');
    }
}
