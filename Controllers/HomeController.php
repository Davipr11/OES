<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            if(auth()->user()->Tipo_Usuario==1){
                return view('home');
            }else if(auth()->user()->Tipo_Usuario==2){
                return redirect('/operador');
            }else{
                return redirect('/operador2');
            }
        }
        return view('login');

    }
}
