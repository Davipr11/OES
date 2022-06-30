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
        'ips',
        'nit',
        'codigo_habilitacion_prestador',
        'fecha_inscripcion_reps',
        'fecha_vencimiento',
        'naturaleza_juridica',
        'nivel_complejidad',
        'departamento',
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

    ];
    public static function getUsersInscription(){
        $datos=DB::table('users_inscriptions')->select('id','ips',
        'nit',
        'codigo_habilitacion_prestador',
        'fecha_inscripcion_reps',
        'fecha_vencimiento',
        'naturaleza_juridica',
        'nivel_complejidad',
        'departamento',
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
        'enfoque_diferencial_procesos_atencion')->get()->toArray();
        return $datos;
    }
}
