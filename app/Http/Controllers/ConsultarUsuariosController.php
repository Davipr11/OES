<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ConsultarUsuariosController extends Controller
{

    public function index(){
        if(Auth::check()){
            return redirect('/consulta/show');
        }
        
    }
    public function show(){
        if(Auth::check()){
            $datos['usuarios']=User::paginate(100);
            return view('consultaUsuarios', $datos);
        }
        return redirect('/login');
    }

    public function edit($id){
        $usuario=User::findOrFail($id);
        return view('edit', compact('usuario'));
    }

    public function update(Request $request, $id){
        $usuario=request()->except(['_token', '_method', 'actualizar']);
        User::where('id','=',$id)->update($usuario);

        $datos['usuarios']=User::paginate();
        return view('consultaUsuarios', $datos);
    }
}
