<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperadorController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('operador');
        }
        return view('Login');
    }
}
