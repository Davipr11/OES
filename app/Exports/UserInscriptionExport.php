<?php

namespace App\Exports;

use App\Models\users_inscription;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserInscriptionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'ID',
            'IPS',
            'NIT',
            'Codigo de habilitacion del prestador',
            'Fecha inscription REPS',
            'Fecha vencimiento',
            'Naturaleza juridica',
            'Nivel de complejidad',
            'Departamento',
            'Municipio',
            'Direccion',
            'Caracter territoral',
            'Director general',
            'Director medico',
            'Referente de IPS',
            'Cargo',
            'Telefono',
            'Email',
            'Cuenta con atencion infantil',
            'Cuenta con deteccion temprana de enfermedades cardiovasculares',
            'Cuenta con programas de atencion de obesidad',
            'Cuenta con programas de atencion de diabetes',
            'Cuenta con programas de atencion de HTA',
            'Cuenta con procesos de deteccion temprana contra el cancer',
            'Ha trabajado un enfoque diferencial en los procesos de atencion'


        ];
    }
    public function collection()
    {
        //return users_inscription::all();
        return collect(users_inscription::getUsersInscription());
    }
}
