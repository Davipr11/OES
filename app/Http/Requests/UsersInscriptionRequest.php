<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersInscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ips'=>'required|string|max:25',
            'nit'=>'required|numeric|min:10|unique:users_inscriptions',
            'codigo_habilitacion_prestador'=>'required|max:25',
            'fecha_inscripcion_reps'=>'required|date|before:today',
            'fecha_vencimiento'=>'required|date|after:today',
            'naturaleza_juridica'=>'required|string|max:25',
            'nivel_complejidad'=>'required|string|max:25',
            'municipio'=>'required|integer',
            'direccion'=>'required|string|max:25',
            'caracter_territorial'=>'required|string|max:25',
            'director_general'=>'required|string|max:20',
            'director_medico'=>'required|string|max:30',
            'referente_ips'=>'required|string|max:20',
            'cargo'=>'required|string|max:20',
            'telefono'=>'required|numeric|digits:10',
            'email'=>'required|email|unique:users_inscriptions',
            'atencion_infantil'=>'required|string|max:3',
            'deteccion_temprana_enfermedades_cardiovasculares'=>'required|string|max:3',
            'programas_atencion_obesidad'=>'required|string|max:3',
            'programas_atencion_diabetes'=>'required|string|max:3',
            'programas_atencion_hta'=>'required|string|max:3',
            'procesos_atencion_deteccion_temprana_cancer'=>'required|string|max:3',
            'enfoque_diferencial_procesos_atencion'=>'required|string|max:3',
        ];
    }
    public function messages(){
        return[
            'required'=>'El/La :attribute es requerido',
            'telefono.numeric'=>'El telefono debe ser numerico',
            'string'=>'El :attribute debe ser una cadena de texto',
            'email.email'=>'El correo debe ser valido',
            'nit.numeric'=>'El NIT debe ser numerico',
            'date'=>'La :attribute debe ser una fecha valida',
            'nit.min:10'=>'El NIT debe tener como minimo 10 digitos',
            'fecha_inscripcion_reps.before'=>'La fecha de inscripcion debe ser anterior a la actual',
            'fecha_vencimiento.after'=>'La fecha de vencimiento debe ser despues a la actual',
            'max'=>'El/la :attribute tiene mas de los caracteres permitidos',
            'unique'=>'El/la :attribute ya se encuentra registrado, debe ser unico'
        ];
    }
}
