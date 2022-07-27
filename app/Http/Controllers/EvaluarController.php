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
use App\Http\Requests\ScaleCardioRequest;
use App\Http\Requests\ScaleCancerRequest;
use App\Http\Requests\ScaleEnfoqueRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Result;
use App\Models\Rule;


class EvaluarController extends Controller
{

    public function index($id){
        if(Auth::check()){
            $idinscritos=users_inscription::findOrFail($id);
            return view('evaluacion',compact('idinscritos'));
        }
        return redirect('/Premio_nacional_OES/Evaluadores');
    }


    public function evaluarPerinatal($Codigorandom, $category){
        if(Auth::check()){
            try {              
                $is=ScalesUser::where('category',1)->get();
                $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                foreach($theinscritos as $th){
                    foreach($is as $i){
                        if($i->codigoUsuario==$th->Codigorandom){
                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                        }
                    }
                }           
                $inscripcion=users_inscription::findOrFail($Codigorandom);
                $scales=Scale::all();

                $rules=Rule::all();
                $recommendations=Recommendation::where('category',$category )->get();

                return view('EvaluarPerinatal', compact('inscripcion', 'recommendations', 'scales', 'rules'));
           
            } catch (\Throwable $th) {
               return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
            }
            
        }
        return redirect('/Premio_nacional_OES/Evaluadores');
    }


    





    public function saveEvaluar(ScaleUsersRequest $request, $Codigorandom){
        try {
            $is=ScalesUser::where('category',1)->get();
                $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                foreach($theinscritos as $th){
                    foreach($is as $i){
                        if($i->codigoUsuario==$th->Codigorandom){
                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                        }
                    }
                }  
            $datos=$request->validated();
            $datos=$request->getData();
            $scalesuser=ScalesUser::create($datos);
            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Atención en salud Materno Perinatal');
        } catch (\Throwable $th) {
            return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
        }        
    }

        public function evaluarCardiovascular($Codigorandom, $category){
                if(Auth::check()){
                    try {              
                        $is=ScalesUser::where('category',2)->get();
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }
                            }
                        }             
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $scales=Scale::all();

                        $rules=Rule::all();
                        $recommendations=Recommendation::where('category',$category )->get();

