<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
        return[
            'usuario'=>'required|string|min:4',
            'password'=>'required|string|min:3'
        ];
    }

    public function messages(){
        return[
            'required'=>'El :attribute es requerido',
            'password.min'=>'El password debe tener minimo 3 caracteres',
            'usuario.min'=>'El usuario debe tener minimo 4 caracteres'
        ];
    }

    public function getCredentials(){
        $usuario=$this->get('usuario');
        if($this->isEmail($usuario)){
            return [
                'correo'=>$usuario,
                'password'=>$this->get('password')
            ];
        }
        return $this->only('usuario', 'password');
    }

    public function isEmail($value){
        $factory=$this->container->make(ValidationFactory::class);
        return !$factory->make(['usuario'=>$value], ['usuario'=>'email'])->fails();
    }
}
