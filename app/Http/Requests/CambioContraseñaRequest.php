<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambioContraseñaRequest extends FormRequest
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
            'password'=>'required|min:3|max:25',
            'nuevapassword'=>'required|min:3|max:25',
            'confirmacion-password'=>'required|same:nuevapassword|min:3|max:25'
        ];
    }
    public function messages(){
        return[
            'password.required'=>'La contraseña actual es requerida',
            'nuevapassword.required'=>'La Nueva contraseña es requerida',
            'confirmacion-password.required'=>'La Confirmacion de contraseña es requerida',
            'same'=>'La Nueva contraseña y contraseña de confirmacion deben ser iguales',
            'max'=>'El :attribute no debe tener mas de 25 caracteres',
            'min'=>'El :attribute debe tener mas de 3 caracteres',
        ];
    }

    public function getCredential(){
        $usuario=auth()->user()->Usuario;
        return [
            'Usuario'=>$usuario,
            'password'=>$this->get('password')
        ];
    }
}