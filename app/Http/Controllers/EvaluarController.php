<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users_inscription;
use App\Models\Scale;
use App\Models\ScalesUser;
use App\Models\Recommendation;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ScaleUsersRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Result;


class EvaluarController extends Controller
{
    public function evaluar($Codigorandom){
        if(Auth::check()){
            try {              
                $is=ScalesUser::all();
                $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                foreach($theinscritos as $th){
                    foreach($is as $i){
                        if($i->codigoUsuario==$th->Codigorandom){
                            return redirect('/Premio_nacional_OES/Evaluadores/evaluados');
                        }
                    }
                }
                
                $inscripcion=users_inscription::findOrFail($Codigorandom);
                $scales=Scale::all();
                $recommendations=Recommendation::all();
                return view('Evaluar', compact('inscripcion', 'scales', 'recommendations'));
           
            } catch (\Throwable $th) {
                return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
            }
            
        }
        return redirect('/Premio_nacional_OES/Evaluadores');
    }

    public function saveEvaluar(ScaleUsersRequest $request, $Codigorandom){
        try {
            $evaluado=ScalesUser::create($request->validated());
            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/resultado');
        } catch (\Throwable $th) {
            return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
        }        
    }

    public function resultado(ResultRequest $request, $Codigorandom){   
        //$evaluadoscale=$Codigorandom;
        //DB::select('SELECT  
         //`codigoUsuario` FROM `scales_users` WHERE codigoUsuario=7857');
         try {
                $evaluados=ScalesUser::where('codigoUsuario', $Codigorandom)->get();

                foreach($evaluados as $eval){       
                    $resultado=new Result;           
                    $porcentajegobierno=(($eval->scalegobierno1 + $eval->scalegobierno2 + $eval->scalegobierno3)*100)/15;
                    $porcentajecohesion=(($eval->scalecohesionintegrabilidad1 + $eval->scalecohesionintegrabilidad2 + $eval->scalecohesionintegrabilidad3 + $eval->scalecohesionintegrabilidad4)*100)/20;
                    $porcentajetrazabilidad=(($eval->scaletrazabilidadresultado1 + $eval->scaletrazabilidadresultado2 + $eval->scaletrazabilidadresultado3)*100)/15;
                    $resultado->PorcenajeGobierno=$porcentajegobierno;
                    $resultado->PorcenajeCohesionIntegralidad=$porcentajecohesion;
                    $resultado->PorcenajeTrazabilidad=$porcentajetrazabilidad;
                    $resultado->PorcenajeTotal=($porcentajegobierno*0.4)+($porcentajecohesion*0.3)+($porcentajetrazabilidad*0.3);
                    $resultado->scaleUser=$eval->id;
                }
            $resultado->save();  
            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$eval->id.'/resultadofinal');
         } catch (\Throwable $th) {
            if (DB::table('scales_users')->where('codigoUsuario', $Codigorandom)->exists()) {
                return redirect('/Premio_nacional_OES/Evaluadores/evaluados');
            }else{
                return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion');
            }
         }
        
    }
        public function final($id){
            try {
                $resultadofinal=Result::where('scaleUser', $id)->get();
                return view('resultado', compact('resultadofinal'));
            } catch (\Throwable $th) {
                return view('home');
            }         
        }
    public function evaluados(){

        try {
            $evaluados=DB::select('SELECT `PorcenajeGobierno`, `PorcenajeCohesionIntegralidad`, 
            `PorcenajeTrazabilidad`, `PorcenajeTotal`, u.nit, su.codigoUsuario, u.ips
            FROM `results` r
            
            inner join scales_users su on su.id=r.scaleUser
            inner join users_inscriptions u on u.Codigorandom=su.codigoUsuario
            order by r.PorcenajeTotal desc');

            return view('evaluados', compact('evaluados'));
        } catch (\Throwable $th) {
            return view('home');
        }
        
    }
}
