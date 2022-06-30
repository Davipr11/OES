<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersInscriptionRequest;
use Illuminate\Http\Request;
use App\Models\users_inscription;

class UsersInscriptionController extends Controller
{
    public function inscribir(UsersInscriptionRequest $request){
        $userinscripcion=users_inscription::create($request->validated());
        
        return redirect('index')->withSuccess('Ha sido inscrito');
    }
}
