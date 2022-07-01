<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\Municipio;

class SelectComponent extends Component
{

    public $departamento, $municipio;
    public $departamentos=[], $municipios=[];
    public function mount(){
        $this->departamentos=Departamento::all();
        $this->municipios=collect();
    }

    public function updatedDepartamento($id_d){ 
        $this->municipios=Municipio::where('id_departamento', $id_d)->get();
        
    }
    public function render()
    {
        return view('livewire.select-component');
    }
}
