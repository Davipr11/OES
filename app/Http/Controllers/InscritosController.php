<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users_inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InscritosController extends Controller
{
    public function index(){
        return view('inscritos');
    }

    public function Inscritos(){
        if(Auth::check()){
            $datos['inscritos']=DB::select('SELECT ui.id, ui.ips, ui.nit, ui.codigo_habilitacion_prestador, ui.fecha_inscripcion_reps, ui.fecha_vencimiento, ui.naturaleza_juridica, ui.nivel_complejidad,d.departamento, m.municipio, ui.direccion, ui.caracter_territorial, ui.director_general, ui.director_medico, ui.referente_ips, ui.cargo, ui.telefono, ui.email, ui.atencion_infantil, ui.deteccion_temprana_enfermedades_cardiovasculares, ui.programas_atencion_obesidad, ui.programas_atencion_diabetes, ui.programas_atencion_hta, ui.procesos_atencion_deteccion_temprana_cancer, ui.enfoque_diferencial_procesos_atencion  FROM users_inscriptions ui
            inner join municipios m on m.id=ui.municipio
            inner join departamentos d on d.id=m.id_departamento');
            return view('inscritos', $datos);
        }
        return redirect('/login');
    }
}
