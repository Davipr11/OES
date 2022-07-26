<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleEnfoqueRequest extends FormRequest
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
            'scaleenfoqueEstructura39'=>'required',
            'scaleenfoqueEstructura40'=>'required',
            'scaleenfoqueEstructura41'=>'required',
            'scaleenfoqueproceso42'=>'required',
            'scaleenfoqueproceso43'=>'required',
            'scaleenfoqueresultado44'=>'required',
            'codigoUsuario'=>'required',
            'category'=>'required'
        ];
    }

    public function messages(){
        return[              
            'required'=>'Por favor llene todas las evaluaciones'
        ];       
    }

    public function getData(){  
        return[
            'estructura'=>$this->get('scaleenfoqueEstructura39')+$this->get('scaleenfoqueEstructura40')+$this->get('scaleenfoqueEstructura41'),
            'proceso'=>$this->get('scaleenfoqueproceso42')+$this->get('scaleenfoqueproceso43'),
            'resultado'=>$this->get('scaleenfoqueresultado44'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
        ];
    }

}