                        return view('EvaluarCardiovascular', compact('inscripcion', 'recommendations', 'scales', 'rules'));
                
                    } catch (\Throwable $th) {
                    return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
                    }
                    
                }
                return redirect('/Premio_nacional_OES/Evaluadores');
            }

            public function saveEvaluarcardio(ScaleCardioRequest $request, $Codigorandom){
                try {
                    $is=ScalesUser::where('category',2)->get();
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }
                            }
                        }  
                    $datos=$request->validated();
                    $datos=$request->getData();
                    $scalesuser=ScalesUser::create($datos);
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Detección temprana de enfermedades cardiovasculares');
                } catch (\Throwable $th) {
                    return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
                }        
            }


            public function evaluarCancer($Codigorandom, $category){
                if(Auth::check()){
                    try {              
                        $is=ScalesUser::where('category',3)->get();
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }
                            }
                        }             
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $scales=Scale::all();

                        $rules=Rule::all();
                        $recommendations=Recommendation::where('category',$category )->get();

                        return view('EvaluarCancer', compact('inscripcion', 'recommendations', 'scales', 'rules'));
                
                    } catch (\Throwable $th) {
                    return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
                    }
                    
                }
                return redirect('/Premio_nacional_OES/Evaluadores');
            }

            public function saveEvaluarcancer(ScaleCancerRequest $request, $Codigorandom){
                try {
                    $is=ScalesUser::where('category',3)->get();
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }
                            }
                        }
                    $datos=$request->validated();
                    $datos=$request->getData();
                    $scalesuser=ScalesUser::create($datos);
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Detección temprana de cáncer');
                } catch (\Throwable $th) {
                    return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
                }        
            }

            public function evaluarEnfoque($Codigorandom, $category){
                if(Auth::check()){
                    try {              
                        $is=ScalesUser::where('category',4)->get();
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }
                            }
                        }             
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $scales=Scale::all();

                        $rules=Rule::all();
                        $recommendations=Recommendation::where('category',$category )->get();

                        return view('EvaluarEnfoque', compact('inscripcion', 'recommendations', 'scales', 'rules'));
                
                    } catch (\Throwable $th) {
                    return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
                    }
                    
                }
                return redirect('/Premio_nacional_OES/Evaluadores');
            }

            public function saveEvaluarenfoque(ScaleEnfoqueRequest $request, $Codigorandom){
                try {
                    $is=ScalesUser::where('category',4)->get();
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }
                            }
                        }
                    $datos=$request->validated();
                    $datos=$request->getData();
                    $scalesuser=ScalesUser::create($datos);
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Enfoque diferencial de las atenciones del prestador');
                } catch (\Throwable $th) {
                    return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
                }        
            }


    public function resultado(ResultRequest $request, $Codigorandom){   
        //$evaluadoscale=$Codigorandom;
        //DB::select('SELECT  
         //`codigoUsuario` FROM `scales_users` WHERE codigoUsuario=7857');
         try {
                    $resul=Result::all();
                    foreach($resul as $r){                  
                            if($r->User==$Codigorandom){
                                return redirect()->back()->withErrors('Resultado ya generado');
                            }                 
                    }
                $evaluadosPerinatal=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',1)->get();
                $evaluadosCardio=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',2)->get();
                $evaluadosCancer=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',3)->get();
                $evaluadosEnfoque=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',4)->get();
                $resultado=new Result; 
                foreach($evaluadosPerinatal as $evalp){       
                              
                    $porcentajeestructuraperinatal=round(((($evalp->estructura)*100)/10)*0.10,2);
                    $porcentajeprocesoperinatal=round(((($evalp->proceso)*100)/30)*0.10,2);
                    $porcentajeresultadoperinatal=round(((($evalp->resultado)*100)/25)*0.05,2);
                    $porcentajeperinatal=$porcentajeestructuraperinatal+$porcentajeprocesoperinatal+$porcentajeresultadoperinatal;
                    

                    $resultado->porcentaje_estructura_perinatal	=$porcentajeestructuraperinatal;
                    $resultado->porcentaje_proceso_perinatal=$porcentajeprocesoperinatal;
                    $resultado->porcentaje_resultado_perinatal=$porcentajeresultadoperinatal;
                    $resultado->porcentaje_perinatal=$porcentajeperinatal;

                    
                }
                foreach($evaluadosCardio as $evalcar){       
                              
                    $porcentajeestructuracardio=round(((($evalcar->estructura)*100)/10)*0.10,2);
                    $porcentajeprocesocardio=round(((($evalcar->proceso)*100)/45)*0.10,2);
                    $porcentajeresultadocardio=round(((($evalcar->resultado)*100)/20)*0.05,2);
                    $porcentajecardio=$porcentajeestructuracardio+$porcentajeprocesocardio+$porcentajeresultadocardio;
                    

                    $resultado->porcentaje_estructura_cardio=$porcentajeestructuracardio;
                    $resultado->porcentaje_proceso_cardio=$porcentajeprocesocardio;
                    $resultado->porcentaje_resultado_cardio=$porcentajeresultadocardio;
                    $resultado->porcentaje_cardio=$porcentajecardio;                
                }

                foreach($evaluadosCancer as $evalcan){       
                              
                    $porcentajeestructuracancer=round(((($evalcan->estructura)*100)/10)*0.10,2);
                    $porcentajeprocesocancer=round(((($evalcan->proceso)*100)/20)*0.10,2);
                    $porcentajeresultadocancer=round(((($evalcan->resultado)*100)/20)*0.05,2);
                    $porcentajecancer=$porcentajeestructuracancer+$porcentajeprocesocancer+$porcentajeresultadocancer;
                    

                    $resultado->porcentaje_estructura_cancer=$porcentajeestructuracancer;
                    $resultado->porcentaje_proceso_cancer=$porcentajeprocesocancer;
                    $resultado->porcentaje_resultado_cancer=$porcentajeresultadocancer;
                    $resultado->porcentaje_cancer=$porcentajecancer;                
                }

                foreach($evaluadosEnfoque as $evalen){       
                              
                    $porcentajeestructuraenfoque=round(((($evalen->estructura)*100)/15)*0.10,2);
                    $porcentajeprocesoenfoque=round(((($evalen->proceso)*100)/10)*0.10,2);
                    $porcentajeresultadoenfoque=round(((($evalen->resultado)*100)/5)*0.05,2);
                    $porcentajeenfoque=$porcentajeestructuraenfoque+$porcentajeprocesoenfoque+$porcentajeresultadoenfoque;
                    

                    $resultado->porcentaje_estructura_enfoque=$porcentajeestructuraenfoque;
                    $resultado->porcentaje_proceso_enfoque=$porcentajeprocesoenfoque;
                    $resultado->porcentaje_resultado_enfoque=$porcentajeresultadoenfoque;
                    $resultado->porcentaje_enfoque=$porcentajeenfoque;                
                }
                $resultado->PorcentajeEstructura=$porcentajeestructuraperinatal+$porcentajeestructuracardio+$porcentajeestructuracancer+$porcentajeestructuraenfoque;
                $resultado->PorcentajeProceso=$porcentajeprocesoperinatal+$porcentajeprocesocardio+$porcentajeprocesocancer+$porcentajeprocesoenfoque;
                $resultado->PorcentajeResultado=$porcentajeresultadoperinatal+$porcentajeresultadocardio+$porcentajeresultadocancer+$porcentajeresultadoenfoque;
                $resultado->PorcentajeTotal=$porcentajeperinatal+$porcentajecardio+$porcentajecancer+$porcentajeenfoque;

            $resultado->User=$Codigorandom;
            $resultado->save();  
            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/resultadofinal');
         } catch (\Throwable $th) {
            /*
            if (DB::table('results')->where('User', $Codigorandom)->exists()) {
                return redirect('/Premio_nacional_OES/Evaluadores/evals');
            }else{
                return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion');
            }*/
            return redirect()->back()->withErrors('Error al generar resultado, realice todas las evaluaciones');

         }
        
    }

        public function final($id){
            try {
                $inscripcion=users_inscription::where('Codigorandom', $id);
                $resultadofinal=Result::where('User', $id)->get();
                return view('resultado', compact('resultadofinal', 'inscripcion'));
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors('Error');
            }         
        }

    public function evaluados(){

        try {
            if(auth()->user()->Tipo_Usuario==1){
                $evaluados=DB::table('results')
                ->join('users_inscriptions','results.User','=','users_inscriptions.Codigorandom')
                ->select('results.porcentaje_estructura_perinatal', 
                'results.porcentaje_proceso_perinatal', 'results.porcentaje_resultado_perinatal',
                'results.porcentaje_estructura_cardio', 'results.porcentaje_proceso_cardio', 'results.porcentaje_resultado_cardio', 
                'results.porcentaje_estructura_cancer', 'results.porcentaje_proceso_cancer', 'results.porcentaje_resultado_cancer', 'results.porcentaje_estructura_enfoque',
                'results.porcentaje_proceso_enfoque', 'results.porcentaje_resultado_enfoque', 'results.PorcentajeEstructura', 'results.PorcentajeProceso', 'results.PorcentajeResultado', 
                'results.porcentaje_perinatal', 'results.porcentaje_cardio', 'results.porcentaje_cancer', 'results.porcentaje_enfoque', 'results.PorcentajeTotal', 'results.User')
                ->orderbyDesc('results.PorcentajeTotal')->get();
            }else{
                /*$evaluados=DB::select('SELECT `porcentaje_estructura_perinatal`, 
                `porcentaje_proceso_perinatal`, `porcentaje_resultado_perinatal`,
                `porcentaje_estructura_cardio`, `porcentaje_proceso_cardio`, `porcentaje_resultado_cardio`, 
                `porcentaje_estructura_cancer`, `porcentaje_proceso_cancer`, `porcentaje_resultado_cancer`, `porcentaje_estructura_enfoque`,
                `porcentaje_proceso_enfoque`, `porcentaje_resultado_enfoque`, `PorcentajeEstructura`, `PorcentajeProceso`, `PorcentajeResultado`, 
                `porcentaje_perinatal`, `porcentaje_cardio`, `porcentaje_cancer`, `porcentaje_enfoque`, `PorcentajeTotal`, `User`
                FROM `results` r
                inner join users_inscriptions ui on ui.Codigorandom=r.User
                where ui.Evaluador=:id
                order by r.PorcentajeTotal desc',['id' => auth()->user()->id]);*/

                $evaluados=DB::table('results')
                ->join('users_inscriptions','results.User','=','users_inscriptions.Codigorandom')
                ->select('results.porcentaje_estructura_perinatal', 
                'results.porcentaje_proceso_perinatal', 'results.porcentaje_resultado_perinatal',
                'results.porcentaje_estructura_cardio', 'results.porcentaje_proceso_cardio', 'results.porcentaje_resultado_cardio', 
                'results.porcentaje_estructura_cancer', 'results.porcentaje_proceso_cancer', 'results.porcentaje_resultado_cancer', 'results.porcentaje_estructura_enfoque',
                'results.porcentaje_proceso_enfoque', 'results.porcentaje_resultado_enfoque', 'results.PorcentajeEstructura', 'results.PorcentajeProceso', 'results.PorcentajeResultado', 
                'results.porcentaje_perinatal', 'results.porcentaje_cardio', 'results.porcentaje_cancer', 'results.porcentaje_enfoque', 'results.PorcentajeTotal', 'results.User')
                ->where('users_inscriptions.Evaluador', auth()->user()->id)
                ->orderbyDesc('results.PorcentajeTotal')->get();
            }
            

            return view('evaluados', compact('evaluados'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }
}
