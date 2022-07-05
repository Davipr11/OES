<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PreguntaRequest extends FormRequest
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
        if(Auth::check()){
            return [
            'pregunta'=>'required|string',     
        ];
        }
        return [
            'pregunta'=>'required|string',
            'email'=>'required|email'
        ];
    }

    public function messages(){
        return[
            'pregunta.required'=>'La pregunta es requerida ',
            'email.required'=>'El email es requerido',
            'email.email'=>'El correo debe ser un correo valido'
        ];
    }

    public function getData(){
        
        if(Auth::check()){
           $usuario=auth()->user()->Correo; 
            return [
                        'email'=>$usuario,
                        'pregunta'=>$this->get('pregunta')
                    ];
        }
        return [
                'email'=>$this->get('email'),
                'pregunta'=>$this->get('pregunta')
        ];
        
    }
}
