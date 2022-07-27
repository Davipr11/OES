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
        try {
                if(!Auth::check()){
                    return redirect('/Premio_nacional_OES/Evaluadores');
                }else{
                        if(auth()->user()->Tipo_Usuario==1){
                            $preguntas=DB::select('SELECT p.id, p.pregunta,p.email, p.created_at
                            FROM preguntas p
                            order by p.created_at DESC');
                            
                            $respuestas=DB::select('SELECT respuesta, id_pregunta
                            FROM `respuestas`');
                            return view('respuesta', compact('preguntas', 'respuestas'));
                        }else if(auth()->user()->Tipo_Usuario==2){
                            return redirect('/evaluador');
                        }else{
                            return redirect('/evaluador2');
                        }
                }
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors('Error');
            }
        
        
    }

    public function responder(RespuestaRequest $request){
        try {
           $respuesta=Respuesta::create($request->validated());
            return redirect('Premio_nacional_OES/Evaluadores/respuesta')->withSuccess('Respondido');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }

    public function eliminar($id){
        try {
            $pregunta= Pregunta::findOrFail($id);
            $pregunta->delete();
            return redirect('Premio_nacional_OES/Evaluadores/respuesta')->withSuccess('Eliminado');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }

    public function editar($id){
        try {
            $pregunta=Pregunta::findOrFail($id);
            return view('preguntaEdit', compact('pregunta'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }
    public function update($id){

        try {
            $pregunta=request()->except(['_token', '_method', 'Editar']);
            Pregunta::where('id','=',$id)->update($pregunta);       
            return redirect('Premio_nacional_OES/Evaluadores/respuesta')->withSuccess('Editado ');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }
}
