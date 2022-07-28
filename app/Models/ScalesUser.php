<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScalesUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'estructura',
        'estructura2',
        'estructura3',
        'proceso',
        'proceso2',
        'proceso3',
        'proceso4',
        'proceso5',
        'proceso6',
        'proceso7',
        'proceso8',
        'proceso9',
        'resultado',
        'resultado2',
        'resultado3',
        'resultado4',
        'resultado5',      
        'codigoUsuario',
        'category',
        'completado',
    ];
}
