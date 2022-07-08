<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersInscriptionRequest;
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
}
