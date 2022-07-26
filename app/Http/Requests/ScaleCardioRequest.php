<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleCardioRequest extends FormRequest
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
            'scalecardioEstructura14'=>'required',
            'scalecardioEstructura15'=>'required',
            'scalecardioproceso16'=>'required',
            'scalecardioproceso17'=>'required',
            'scalecardioproceso18'=>'required',
            'scalecardioproceso19'=>'required',
            'scalecardioproceso20'=>'required',
            'scalecardioproceso21'=>'required',
            'scalecardioproceso22'=>'required',
            'scalecardioproceso23'=>'required',
            'scalecardioproceso24'=>'required',
            'scalecardioresultado25'=>'required',
            'scalecardioresultado26'=>'required',
            'scalecardioresultado27'=>'required',
            'scalecardioresultado28'=>'required',
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
            'estructura'=>$this->get('scalecardioEstructura14')+$this->get('scalecardioEstructura15'),
            'proceso'=>$this->get('scalecardioproceso16')+$this->get('scalecardioproceso17')+$this->get('scalecardioproceso18')
            +$this->get('scalecardioproceso19')+$this->get('scalecardioproceso20')+$this->get('scalecardioproceso21')
            +$this->get('scalecardioproceso22')+$this->get('scalecardioproceso23')+$this->get('scalecardioproceso24'),
            'resultado'=>$this->get('scalecardioresultado25')+$this->get('scalecardioresultado26')+$this->get('scalecardioresultado27')
            +$this->get('scalecardioresultado28'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
        ];
    }
}
