<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregunta',
        'id_user',
    ];

    public function usuario(){
        return $this->hasOne('App\Models\User','id','id_user');
    }
}
