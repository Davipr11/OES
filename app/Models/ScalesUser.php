<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScalesUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'estructura',
        'proceso',
        'resultado',      
        'codigoUsuario',
        'category',
    ];
}
