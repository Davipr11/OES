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
            'category'=>'required',

        ];
    }

    public function messages(){
        return[              
            'scaleperinatalEstructura1.required'=>'Por favor llene todas las evaluaciones de estructura',
            'scaleperinatalEstructura2.required'=>'Por favor llene todas las evaluaciones de estructura',
            'scaleperinatalproceso3.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scaleperinatalproceso4.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scaleperinatalproceso5.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scaleperinatalproceso6.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scaleperinatalproceso7.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scaleperinatalproceso8.required'=>'Por favor llene todas las evaluaciones de proceso',
            'scaleperinatalResultado9.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scaleperinatalResultado10.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scaleperinatalResultado11.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scaleperinatalResultado12.required'=>'Por favor llene todas las evaluaciones de resultado',
            'scaleperinatalResultado13.required'=>'Por favor llene todas las evaluaciones de resultado',
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
            'completado'=>1
        ];
    }


}
