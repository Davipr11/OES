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
</head>
<header>   
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="https://premiocalidadaps.com.co/"><img src="{{asset('logominisalud.png')}}" alt=""></a>       
           
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores">home</a>
            </button>
                </li>
                @if (auth()->user()->Tipo_Usuario==1)
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/register">Crear Usuario</a>
            </button>
                </li>
                @endif
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/cambiocontrasena">Cambiar contraseña</a>
                </button>
                </li>
                @if (auth()->user()->Tipo_Usuario==1)
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consulta/show">Usuarios</a>
            </button>
                </li>
                @endif
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consultaInscripcion">Inscripciones</a>
            </button>
                </li>
                @if (auth()->user()->Tipo_Usuario==1)
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/respuesta">Preguntas</a>
                </button>
                </li> 
                @endif
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/evaluados">Evaluados</a>
                </button>
                </li> 
                @auth
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/logout">Cerrar sesion</a>
                </button>
                </li> 
                @endauth  
            </ul>  
        </div>
    </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#205493!important; "> <a class="navbar-brand" href="#"><img src="{{asset('iconopremiopng.png')}}" alt="" style="width:width: 100%; max-width: 250px "></a>
        </nav>
        <script src="https://kit.fontawesome.com/782d75be0f.js" crossorigin="anonymous"></script>
    </header>
<body>
    <br><br>
    <center>
            <h1 style="color: #009FE3">Evaluacion de la inscripcion {{$idinscritos->Codigorandom}}</h1>
    </center>
    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <h6>{{session('success')}}</h6>
                    </div> 
    @endif
    @if($errors->any())                
                {!! implode('', $errors->all('<div class="alert alert-warning" role="alert"><h6 class="error">:message</h6></div> ')) !!}
    @endif
<div class="d-grid gap-2 col-6 mx-auto">
    <button class="button-home-a">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$idinscritos->id.'/1/evaluarPerinatal')}}">Evaluacion atencion en salud materno perinatal</a>
    </button class="button-home-a">
    <button class="button-home-a">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$idinscritos->id.'/2/evaluarCardiovascular')}}">Evaluacion deteccion temprana de enfermedades cardiovasculares</a>
    </button>
    <button class=" button-home-a">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$idinscritos->id.'/3/evaluarCancer')}}">Evaluacion deteccion temprana de cancer</a>
    </button>
    <button class=" button-home-a">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$idinscritos->id.'/4/evaluarEnfoque')}}">Evaluacion integracion del enfoque diferencial en las atenciones del prestador</a>
    </button>
    <br>
    <button class=" button-home-a">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$idinscritos->Codigorandom.'/resultado')}}">Generar Resultado</a>
    </button>
    <button class=" button-home-a">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$idinscritos->Codigorandom.'/resultadofinal')}}">Resultado</a>
    </button>
</div>
</body>
</html>