<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleSalvarCancerRequest extends FormRequest
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
            'estructura'=>$this->get('scalecancerEstructura29'),
            'estructura2'=>$this->get('scalecancerEstructura30'),
            'proceso'=>$this->get('scalecancerproceso31'),
            'proceso2'=>$this->get('scalecancerproceso32'),
            'proceso3'=>$this->get('scalecancerproceso33'),
            'proceso4'=>$this->get('scalecancerproceso34'),
            'resultado'=>$this->get('scalecancerresultado35'),
            'resultado2'=>$this->get('scalecancerresultado36'),
            'resultado3'=>$this->get('scalecancerresultado37'),
            'resultado4'=>$this->get('scalecancerresultado38'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
            'completado'=>0,
        ];
    }
}
