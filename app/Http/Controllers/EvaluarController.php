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
use App\Http\Requests\ScaleSalvarCardioRequest;
use App\Http\Requests\ScaleSalvarPerinatalRequest;
use App\Http\Requests\ScaleSalvarCancerRequest;
use App\Http\Requests\ScaleSalvarEnfoqueRequest;
use App\Models\Result;
use App\Models\Rule;
use App\Charts\ResultsInscriptions;
use App\Charts\InscritosTerritorio;
use App\Charts\InscritosCategorias;
use App\Charts\InscritosFases;
use App\Charts\InscritosFasesCategorias;

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
                
                $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                $inscripcion=users_inscription::findOrFail($Codigorandom);
                $scales=Scale::all();
                $is=ScalesUser::where('category',1)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                $rules=Rule::all();
                $recommendations=Recommendation::where('category',$category )->get();
                foreach($theinscritos as $th){
                    foreach($is as $i){
                        if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                        }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){
                            return view('EvaluarPerinatal',  compact('inscripcion', 'recommendations', 'scales', 'rules', 'is'));
                        }
                    }
                }           
                

                return view('EvaluarPerinatal', compact('inscripcion', 'recommendations', 'scales', 'rules', 'is'));
           
            } catch (\Throwable $th) {
               return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
            }
            
        }
        return redirect('/Premio_nacional_OES/Evaluadores');
    }



    public function saveEvaluar(ScaleUsersRequest $request, $Codigorandom){
        try {
                $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                $inscripcion=users_inscription::findOrFail($Codigorandom);
                $is=ScalesUser::where('category',1)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                foreach($theinscritos as $th){
                    foreach($is as $i){
                        if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                        }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){
                            $scaleuser=$request->validated();
                            $scaleuser=$request->getData();  
                             ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',1)->update($scaleuser);

                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Atención en salud Materno Perinatal');
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

    public function salvarEvaluarPerinatal(ScaleSalvarPerinatalRequest $request, $Codigorandom){
        try {
                $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                $inscripcion=users_inscription::findOrFail($Codigorandom);
                $is=ScalesUser::where('category',1)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                foreach($theinscritos as $th){
                    foreach($is as $i){
                        if($i->codigoUsuario==$th->Codigorandom  && $i->completado==1){
                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                        }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                            $scaleuser=$request->validated();
                            $scaleuser=$request->getData();  
                            ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',1)->update($scaleuser);

                            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Atención en salud Materno Perinatal');
                        }
                    }
                }                        
                        $datos=$request->validated();
                        $datos=$request->getData();                
                    $scalesuser=ScalesUser::create($datos);
            return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Atención en salud Materno Perinatal');
        } catch (\Throwable $th) {
            return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
        }        
    }
        public function evaluarCardiovascular($Codigorandom, $category){
                if(Auth::check()){
                    try {              
                        
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $scales=Scale::all();
                        $is=ScalesUser::where('category',2)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        $rules=Rule::all();
                        $recommendations=Recommendation::where('category',$category )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){
                                    return view('EvaluarCardiovascular',  compact('inscripcion', 'recommendations', 'scales', 'rules', 'is'));
                                }
                            }
                        }             
                        

                        return view('EvaluarCardiovascular', compact('inscripcion', 'recommendations', 'scales', 'rules', 'is'));
                
                    } catch (\Throwable $th) {
                    return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
                    }
                    
                }
                return redirect('/Premio_nacional_OES/Evaluadores');
            }

            public function saveEvaluarcardio(ScaleCardioRequest $request, $Codigorandom){
                try {
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $is=ScalesUser::where('category',2)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                                    $scaleuser=$request->validated();
                                    $scaleuser=$request->getData();  
                                    ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',2)->update($scaleuser);

                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Detección temprana de enfermedades cardiovasculares');
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


            public function salvarEvaluarcardio(ScaleSalvarCardioRequest $request, $Codigorandom){
                try {
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $is=ScalesUser::where('category',2)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom  && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                                    $scaleuser=$request->validated();
                                    $scaleuser=$request->getData();  
                                    ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',2)->update($scaleuser);

                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Detección temprana de enfermedades cardiovasculares');
                                }
                            }
                        }                        
                                $datos=$request->validated();
                                $datos=$request->getData();                
                            $scalesuser=ScalesUser::create($datos);
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Detección temprana de enfermedades cardiovasculares');
                } catch (\Throwable $th) {
                    return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
                }        
            }

















            public function evaluarCancer($Codigorandom, $category){
                if(Auth::check()){
                    try {              
                        
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $scales=Scale::all();
                        $is=ScalesUser::where('category',3)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        $rules=Rule::all();
                        $recommendations=Recommendation::where('category',$category )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){
                                    return view('EvaluarCancer',  compact('inscripcion', 'recommendations', 'scales', 'rules', 'is'));
                                }
                            }
                        }             
                        

                        return view('EvaluarCancer', compact('inscripcion', 'recommendations', 'scales', 'rules','is'));
                
                    } catch (\Throwable $th) {
                        return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
                    }
                    
                }
                return redirect('/Premio_nacional_OES/Evaluadores');
            }

            public function saveEvaluarcancer(ScaleCancerRequest $request, $Codigorandom){
                try {
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $is=ScalesUser::where('category',3)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                                    $scaleuser=$request->validated();
                                    $scaleuser=$request->getData();  
                                    ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',3)->update($scaleuser);

                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Detección temprana de cáncer');
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


            public function salvarEvaluarcancer(ScaleSalvarCancerRequest $request, $Codigorandom){
                try {
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $is=ScalesUser::where('category',3)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom  && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                                    $scaleuser=$request->validated();
                                    $scaleuser=$request->getData();  
                                    ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',3)->update($scaleuser);

                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Detección temprana de cáncer');
                                }
                            }
                        }                        
                                $datos=$request->validated();
                                $datos=$request->getData();                
                            $scalesuser=ScalesUser::create($datos);
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Detección temprana de cáncer');
                } catch (\Throwable $th) {
                    return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
                }        
            }





            public function evaluarEnfoque($Codigorandom, $category){
                if(Auth::check()){
                    try {              
                        ;
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $scales=Scale::all();
                        $is=ScalesUser::where('category',4)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        $rules=Rule::all();
                        $recommendations=Recommendation::where('category',$category )->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){
                                    return view('EvaluarEnfoque',  compact('inscripcion', 'recommendations', 'scales', 'rules', 'is'));
                                }
                            }
                        }             
                       

                        return view('EvaluarEnfoque', compact('inscripcion', 'recommendations', 'scales', 'rules','is'));
                
                    } catch (\Throwable $th) {
                    return redirect('/Premio_nacional_OES/Evaluadores')->withErrors('Error al evaluar');
                    }
                    
                }
                return redirect('/Premio_nacional_OES/Evaluadores');
            }

            public function saveEvaluarenfoque(ScaleEnfoqueRequest $request, $Codigorandom){
                try {
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $is=ScalesUser::where('category',4)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                                    $scaleuser=$request->validated();
                                    $scaleuser=$request->getData();  
                                    ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',4)->update($scaleuser);

                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Evaluado Enfoque diferencial de las atenciones del prestador');
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


            public function salvarEvaluarenfoque(ScaleSalvarEnfoqueRequest $request, $Codigorandom){
                try {
                        $inscripcion=users_inscription::findOrFail($Codigorandom);
                        $theinscritos=users_inscription::where('id',$Codigorandom )->get();
                        $is=ScalesUser::where('category',4)->where('codigoUsuario',$inscripcion->Codigorandom)->get();
                        foreach($theinscritos as $th){
                            foreach($is as $i){
                                if($i->codigoUsuario==$th->Codigorandom  && $i->completado==1){
                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withErrors('Modulo ya evaluado');
                                }else if($i->codigoUsuario==$th->Codigorandom && $i->completado==0){

                                    $scaleuser=$request->validated();
                                    $scaleuser=$request->getData();  
                                    ScalesUser::where('CodigoUsuario','=',$i->codigoUsuario)->where('category',4)->update($scaleuser);

                                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Enfoque diferencial de las atenciones del prestador');
                                }
                            }
                        }                        
                                $datos=$request->validated();
                                $datos=$request->getData();                
                            $scalesuser=ScalesUser::create($datos);
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/evaluaciones')->withSuccess('Salvado Enfoque diferencial de las atenciones del prestador');
                } catch (\Throwable $th) {
                    return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion')->withErrors('Error al evaluar');
                }        
            }






    public function resultado(ResultRequest $request, $Codigorandom){   
        //$evaluadoscale=$Codigorandom;
        //DB::select('SELECT  
         //`codigoUsuario` FROM `scales_users` WHERE codigoUsuario=7857');
        try {
            
            if(DB::table('results')->where('User', $Codigorandom)->exists()){
                try {
                   $result=$request->getResultPerinatal($Codigorandom); 
                   $resultc=$request->getResultCardio($Codigorandom);
                   $resultca=$request->getResultCancer($Codigorandom);  
                   $resulten=$request->getResultEnfoque($Codigorandom);
                    Result::where('User',$Codigorandom)->update($result);
                    Result::where('User',$Codigorandom)->update($resultc);
                    Result::where('User',$Codigorandom)->update($resultca);
                    Result::where('User',$Codigorandom)->update($resulten);


                    $resultT=$request->getResultTotal($Codigorandom);
                    Result::where('User',$Codigorandom)->update($resultT);
                    
                    return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$Codigorandom.'/resultadofinal');
                } catch (\Throwable $th) {
                    return redirect()->back()->withErrors('Realice todas las evaluaciones y guarde');
            }
                
            }else{                     
                    $resul=Result::all();
                    foreach($resul as $r){                  
                            if($r->User==$Codigorandom){
                                return redirect()->back()->withErrors('Resultado ya generado');
                            }                 
                    }
                $evaluadosPerinatal=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',1)->where('completado',1)->get();
                $evaluadosCardio=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',2)->where('completado',1)->get();
                $evaluadosCancer=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',3)->where('completado',1)->get();
                $evaluadosEnfoque=ScalesUser::where('codigoUsuario', $Codigorandom)->where('category',4)->where('completado',1)->get();
                $resultado=new Result; 
                foreach($evaluadosPerinatal as $evalp){       
                              
                    $porcentajeestructuraperinatal=round(((($evalp->estructura+$evalp->estructura2)*100)/10)*0.10,2);
                    $porcentajeprocesoperinatal=round(((($evalp->proceso+$evalp->proceso2+$evalp->proceso3+$evalp->proceso4+$evalp->proceso5+$evalp->proceso6)*100)/30)*0.10,2);
                    $porcentajeresultadoperinatal=round(((($evalp->resultado+$evalp->resultado2+$evalp->resultado3+$evalp->resultado4+$evalp->resultado5)*100)/25)*0.05,2);
                    $porcentajeperinatal=$porcentajeestructuraperinatal+$porcentajeprocesoperinatal+$porcentajeresultadoperinatal;
                    

                    $resultado->porcentaje_estructura_perinatal	=$porcentajeestructuraperinatal;
                    $resultado->porcentaje_proceso_perinatal=$porcentajeprocesoperinatal;
                    $resultado->porcentaje_resultado_perinatal=$porcentajeresultadoperinatal;
                    $resultado->porcentaje_perinatal=$porcentajeperinatal;

                    
                }
                foreach($evaluadosCardio as $evalcar){       
                              
                    $porcentajeestructuracardio=round(((($evalcar->estructura+$evalcar->estructura2)*100)/10)*0.10,2);
                    $porcentajeprocesocardio=round(((($evalcar->proceso+$evalcar->proceso2+$evalcar->proceso3+$evalcar->proceso4+$evalcar->proceso5+$evalcar->proceso6+$evalcar->proceso7+$evalcar->proceso8+$evalcar->proceso9)*100)/45)*0.10,2);
                    $porcentajeresultadocardio=round(((($evalcar->resultado+$evalcar->resultado2+$evalcar->resultado3+$evalcar->resultado4)*100)/20)*0.05,2);
                    $porcentajecardio=$porcentajeestructuracardio+$porcentajeprocesocardio+$porcentajeresultadocardio;
                    

                    $resultado->porcentaje_estructura_cardio=$porcentajeestructuracardio;
                    $resultado->porcentaje_proceso_cardio=$porcentajeprocesocardio;
                    $resultado->porcentaje_resultado_cardio=$porcentajeresultadocardio;
                    $resultado->porcentaje_cardio=$porcentajecardio;                
                }

                foreach($evaluadosCancer as $evalcan){       
                              
                    $porcentajeestructuracancer=round(((($evalcan->estructura+$evalcan->estructura2)*100)/10)*0.10,2);
                    $porcentajeprocesocancer=round(((($evalcan->proceso+$evalcan->proceso2+$evalcan->proceso3+$evalcan->proceso4)*100)/20)*0.10,2);
                    $porcentajeresultadocancer=round(((($evalcan->resultado+$evalcan->resultado2+$evalcan->resultado3+$evalcan->resultado4)*100)/20)*0.05,2);
                    $porcentajecancer=$porcentajeestructuracancer+$porcentajeprocesocancer+$porcentajeresultadocancer;
                    

                    $resultado->porcentaje_estructura_cancer=$porcentajeestructuracancer;
                    $resultado->porcentaje_proceso_cancer=$porcentajeprocesocancer;
                    $resultado->porcentaje_resultado_cancer=$porcentajeresultadocancer;
                    $resultado->porcentaje_cancer=$porcentajecancer;                
                }

                foreach($evaluadosEnfoque as $evalen){       
                              
                    $porcentajeestructuraenfoque=round(((($evalen->estructura+$evalen->estructura2+$evalen->estructura3)*100)/15)*0.10,2);
                    $porcentajeprocesoenfoque=round(((($evalen->proceso+$evalen->proceso2)*100)/10)*0.10,2);
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
            }
        } catch (\Throwable $th) {
            
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

    public function evaluados(ResultsInscriptions $chart){

        try {
            if(auth()->user()->Tipo_Usuario==1){
                $evaluados=DB::table('results')
                ->join('users_inscriptions','results.User','=','users_inscriptions.Codigorandom')
                ->join('users','users_inscriptions.Evaluador','=','users.id')
                ->select('results.porcentaje_estructura_perinatal', 
                'results.porcentaje_proceso_perinatal', 'results.porcentaje_resultado_perinatal',
                'results.porcentaje_estructura_cardio', 'results.porcentaje_proceso_cardio', 'results.porcentaje_resultado_cardio', 
                'results.porcentaje_estructura_cancer', 'results.porcentaje_proceso_cancer', 'results.porcentaje_resultado_cancer', 'results.porcentaje_estructura_enfoque',
                'results.porcentaje_proceso_enfoque', 'results.porcentaje_resultado_enfoque', 'results.PorcentajeEstructura', 'results.PorcentajeProceso', 'results.PorcentajeResultado', 
                'results.porcentaje_perinatal', 'results.porcentaje_cardio', 'results.porcentaje_cancer', 'results.porcentaje_enfoque', 'results.PorcentajeTotal', 'results.User'
                ,'users_inscriptions.ips', 'results.updated_at', 'users.Usuario')
                ->orderbyDesc('results.PorcentajeTotal')->get();
                $max=Result::max('PorcentajeTotal');
                $promedio=DB::select('SELECT avg(porcentaje_perinatal) as porcentaje_perinatal , avg(porcentaje_cardio) as porcentaje_cardio, avg(porcentaje_cancer) as porcentaje_cancer, avg(porcentaje_enfoque) as porcentaje_enfoque
                FROM `results` ');
                $mejorResult=DB::table('results')->select('porcentaje_perinatal', 'porcentaje_cardio', 'porcentaje_cancer', 'porcentaje_enfoque')
                ->where('PorcentajeTotal','>=',$max)->get();


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
                ->join('users','users_inscriptions.Evaluador','=','users.id')
                ->select('results.porcentaje_estructura_perinatal', 
                'results.porcentaje_proceso_perinatal', 'results.porcentaje_resultado_perinatal',
                'results.porcentaje_estructura_cardio', 'results.porcentaje_proceso_cardio', 'results.porcentaje_resultado_cardio', 
                'results.porcentaje_estructura_cancer', 'results.porcentaje_proceso_cancer', 'results.porcentaje_resultado_cancer', 'results.porcentaje_estructura_enfoque',
                'results.porcentaje_proceso_enfoque', 'results.porcentaje_resultado_enfoque', 'results.PorcentajeEstructura', 'results.PorcentajeProceso', 'results.PorcentajeResultado', 
                'results.porcentaje_perinatal', 'results.porcentaje_cardio', 'results.porcentaje_cancer', 'results.porcentaje_enfoque', 'results.PorcentajeTotal', 'results.User'
                ,'users_inscriptions.ips', 'results.updated_at', 'users.Usuario')
                ->where('users_inscriptions.Evaluador', auth()->user()->id)
                ->orderbyDesc('results.PorcentajeTotal')->get();
                $max=Result::max('PorcentajeTotal');
                $mejorResult=DB::table('results')->select('porcentaje_perinatal', 'porcentaje_cardio', 'porcentaje_cancer', 'porcentaje_enfoque')
                ->where('PorcentajeTotal','>=',$max)->get();
                $promedio=DB::select('SELECT avg(porcentaje_perinatal) as porcentaje_perinatal , avg(porcentaje_cardio) as porcentaje_cardio, avg(porcentaje_cancer) as porcentaje_cancer, avg(porcentaje_enfoque) as porcentaje_enfoque
                FROM `results` ');
            }
            

            return view('evaluados', compact('evaluados', 'mejorResult', 'promedio'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }

    public function graficos(ResultsInscriptions $chart, InscritosCategorias $chart2, InscritosTerritorio $chart3, InscritosFases $chart4, InscritosFasesCategorias $chart5){
        if(auth()->user()->Tipo_Usuario==1){
        return view('Graficos', ['chart1' => $chart->build(),'chart2' => $chart2->build(), 'chart3' => $chart3->build(), 'chart4' => $chart4->build(), 'chart5' => $chart5->build()]);
        }else{
            return redirect()->back();
        }
    }
}
