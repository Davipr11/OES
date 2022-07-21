<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/Premio_nacional_OES/Evaluadores');
        }
        return view('Login');
    }

    public function Login(LoginRequest $request){
        $credentials=$request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Credenciales incorrectas');
        }
        $usuario=Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($usuario);
        return $this->authenticated($request, $usuario);
    }

    public function authenticated(Request $request, $usuario){
        if(auth()->user()->Tipo_Usuario==1){
            return redirect('/Premio_nacional_OES/Evaluadores');
        }else if(auth()->user()->Tipo_Usuario==2){
            return redirect('/operador');
        }else{
            return redirect('/operador2');
        }
        //return redirect('/home');
    }
}
