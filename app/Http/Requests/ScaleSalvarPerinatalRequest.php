<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleSalvarPerinatalRequest extends FormRequest
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
            'estructura'=>$this->get('scaleperinatalEstructura1'),
            'estructura2'=>$this->get('scaleperinatalEstructura2'),
            'proceso'=>$this->get('scaleperinatalproceso3'),
            'proceso2'=>$this->get('scaleperinatalproceso4'),
            'proceso3'=>$this->get('scaleperinatalproceso5'),
            'proceso4'=>$this->get('scaleperinatalproceso6'),
            'proceso5'=>$this->get('scaleperinatalproceso7'),
            'proceso6'=>$this->get('scaleperinatalproceso8'),
            'resultado'=>$this->get('scaleperinatalResultado9'),
            'resultado2'=>$this->get('scaleperinatalResultado10'),
            'resultado3'=>$this->get('scaleperinatalResultado11'),
            'resultado4'=>$this->get('scaleperinatalResultado12'),
            'resultado5'=>$this->get('scaleperinatalResultado13'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
            'completado'=>0
        ];
    }
}
