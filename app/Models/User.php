<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Nombres',
        'Apellidos',
        'Tipo_documento',
        'Documento',
        'Fecha_nacimiento',
        'Correo',
        'Direccion',
        'Tipo_Usuario',
        'Usuario',
        'password',
        'Estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'Correo_Verificacion' => 'datetime',
    ];

    public function setContrasenaAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }
}
