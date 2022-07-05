<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PreguntaRequest;
use App\Models\User;
use App\Models\Pregunta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PreguntaController extends Controller
{
    public function index(){
        
        $preguntas=DB::select('SELECT p.id, p.pregunta,p.email, p.created_at
        FROM preguntas p
        order by p.created_at DESC');
       
       $respuestas=DB::select('SELECT respuesta, id_pregunta
       FROM `respuestas`');
       return view('pregunta', compact('preguntas', 'respuestas'));
    }

    public function preguntar(PreguntaRequest $request){
        $datos=$request->validated();
        $datos=$request->getData();
        $pregunta=Pregunta::create($datos);
        return redirect('pregunta')->withSuccess('Pregunta enviada');    
    }

}
