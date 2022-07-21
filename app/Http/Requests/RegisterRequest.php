<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'Nombres'=>'required|string|max:30',
            'Apellidos'=>'required|string|max:30',
            'Tipo_documento'=>'required|string|max:1',
            'Documento'=>'required|numeric|unique:users||max:11',
            'Fecha_nacimiento'=>'required|date|before:yesterday',
            'Correo'=>'required|email|unique:users|max:40',
            'Direccion'=>'required|string|max:40',
            'Tipo_Usuario'=>'required|string|max:2',
            'Usuario'=>'required|string|unique:users|min:4|max:25',
            'password'=>'required|string|min:3|max:25',
            'Estado'=>'required|string|max:15'
        ];
    }
    public function messages(){
        return[
            'required'=>'El/La :attribute es requerido',
            'string'=>'El/La :attribute debe ser una cadena de texto',
            'date'=>'La fecha de nacimiento deber ser una fecha valida',
            'Fecha_nacimiento.before'=>'La fecha deber ser valida',
            'email'=>'El correo debe ser un correo valido',
            'unique'=>'El :attribute debe ser unico, ya se encuentra registrado',
            'numeric'=>'El :attribute debe ser numerico',
            'min'=>'El :attribute tiene muy pocos caracteres',
            'max'=>'El :attrubute supera los caracteres permitidos',
        ];
    }
}
