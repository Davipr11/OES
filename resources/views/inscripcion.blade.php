<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <title>Premio Calidad</title>  
    <header>   
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="https://premiocalidadaps.com.co/"><img src="{{asset('logominisalud.png')}}" alt=""></a>       
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse div-a" id="navbarSupportedContent2">
            <ul class="navbar-nav ">
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-house" style="font-size:12px"></i>&nbsp;
                <a href="https://premiocalidadaps.com.co/">home</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-table-list" style="font-size:12px"></i>&nbsp;
                <a href="https://premiocalidadaps.com.co/Premio_nacional_OES/proceso-de-postulacion/">Proceso de postulación</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-circle-question" style="font-size:12px"></i>&nbsp;
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Preguntas_Frecuentes">Preguntas frecuentes</a>
                </button>
                </li>  
            </ul>  
        </div>
    </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#205493!important; "> <a class="navbar-brand" href="#"><img src="{{asset('iconopremiopng.png')}}" alt="" style="width:width: 100%; max-width: 250px "></a>
        </nav>
        <script src="https://kit.fontawesome.com/782d75be0f.js" crossorigin="anonymous"></script>
    </header>
    @livewireStyles
</head>
<body>
<!-- Modal -->
            @if (session('success'))
            
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Felicidades</h5>
                        
                    </div>
                    <div class="modal-body">
                        <p>Te has inscrito satisfactoriamente, pronto nos comunicaremos contigo.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button-edit">
                            <a href="/Premio_Nacional_OES/inscripcion">Aceptar</a>
                        </button>
                    </div>
                    </div>
                </div>            
            @endif 
            <div class="form-ins">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario de inscripción</h5>
                    
                </div>
                <div class="modal-body">
                    <p>El formulario de inscripción debe ser diligenciado en su totalidad.
                        <span class="text-line">
                           Esta inscripción 
                        <b>NO</b>
                        tiene costo alguno. 
                        </span>  El equipo técnico del premio podrá hacer verificación de la información suministrada.
                    </p><br>
                    <p>Las instituciones aceptadas para participar en el proceso de evaluacion recibirán comunicacián formal
                         a través de los canales de comunicación definidos por el Premio Nacional.</p>
                         <br><br>
                         
                    <form action="/Premio_Nacional_OES/inscripcion" method="post">
                        @csrf
                        @error('Codigorandom')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ips" name="ips" placeholder="ips"  value="{{old('ips')}}">
                            <label for="ips">Nombre de la IPS *</label>
                            
                            @error('ips')
                                
                                <b><h6 class="error">{{$message}}</h6></b>
                                
                            @enderror
                            
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="nit" name="nit" placeholder="nit" value="{{old('nit')}}">
                            <label for="nit">NIT *</label>
                            @error('nit')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="codigo_habilitacion_prestador" name="codigo_habilitacion_prestador" placeholder="Codigo de Habilitacion"  value="{{old('codigo_habilitacion_prestador')}}">
                            <label for="codigo_habilitacion_prestador">Código de Habilitación del prestador *</label>
                            @error('codigo_habilitacion_prestador')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="fecha_inscripcion_reps" name="fecha_inscripcion_reps" placeholder="Fecha de inscripcion REPS" value="{{old('fecha_inscripcion_reps')}}">
                            <label for="fecha_inscripcion_reps">Fecha de inscripción REPS * </label>
                            @error('fecha_inscripcion_reps')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento" value="{{old('fecha_vencimiento')}}">
                            <label for="fecha_vencimiento">Fecha de vencimiento * </label>
                            @error('fecha_vencimiento')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <b><label for="" style="color: #009FE3">Naturaleza Jurídiaca *</label></b><br>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="naturaleza_juridica" id="inlineRadio1" value="Publica" {{ old('naturaleza_juridica') == "Publica" ? 'checked' : '' }}>
                            <label class="form-check-label" for="naturaleza_juridica">Pública</label>
                            
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="naturaleza_juridica" id="inlineRadio2" value="Privada" {{ old('naturaleza_juridica') == "Privada" ? 'checked' : '' }}>
                            <label class="form-check-label" for="naturaleza_juridica">Privada</label>
                            
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="naturaleza_juridica" id="inlineRadio3" value="Mixta" {{ old('naturaleza_juridica') == "Mixta" ? 'checked' : '' }}>
                            <label class="form-check-label" for="naturaleza_juridica">Mixta</label>
                        </div>
                        @error('naturaleza_juridica')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">Nivel de complejidad *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="nivel_complejidad" id="inlineRadio1" value="Baja" {{ old('nivel_complejidad') == "Baja" ? 'checked' : '' }}>
                            <label class="form-check-label" for="nivel_complejidad">Baja</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="nivel_complejidad" id="inlineRadio2" value="Mediana"{{ old('nivel_complejidad') == "Mediana" ? 'checked' : '' }} >
                            <label class="form-check-label" for="nivel_complejidad">Mediana</label>
                        </div>
                        @error('nivel_complejidad')
                        <b><h6 class="error">{{$message}}</h6></b>
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
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <b><label for="" style="color: #009FE3">Carácter territorial *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-value" type="radio" name="caracter_territorial" id="caracter_territorial1" value="Nacional" {{ old('caracter_territorial') == "Nacional" ? 'checked' : '' }}>
                            <label class="form-check-label" for="caracter_territorial">Nacional</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-value" type="radio" name="caracter_territorial" id="caracter_territorial2" value="Distrital" {{ old('caracter_territorial') == "Distrital" ? 'checked' : '' }}>
                            <label class="form-check-label" for="caracter_territorial">Distrital</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-value" type="radio" name="caracter_territorial" id="caracter_territorial3" value="Departamental" {{ old('caracter_territorial') == "Departamental" ? 'checked' : '' }}>
                            <label class="form-check-label" for="caracter_territorial">Departamental</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-value" type="radio" name="caracter_territorial" id="caracter_territorial4" value="Municipal" {{ old('caracter_territorial') == "Municipal" ? 'checked' : '' }}>
                            <label class="form-check-label" for="caracter_territorial">Municipal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-value" type="radio" name="caracter_territorial" id="caracter_territorial5" value="Indigena" {{ old('caracter_territorial') == "Indigena" ? 'checked' : '' }}>
                            <label class="form-check-label" for="caracter_territorial">Indigena</label>
                        </div>
                        <br>
                        @error('caracter_territorial')
                        <b><h6 class="error">{{$message}}</h6></b>
                       @enderror
                        <br>  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="director_general" name="director_general" placeholder="director general" value="{{old('director_general')}}">
                            <label for="director_general">Nombre del director general o gerente de la institucion *</label>
                            @error('director_general')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="director_medico" name="director_medico" placeholder="director medico" value="{{old('director_medico')}}">
                            <label for="director_medico">Nombre del director medico o equivalente *</label>
                            @error('director_medico')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="referente_ips" name="referente_ips" placeholder="Codigo de Habilitacion" value="{{old('referente_ips')}}">
                            <label for="referente_ips">Nombre del Referente de la IPS (Persona que sera el contacto directo en el proceso del Premio) *</label>
                            @error('referente_ips')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" value="{{old('cargo')}}">
                            <label for="cargo">Cargo *</label>
                            @error('cargo')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{old('telefono')}}">
                            <label for="telefono">Celular *</label>
                            @error('telefono')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                            <label for="email">E-mail *</label>
                            @error('email')
                            <b><h6 class="error">{{$message}}</h6></b>
                            @enderror
                        </div>
                        <br>
                        <b><label for="" style="color: #009FE3">¿La IPS tiene implementada la Ruta Integral de Atención en Salud Materno Perinatal? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-value" type="radio" name="atencion_infantil" id="inlineRadio1" value="Si" {{ old('atencion_infantil') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label " for="atencion_infantil">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="atencion_infantil" id="inlineRadio2" value="No" {{ old('atencion_infantil') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="atencion_infantil">No</label>
                        </div>
                        @error('atencion_infantil')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">¿La IPS tiene procesos de atención para la deteccción temprana de enfermedades cardiovasculares? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="deteccion_temprana_enfermedades_cardiovasculares" id="deteccion_temprana_enfermedades_cardiovasculares" value="Si" {{ old('deteccion_temprana_enfermedades_cardiovasculares') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label" for="deteccion_temprana_enfermedades_cardiovasculares">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="deteccion_temprana_enfermedades_cardiovasculares" id="deteccion_temprana_enfermedades_cardiovasculares" value="No" {{ old('deteccion_temprana_enfermedades_cardiovasculares') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="deteccion_temprana_enfermedades_cardiovasculares">No</label>
                        </div>
                        @error('deteccion_temprana_enfermedades_cardiovasculares')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">¿Cuenta con procesos de atención para obesidad? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="programas_atencion_obesidad" id="programas_atencion_obesidad" value="Si" {{ old('programas_atencion_obesidad') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label" for="programas_atencion_obesidad">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="programas_atencion_obesidad" id="programas_atencion_obesidad" value="No" {{ old('programas_atencion_obesidad') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="programas_atencion_obesidad">No</label>
                        </div>
                        @error('programas_atencion_obesidad')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">¿Cuenta con procesos de atención en Diabetes? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="programas_atencion_diabetes" id="programas_atencion_diabetes" value="Si" {{ old('programas_atencion_diabetes') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label" for="programas_atencion_diabetes">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="programas_atencion_diabetes" id="programas_atencion_diabetes" value="No" {{ old('programas_atencion_diabetes') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="programas_atencion_diabetes">No</label>
                        </div>
                        @error('programas_atencion_diabetes')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">¿Cuenta con procesos de atención en HTA? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="programas_atencion_hta" id="programas_atencion_hta" value="Si" {{ old('programas_atencion_hta') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label" for="programas_atencion_hta">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="programas_atencion_hta" id="programas_atencion_hta" value="No" {{ old('programas_atencion_hta') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="programas_atencion_hta">No</label>
                        </div>
                        @error('programas_atencion_hta')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">¿La IPS tiene procesos de atención para la deteccion temprana de cáncer? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="procesos_atencion_deteccion_temprana_cancer" id="procesos_atencion_deteccion_temprana_cancer" value="Si" {{ old('procesos_atencion_deteccion_temprana_cancer') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label" for="procesos_atencion_deteccion_temprana_cancer">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="procesos_atencion_deteccion_temprana_cancer" id="procesos_atencion_deteccion_temprana_cancer" value="No" {{ old('procesos_atencion_deteccion_temprana_cancer') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="procesos_atencion_deteccion_temprana_cancer">No</label>
                        </div>
                        @error('procesos_atencion_deteccion_temprana_cancer')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        <br>
                        <b><label for="" style="color: #009FE3">¿La IPS ha trabajado en el enfoque diferencial en sus procesos de atención? *</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="enfoque_diferencial_procesos_atencion" id="enfoque_diferencial_procesos_atencion" value="Si" {{ old('enfoque_diferencial_procesos_atencion') == "Si" ? 'checked' : '' }}>
                            <label class="form-check-label" for="enfoque_diferencial_procesos_atencion">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  radio-value" type="radio" name="enfoque_diferencial_procesos_atencion" id="enfoque_diferencial_procesos_atencion" value="No" {{ old('enfoque_diferencial_procesos_atencion') == "No" ? 'checked' : '' }}>
                            <label class="form-check-label" for="enfoque_diferencial_procesos_atencion">No</label>
                        </div>
                        @error('enfoque_diferencial_procesos_atencion')
                        <b><h6 class="error">{{$message}}</h6></b>
                        @enderror
                        
                        <input type="hidden" name="Codigorandom" id="Codigorandom" value="{{rand(1000, 99999)}}">
                        <input type="hidden" name="id" id="id" value="{{rand(9999, 99999)}}">
                        
                               
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button-edit" name="enviar">Enviar</button>
                </div>
                </form>  
                </div>
            </div>
            </div>
            <img src="{{asset('logousaidlogin.jpg')}}" alt="">
            @livewireScripts
</body>