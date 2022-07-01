<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RespuestaRequest;


class RespuestaController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return redirect('/login');
        }
        $preguntas=DB::select('SELECT p.id, p.pregunta,u.Usuario, p.created_at
        FROM preguntas p
        inner join users u on u.id=p.id_user
        order by p.created_at DESC');
        
        $respuestas=DB::select('SELECT respuesta, id_pregunta
        FROM `respuestas`');
        return view('respuesta', compact('preguntas', 'respuestas'));
    }

    public function responder(RespuestaRequest $request){
        $respuesta=Respuesta::create($request->validated());
        return redirect('respuesta')->withSuccess('respondido');
    }
}
