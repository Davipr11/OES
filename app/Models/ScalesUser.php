<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScalesUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'scalegobierno1',
        'scalegobierno2',
        'scalegobierno3',
        'scalecohesionintegrabilidad1',
        'scalecohesionintegrabilidad2',
        'scalecohesionintegrabilidad3',
        'scalecohesionintegrabilidad4',
        'scaletrazabilidadresultado1',
        'scaletrazabilidadresultado2',
        'scaletrazabilidadresultado3',
        'codigoUsuario',
    ];
}
