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
        if(auth()->user()->Tipo_Usuario==2 || auth()->user()->Tipo_Usuario==3){
            return redirect()->back();
        }
        return view('Register');
    }

    public function register(Request $request){
        $request->validate([
            'Nombres'=>'required|string|max:30',
            'Apellidos'=>'required|string|max:30',
            'Tipo_documento'=>'required|numeric',
            'Documento'=>'required|string|max:11|unique:users',
            'Fecha_nacimiento'=>'required|date|before:today',
            'Correo'=>'required|email|unique:users|max:40',
            'Direccion'=>'required|string|max:20',
            'Tipo_Usuario'=>'required|numeric',
            'Usuario'=>'required|string|unique:users|min:4',
            'Contrasena'=>'required|string|min:3',
            'Estado'=>'required|string',
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

        return redirect('/Premio_nacional_OES/Evaluadores/register')->with('success', 'Registrado');
    }
    /*public function register(RegisterRequest $request){
        $users=User::create($request->validated());
        return redirect('/Premio_nacional_OES/Evaluadores/register')->with('success', 'Registrado');
    }*/
}
