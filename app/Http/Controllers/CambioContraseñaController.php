<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CambioContraseñaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CambioContraseñaController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return redirect('/login');
        }
        return view('CambioContrasena');
    }


    public function cambiar(CambioContraseñaRequest $request, User $usuario){
        $usuario=auth()->user();
        $credential=$request->getCredential();
        if(Auth::validate($credential)){
            $usuario->update([
                'password'=>bcrypt($request->nuevapassword)
            ]);
            return redirect('cambiocontrasena')->withErrors('Cambiado');
        }else{
            return redirect('cambiocontrasena')->withErrors('Datos erroneos');
        }

    }
}
