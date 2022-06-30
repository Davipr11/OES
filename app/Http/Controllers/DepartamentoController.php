<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Municipio;

class DepartamentoController extends Controller
{
    public function index(){
        $departamentos['departamentos']=Departamento::all();
        $municipios['municipios']=Municipio::all();
         return view('index', $departamentos, $municipios); 
    }
}
