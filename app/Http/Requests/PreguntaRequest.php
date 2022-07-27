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
            'pregunta'=>'required|string|max:600',     
        ];
        }
        return [
            'pregunta'=>'required|string|max:600',
            'email'=>'required|email|max:40'
        ];
    }

    public function messages(){
        return[
            'pregunta.required'=>'La pregunta es requerida ',
            'email.required'=>'El email es requerido',
            'email.email'=>'El correo debe ser un correo valido',
            'email.max'=>'El correo no debe tener mas de 40 caracteres',
            'pregunta.max'=>'La pregunta tiene mas de los caracteres permitidos',
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
