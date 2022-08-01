<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ScalesUser;
use App\Models\users_inscription;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AutorizacionRequest;

class AutorizacionController extends Controller
{
    public function index($codigo){
        if(Auth::check()){
            if(auth()->user()->Tipo_Usuario==1){
                $scaleusers=DB::table('scales_users')->join('categories','scales_users.category','=','categories.id')
                ->select('scales_users.completado','scales_users.codigoUsuario', 'scales_users.id', 'categories.category')
                ->where('scales_users.CodigoUsuario', $codigo)->orderbyDesc('scales_users.category')->get();
                //$scaleusers=ScalesUser::where('CodigoUsuario', $codigo)->get();
                $inscripcion=users_inscription::where('Codigorandom',$codigo)->get();
                return view('Autorizacion', compact('scaleusers', 'inscripcion'));
            }else{
                return redirect()->back()->withErrors('Error');
            }
        }
        
    }

    public function autorizar($id){
        if(Auth::check()){
            if(auth()->user()->Tipo_Usuario==1){
                $scaleusers=DB::table('scales_users')->join('categories','scales_users.category','=','categories.id')
                ->select('scales_users.completado','scales_users.codigoUsuario', 'scales_users.id', 'categories.category')
                ->where('scales_users.id', $id)->orderbyDesc('scales_users.category')->get();

                $scaleuser=ScalesUser::where('id', $id)->get();
                return view('Autorizacionmaterno', compact('scaleusers', 'scaleuser'));
            }else{
                return redirect()->back()->withErrors('Error');
            }
        }

        //ScalesUser::where('id', $id)->update($request->validated());
        //return redirect()->back()->withSuccess('Permiso Actualizado');
    }

    public function autorizarEdit(AutorizacionRequest $request, $id){
        ScalesUser::where('id', $id)->update($request->validated());
        $user=ScalesUser::findOrFail($id);
        return redirect('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$user->codigoUsuario.'/autorizacion')->withSuccess('Permiso Actualizado');
    }
}
