<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>oes</title>
    <header>     
        <div class="img">
            <img src="{{asset('images.png')}}" class="img-fluid">
        </div>
                @auth
                <div class="button-logout">
                    <a href="/logout" class="btn btn-light">cerrar sesion</a>
                </div>
                <div class="button-home">
                    <a href="/home" class="btn btn-light">Inicio</a> 
                </div>
                @endauth

            @guest
            <div class="button-home">
                <a href="/login" class="btn btn-light">Iniciar sesion</a> 
            </div>
            @endguest

    </header>
    @livewireStyles
</head>
<body>
<div class="d-grid gap-2 col-6 mx-auto">
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#inscripcion">
    Inscripcion
    </button>
    <br>
    <a href="/pregunta" class="btn btn-light">Preguntas frecuentes</a>
</div>
<!-- Modal -->
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h6 class="error">{{session('success')}}</h6>
            </div> 
            @endif 
            <div class="modal fade" id="inscripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario de inscripcion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>El formulario y cuestionario de inscripcion debe ser diligenciado en su totalidad.Esta inscripcion
                        NO tiene costo alguno. El equipo tecnico del premio podrá hacer verificacion de la informacion suministrada.
                    </p><br>
                    <p>Las instituciones acpetadas para participar en el proceso de evaluacion recibiran comunicacion formal
                         a través de los caneles de comunicacion del Premio Nacional.</p>
                         <br><br>
                         
                    <form action="inscripcion" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ips" name="ips" placeholder="ips"  value="{{old('ips')}}">
                            <label for="ips">Nombre de la IPS *</label>
                            
                            @error('ips')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                            
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="nit" name="nit" placeholder="nit" value="{{old('nit')}}">
                            <label for="nit">NIT *</label>
                            @error('nit')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="codigo_habilitacion_prestador" name="codigo_habilitacion_prestador" placeholder="Codigo de Habilitacion"  value="{{old('codigo_habilitacion_prestador')}}">
                            <label for="codigo_habilitacion_prestador">Codigo de Habilitacion del prestador *</label>
                            @error('codigo_habilitacion_prestador')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="fecha_inscripcion_reps" name="fecha_inscripcion_reps" placeholder="Fecha de inscripcion REPS" value="{{old('fecha_inscripcion_reps')}}">
                            <label for="fecha_inscripcion_reps">Fecha de inscripcion REPS * </label>
                            @error('fecha_inscripcion_reps')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento" value="{{old('fecha_vencimiento')}}">
                            <label for="fecha_vencimiento">Fecha de vencimiento * </label>
                            @error('fecha_vencimiento')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <label for="" style="color: #53BEFB">Naturaleza Juridiaca *</label><br>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="naturaleza_juridica" id="inlineRadio1" value="Publica" >
                            <label class="form-check-label" for="naturaleza_juridica">Publica</label>
                            
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="naturaleza_juridica" id="inlineRadio2" value="Privada" >
                            <label class="form-check-label" for="naturaleza_juridica">Privada</label>
                            
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="naturaleza_juridica" id="inlineRadio3" value="Mixta" >
                            <label class="form-check-label" for="naturaleza_juridica">Mixta</label>
                        </div>
                        @error('naturaleza_juridica')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">Nivel de complejidad *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nivel_complejidad" id="inlineRadio1" value="Baja" >
                            <label class="form-check-label" for="nivel_complejidad">Baja</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nivel_complejidad" id="inlineRadio2" value="Mediana" >
                            <label class="form-check-label" for="nivel_complejidad">Mediana</label>
                        </div>
                        @error('nivel_complejidad')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br><br>
                        <div>
                            <livewire:select-component/>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="{{old('direccion')}}">
                            <label for="direccion">Direccion *</label>
                            @error('direccion')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <label for="" style="color: #53BEFB">Caracter territorial *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caracter_territorial" id="caracter_territorial1" value="Nacional" >
                            <label class="form-check-label" for="caracter_territorial">Nacional</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caracter_territorial" id="caracter_territorial2" value="Distrital" >
                            <label class="form-check-label" for="caracter_territorial">Distrital</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caracter_territorial" id="caracter_territorial3" value="Departamental" >
                            <label class="form-check-label" for="caracter_territorial">Departamental</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caracter_territorial" id="caracter_territorial4" value="Municipal" >
                            <label class="form-check-label" for="caracter_territorial">Municipal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caracter_territorial" id="caracter_territorial5" value="Indigena" >
                            <label class="form-check-label" for="caracter_territorial">Indigena</label>
                        </div>
                        @error('caracter_territorial')
                        <div class="alert alert-danger" role="alert">
                           <h6 class="error">{{$message}}</h6>
                        </div>
                       @enderror
                        <br>  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="director_general" name="director_general" placeholder="director general" value="{{old('director_general')}}">
                            <label for="director_general">Nombre del director general o gerente de la institucion *</label>
                            @error('director_general')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="director_medico" name="director_medico" placeholder="director medico" value="{{old('director_medico')}}">
                            <label for="director_medico">Nombre del director medico o equivalente *</label>
                            @error('director_medico')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="referente_ips" name="referente_ips" placeholder="Codigo de Habilitacion" value="{{old('referente_ips')}}">
                            <label for="referente_ips">Nombre del Referente de la IPS (Persona que sera el contacto directo en el proceso) *</label>
                            @error('referente_ips')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" value="{{old('cargo')}}">
                            <label for="cargo">Cargo *</label>
                            @error('cargo')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{old('telefono')}}">
                            <label for="telefono">Telefono *</label>
                            @error('telefono')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                            <label for="email">Email *</label>
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <label for="" style="color: #53BEFB">¿La IPS tiene implementada la ruta y/o  procesos de atención materno infantil? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="atencion_infantil" id="inlineRadio1" value="Si" >
                            <label class="form-check-label" for="atencion_infantil">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="atencion_infantil" id="inlineRadio2" value="No" >
                            <label class="form-check-label" for="atencion_infantil">No</label>
                        </div>
                        @error('atencion_infantil')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">¿La IPS tiene procesos de atencion para la deteccción temprana de enfermedades cardiovasculares? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="deteccion_temprana_enfermedades_cardiovasculares" id="deteccion_temprana_enfermedades_cardiovasculares" value="Si" >
                            <label class="form-check-label" for="deteccion_temprana_enfermedades_cardiovasculares">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="deteccion_temprana_enfermedades_cardiovasculares" id="deteccion_temprana_enfermedades_cardiovasculares" value="No" >
                            <label class="form-check-label" for="deteccion_temprana_enfermedades_cardiovasculares">No</label>
                        </div>
                        @error('deteccion_temprana_enfermedades_cardiovasculares')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">¿Cuenta con programas para atencion de obesidad? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="programas_atencion_obesidad" id="programas_atencion_obesidad" value="Si" >
                            <label class="form-check-label" for="programas_atencion_obesidad">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="programas_atencion_obesidad" id="programas_atencion_obesidad" value="No" >
                            <label class="form-check-label" for="programas_atencion_obesidad">No</label>
                        </div>
                        @error('programas_atencion_obesidad')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">¿Cuenta con programas para atencion de Diabetes? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="programas_atencion_diabetes" id="programas_atencion_diabetes" value="Si" >
                            <label class="form-check-label" for="programas_atencion_diabetes">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="programas_atencion_diabetes" id="programas_atencion_diabetes" value="No" >
                            <label class="form-check-label" for="programas_atencion_diabetes">No</label>
                        </div>
                        @error('programas_atencion_diabetes')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">¿Cuenta con programas para atencion de HTA? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="programas_atencion_hta" id="programas_atencion_hta" value="Si" >
                            <label class="form-check-label" for="programas_atencion_hta">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="programas_atencion_hta" id="programas_atencion_hta" value="No" >
                            <label class="form-check-label" for="programas_atencion_hta">No</label>
                        </div>
                        @error('programas_atencion_hta')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">¿La IPS tiene procesos de atencion para la deteccion temprana de cancer? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="procesos_atencion_deteccion_temprana_cancer" id="procesos_atencion_deteccion_temprana_cancer" value="Si" >
                            <label class="form-check-label" for="procesos_atencion_deteccion_temprana_cancer">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="procesos_atencion_deteccion_temprana_cancer" id="procesos_atencion_deteccion_temprana_cancer" value="No" >
                            <label class="form-check-label" for="procesos_atencion_deteccion_temprana_cancer">No</label>
                        </div>
                        @error('procesos_atencion_deteccion_temprana_cancer')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror
                        <br>
                        <label for="" style="color: #53BEFB">¿La IPS ha trabajado en el enfoque diferencial en sus procesos de atencion? *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="enfoque_diferencial_procesos_atencion" id="enfoque_diferencial_procesos_atencion" value="Si">
                            <label class="form-check-label" for="enfoque_diferencial_procesos_atencion">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="enfoque_diferencial_procesos_atencion" id="enfoque_diferencial_procesos_atencion" value="No">
                            <label class="form-check-label" for="enfoque_diferencial_procesos_atencion">No</label>
                        </div>
                        @error('enfoque_diferencial_procesos_atencion')
                                <div class="alert alert-danger" role="alert">
                                <h6 class="error">{{$message}}</h6>
                                </div>
                        @enderror

                               
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                </div>
                </form>  
                </div>
            </div>
            </div>
            @livewireScripts
</body>
</html>