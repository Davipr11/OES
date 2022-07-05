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
        }else{
                if(auth()->user()->Tipo_Usuario==1){
                    $preguntas=DB::select('SELECT p.id, p.pregunta,p.email, p.created_at
                    FROM preguntas p
                    order by p.created_at DESC');
                    
                    $respuestas=DB::select('SELECT respuesta, id_pregunta
                    FROM `respuestas`');
                    return view('respuesta', compact('preguntas', 'respuestas'));
                }else if(auth()->user()->Tipo_Usuario==2){
                    return redirect('/operador');
                }else{
                    return redirect('/operador2');
                }
        }
        
    }

    public function responder(RespuestaRequest $request){
        $respuesta=Respuesta::create($request->validated());
        return redirect('respuesta')->withSuccess('Respondido');
    }

    public function eliminar($id){
        $pregunta= Pregunta::findOrFail($id);
        $pregunta->delete();
        return redirect('respuesta')->withSuccess('Eliminado');
    }

    public function editar($id){
        $pregunta=Pregunta::findOrFail($id);
        return view('preguntaEdit', compact('pregunta'));
    }
    public function update($id){
        $pregunta=request()->except(['_token', '_method', 'Editar']);
        Pregunta::where('id','=',$id)->update($pregunta);

        
        return redirect('respuesta')->withSuccess('Editado ');
    }
}
