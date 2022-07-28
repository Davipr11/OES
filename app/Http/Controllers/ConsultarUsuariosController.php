<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ConsultarUsuariosController extends Controller
{

    public function index(){
        try {
           if(Auth::check()){
            if(auth()->user()->Tipo_Usuario==2 || auth()->user()->Tipo_Usuario==3){
                return redirect()->back();
            }
            return redirect('/Premio_Nacional_OES/Evaluadores/consulta/show');
        }
        return view('Login');
        }catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }
    public function show(){

        try {
            if(Auth::check()){
            $datos['usuarios']=User::all();
            return view('consultaUsuarios', $datos);
        }
            return redirect('/login');
        }catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }

        
    }

    public function edit($id){

        try {
           $usuario=User::findOrFail($id);
            return view('edit', compact('usuario'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }
        
    }

    public function update(Request $request, $id){

        try {
            $usuario=request()->except(['_token', '_method', 'actualizar']);
            User::where('id','=',$id)->update($usuario);

            $datos['usuarios']=User::paginate();
            //return view('consultaUsuarios', $datos)->with('success', 'Editado');
            return redirect('/Premio_Nacional_OES/Evaluadores/consulta/show')->withsuccess('Editado'); 
        }catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error');
        }

        
    }
}
