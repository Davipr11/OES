<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;


    protected $fillable = [
        'porcentaje_estructura_perinatal',
        'porcentaje_proceso_perinatal',
        'porcentaje_resultado_perinatal',
        'porcentaje_estructura_cardio',
        'porcentaje_proceso_cardio',
        'porcentaje_resultado_cardio',
        'porcentaje_estructura_cancer',
        'porcentaje_proceso_cancer	',
        'porcentaje_resultado_cancer',
        'porcentaje_estructura_enfoque',
        'porcentaje_proceso_enfoque',
        'porcentaje_resultado_enfoque',
        'PorcenajeEstructura',
        'PorcenajeProceso',
        'PorcenajeResultado',
        'porcentaje_perinatal',
        'porcentaje_cardio',
        'porcentaje_cancer',
        'porcentaje_enfoque',
        'PorcenajeTotal'
        ,'User',

    ];
}
