<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleSalvarCardioRequest extends FormRequest
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
            'estructura'=>$this->get('scalecardioEstructura14'),
            'estructura2'=>$this->get('scalecardioEstructura15'),
            'proceso'=>$this->get('scalecardioproceso16'),
            'proceso2'=>$this->get('scalecardioproceso17'),
            'proceso3'=>$this->get('scalecardioproceso18'),
            'proceso4'=>$this->get('scalecardioproceso19'),
            'proceso5'=>$this->get('scalecardioproceso20'),
            'proceso6'=>$this->get('scalecardioproceso21'),
            'proceso7'=>$this->get('scalecardioproceso22'),
            'proceso8'=>$this->get('scalecardioproceso23'),
            'proceso9'=>$this->get('scalecardioproceso24'),
            'resultado'=>$this->get('scalecardioresultado25'),
            'resultado2'=>$this->get('scalecardioresultado26'),
            'resultado3'=>$this->get('scalecardioresultado27'),
            'resultado4'=>$this->get('scalecardioresultado28'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
            'completado'=>0,
        ];
    }
}
