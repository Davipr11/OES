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
            'password'=>'required',
            'nuevapassword'=>'required',
            'conpassword'=>'required|same:nuevapassword'
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