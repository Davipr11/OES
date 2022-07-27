<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleCancerRequest extends FormRequest
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
            'scalecancerEstructura29'=>'required',
            'scalecancerEstructura30'=>'required',
            'scalecancerproceso31'=>'required',
            'scalecancerproceso32'=>'required',
            'scalecancerproceso33'=>'required',
            'scalecancerproceso34'=>'required',
            'scalecancerresultado35'=>'required',
            'scalecancerresultado36'=>'required',
            'scalecancerresultado37'=>'required',
            'scalecancerresultado38'=>'required',
            'codigoUsuario'=>'required',
            'category'=>'required'
        ];
    }


    public function messages(){
        return[              
            'scalecancerEstructura29.required'=>'Por favor llene todas las evaluaciones de estructura',
            'scalecancerEstructura30.required'=>'Por favor llene todas las evaluaciones de estructura',
            'scalecancerproceso31.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scalecancerproceso32.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scalecancerproceso33.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scalecancerproceso34.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scalecancerresultado35.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scalecancerresultado36.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scalecancerresultado37.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scalecancerresultado38.required'=>'Por favor llene todas las evaluaciones de resultado',
            'codigoUsuario'=>'Error',
            'category'=>'Error',
        ];       
    }


    public function getData(){  
        return[
            'estructura'=>$this->get('scalecancerEstructura29')+$this->get('scalecancerEstructura30'),
            'proceso'=>$this->get('scalecancerproceso31')+$this->get('scalecancerproceso32')+$this->get('scalecancerproceso33')
            +$this->get('scalecancerproceso34'),
            'resultado'=>$this->get('scalecancerresultado35')+$this->get('scalecancerresultado36')+$this->get('scalecancerresultado37')
            +$this->get('scalecancerresultado38'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
        ];
    }


}
