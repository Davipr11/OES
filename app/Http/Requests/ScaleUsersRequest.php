<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleUsersRequest extends FormRequest
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
            'scaleperinatalEstructura1'=>'required',
            'scaleperinatalEstructura2'=>'required',
            'scaleperinatalproceso3'=>'required',
            'scaleperinatalproceso4'=>'required',
            'scaleperinatalproceso5'=>'required',
            'scaleperinatalproceso6'=>'required',
            'scaleperinatalproceso7'=>'required',
            'scaleperinatalproceso8'=>'required',
            'scaleperinatalResultado9'=>'required',
            'scaleperinatalResultado10'=>'required',
            'scaleperinatalResultado11'=>'required',
            'scaleperinatalResultado12'=>'required',
            'scaleperinatalResultado13'=>'required',
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
            'estructura'=>$this->get('scaleperinatalEstructura1')+$this->get('scaleperinatalEstructura2'),
            'proceso'=>$this->get('scaleperinatalproceso3')+$this->get('scaleperinatalproceso4')+$this->get('scaleperinatalproceso5')
            +$this->get('scaleperinatalproceso6')+$this->get('scaleperinatalproceso7')+$this->get('scaleperinatalproceso8'),
            'resultado'=>$this->get('scaleperinatalResultado9')+$this->get('scaleperinatalResultado10')+$this->get('scaleperinatalResultado11')
            +$this->get('scaleperinatalResultado12')+$this->get('scaleperinatalResultado13'),
            'codigoUsuario'=>$this->get('codigoUsuario'),
            'category'=>$this->get('category'),
        ];
    }


}
