<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class users_inscription extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'ips',
        'nit',
        'codigo_habilitacion_prestador',
        'fecha_inscripcion_reps',
        'fecha_vencimiento',
        'naturaleza_juridica',
        'nivel_complejidad',
        'municipio',
        'direccion',
        'caracter_territorial',
        'director_general',
        'director_medico',
        'referente_ips',
        'cargo',
        'telefono',
        'email',
        'atencion_infantil',
        'deteccion_temprana_enfermedades_cardiovasculares',
        'programas_atencion_obesidad',
        'programas_atencion_diabetes',
        'programas_atencion_hta',
        'procesos_atencion_deteccion_temprana_cancer',
        'enfoque_diferencial_procesos_atencion',
        'Codigorandom',
        'Evaluador'
    ];
    public static function getUsersInscription(){
        $datos=DB::select('SELECT ui.id, ui.ips, ui.nit, ui.codigo_habilitacion_prestador, 
        ui.fecha_inscripcion_reps, ui.fecha_vencimiento, ui.naturaleza_juridica, 
        ui.nivel_complejidad,d.departamento, m.municipio, ui.direccion, ui.caracter_territorial,
         ui.director_general, ui.director_medico, ui.referente_ips, ui.cargo, ui.telefono, ui.email,
         ui.atencion_infantil, ui.deteccion_temprana_enfermedades_cardiovasculares, ui.programas_atencion_obesidad,
         ui.programas_atencion_diabetes, ui.programas_atencion_hta, ui.procesos_atencion_deteccion_temprana_cancer,
         ui.enfoque_diferencial_procesos_atencion,ui.Codigorandom, ui.created_at FROM users_inscriptions ui
        inner join municipios m on m.id=ui.municipio
        inner join departamentos d on d.id=m.id_departamento');
        return $datos;
    }
}
