<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleSalvarEnfoqueRequest extends FormRequest
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
                'codigoUsuario'=>'required',
                'category'=>'required',             
            ];
                 
          
    }


    public function messages(){
        return[              
            'codigoUsuario'=>'Error',
            'category'=>'Error',

        ];       
    }



    public function getData(){  
        return[
            'estructura'=>$this->get('scaleenfoqueEstructura39'),
            'estructura2'=>$this->get('scaleenfoqueEstructura40'),
            'estructura3'=>$this->get('scaleenfoqueEstructura41'),
            'proceso'=>$this->get('scaleenfoqueproceso42'),
            'proceso2'=>$this->get('scaleenfoqueproceso43'),
            'resultado'=>$this->get('scaleenfoqueresultado44'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
            'completado'=>0,
        ];
    }
}
