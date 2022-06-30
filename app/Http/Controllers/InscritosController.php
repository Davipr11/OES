<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users_inscription;
use Illuminate\Support\Facades\Auth;

class InscritosController extends Controller
{
    public function index(){
        return view('inscritos');
    }

    public function Inscritos(){
        if(Auth::check()){
            $datos['inscritos']=users_inscription::all();
            return view('inscritos', $datos);
        }
        return redirect('/login');
    }
}
