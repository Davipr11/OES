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
            return redirect('/Premio_nacional_OES/Evaluadores');
        }
        return view('CambioContrasena');
    }


    public function cambiar(CambioContraseñaRequest $request, User $usuario){
        try {
           $usuario=auth()->user();
            $credential=$request->getCredential();
            if(Auth::validate($credential)){
                $usuario->update([
                    'password'=>bcrypt($request->nuevapassword)
                ]);
                return redirect('cambiocontrasena')->withSuccess('Cambiado');
            }else{
                return redirect('cambiocontrasena')->withErrors('Credencial incorrecta');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        

    }
}
