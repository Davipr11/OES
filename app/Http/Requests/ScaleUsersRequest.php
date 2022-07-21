<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleUsersRequest extends FormRequest
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
            'scalegobierno1'=>'required',
            'scalegobierno2'=>'required',
            'scalegobierno3'=>'required',
            'scalecohesionintegrabilidad1'=>'required',
            'scalecohesionintegrabilidad2'=>'required',
            'scalecohesionintegrabilidad3'=>'required',
            'scalecohesionintegrabilidad4'=>'required',
            'scaletrazabilidadresultado1'=>'required',
            'scaletrazabilidadresultado2'=>'required',
            'scaletrazabilidadresultado3'=>'required',
            'codigoUsuario'=>'required|unique:scales_users'

        ];
    }

    public function messages(){
        return[
            'scalegobierno1.required'=>'La primera puntuacion de gobierno es requerida',
            'scalegobierno2.required'=>'La segunda puntuacion de gobierno es requerida',
            'scalegobierno3.required'=>'La tercera puntuacion de gobierno es requerida', 
            'scalecohesionintegrabilidad1.required'=>'La primera puntuacion de cohesion y integralidad es requerida',
            'scalecohesionintegrabilidad2.required'=>'La segunda puntuacion de cohesion y integralidad es requerida',
            'scalecohesionintegrabilidad3.required'=>'La tercera puntuacion de cohesion y integralidad es requerida',
            'scalecohesionintegrabilidad4.required'=>'La cuarta puntuacion de cohesion y integralidad es requerida',
            'scaletrazabilidadresultado1.required'=>'La primera puntuacion de trazabilidad de resultado es requerida',
            'scaletrazabilidadresultado2.required'=>'La segunda puntuacion de trazabilidad de resultado es requerida',
            'scaletrazabilidadresultado3.required'=>'La tercera puntuacion de trazabilidad de resultado es requerida',              
            'codigoUsuario.unique'=>'Esta inscripcion ya se encuentra evaluada'
        ];
        
    }
}
