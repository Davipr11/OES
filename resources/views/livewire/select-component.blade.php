<div>
    <div class="form-floating mb-3">
        <select name="departamento" id="departamento" class="form-select" wire:model="departamento">
            
            <option selected>..Seleccione..</option>
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id}}">{{$departamento->departamento}}</option>
            @endforeach      
        </select>
        <label for="departamento">Departamento *</label>
    </div>
    <div class="form-floating">
        <select name="municipio" id="municipio" class="form-select" wire:model="municipio">
        <option selected>..Seleccione..</option>
        @foreach ($municipios as $municipio)
                <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>
            @endforeach
        </select>
        <label for="municipio">Municipio *</label>
    </div>
</div>
