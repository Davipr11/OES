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
            'ips'=>'required|string',
            'nit'=>'required|numeric|min:10',
            'codigo_habilitacion_prestador'=>'required',
            'fecha_inscripcion_reps'=>'required|date',
            'fecha_vencimiento'=>'required|date',
            'naturaleza_juridica'=>'required|string',
            'nivel_complejidad'=>'required|string',
            'departamento'=>'required',
            'municipio'=>'required',
            'direccion'=>'required',
            'caracter_territorial'=>'required|string',
            'director_general'=>'required|string',
            'director_medico'=>'required|string',
            'referente_ips'=>'required|string',
            'cargo'=>'required|string',
            'telefono'=>'required|numeric',
            'email'=>'required|email',
            'atencion_infantil'=>'required|string',
            'deteccion_temprana_enfermedades_cardiovasculares'=>'required|string',
            'programas_atencion_obesidad'=>'required|string',
            'programas_atencion_diabetes'=>'required|string',
            'programas_atencion_hta'=>'required|string',
            'procesos_atencion_deteccion_temprana_cancer'=>'required|string',
            'enfoque_diferencial_procesos_atencion'=>'required|string',
        ];
    }
    public function messages(){
        return[
            'required'=>'El :attribute es requerido',
            'telefono.numeric'=>'El telefono debe ser numerico',
            'string'=>'El :attribute debe ser una cadena de texto',
            'email.email'=>'El correo debe ser valido',
            'nit.numeric'=>'El NIT debe ser numerico',
            'nit.min:10'=>'El NIT debe tener como minimo 10 digitos'
        ];
    }
}
