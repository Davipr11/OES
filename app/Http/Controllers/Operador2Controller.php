<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Operador2Controller extends Controller
{
    public function index(){
        
            if(Auth::check()){
                return view('operador2');
            }
            return view('Login');
        }
    
}
