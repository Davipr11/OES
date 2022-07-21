<div> 
    <div class="form-floating mb-3"> 
        <b><label for="" style="color:#009FE3">Departamento *</label></b>
        <select name="departamento" id="departamento" class="form-select" wire:model="departamento" required>     
            <option selected value="">..seleccione..</option>
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id}}" >{{$departamento->departamento}}</option>
            @endforeach      
        </select>
    </div>
    <b><label for="" style="color:#009FE3">Municipio *</label></b>
    <div class="form-floating">
        <select name="municipio" id="municipio" class="form-select" wire:model="municipio"  required> 
        <option selected value="">..Seleccione..</option>
        @foreach ($municipios as $municipio)
                <option value="{{$municipio->id}}" >{{$municipio->municipio}}</option>
            @endforeach
        </select>        
    </div>   
</div>

<script type="text/javascript">
    function selected(){
        var id = document.getElementById("departamento").value;       
        var idmun = document.getElementById("municipio").value;     
        @this.set('departamentoid', id);
        @this.set('municipio', idmun);     
    }
</script>

