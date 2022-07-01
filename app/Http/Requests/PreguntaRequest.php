<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'pregunta'=>'required|string',
        ];
    }

    public function messages(){
        return[
            'required'=>'La :attribute es requerida '
        ];
    }

    public function getData(){
        $usuario=auth()->user()->id;
        return [
            'id_user'=>$usuario,
            'pregunta'=>$this->get('pregunta')
        ];
    }
}
