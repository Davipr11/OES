<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersInscriptionRequest;
use App\Http\Requests\InscripcionupdateRequest;
use Illuminate\Http\Request;
use App\Models\users_inscription;

class UsersInscriptionController extends Controller
{
    public function index(){
        return view('inscripcion');
    }

    public function inscribir(UsersInscriptionRequest $request){
        $userinscripcion=users_inscription::create($request->validated());
        return redirect('Premio_Nacional_OES/inscripcion')->withSuccess('Ha sido inscrito');
    }

    public function update(InscripcionupdateRequest $request, $id){
        $inscrito=$request->validated();
        users_inscription::where('id','=',$id)->update($inscrito);
        return redirect('/Premio_Nacional_OES/Evaluadores/consultaInscripcion'); 
    }
}
