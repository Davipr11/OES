<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <title>Premio Calidad</title>
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
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/register">Crear Usuario</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/cambiocontrasena">Cambiar contraseña</a>
                </button>
                </li>
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consulta/show">Usuarios</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consultaInscripcion">Inscripciones</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/respuesta">Preguntas</a>
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
</head>
<body>
    <br><br>
    <div class="form">
        <center>
            <h3 style="color: #53BEFB">Preguntas Frecuentes</h3>
        </center>
        
        @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
                    </div>
        @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <h6>{{session('success')}}</h6>
                    </div> 
                @endif
    @foreach ($preguntas as $pregunta)
    <table class="table table-hover table-resp">
        <tr>
            <tr>
                <th>
                    <span class="text-table">
                        Pregunta de {{$pregunta->email}}
                    </span>
                    
                </th>
            </tr>
            <tr>
                <td>
                    Pregunta: {{$pregunta->pregunta}} 
                    
                </td>               
            </tr>
            <tr>
                <td>
                    Realizada el: {{$pregunta->created_at}} 
                </td>
            </tr>
            <tr>
                <th>
                    Respuestas
                </th>
                <tr>
                    <td>                   
                             @foreach ($respuestas as $respuesta)
                             @if ($pregunta->id==$respuesta->id_pregunta)
                                -{{$respuesta->respuesta}}
                                <br><br>
                              @endif  
                            @endforeach    
                    </td>
                </tr>
            </tr>
        </tr>
    </table>
    <form action="/Premio_nacional_OES/Evaluadores/respuesta" method="post">
        @csrf
        
    <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="respuesta" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Responde</label>
            <input type="hidden" name="id_pregunta" value="{{$pregunta->id}}">
    </div>
        <input type="submit" class="btn btn-primary" value="Responder">
        <a href="{{url('/Premio_nacional_OES/Evaluadores/respuesta/'.$pregunta->id.'/eliminar')}}" class="btn btn-danger">Eliminar</a>
        <a href="{{url('/Premio_nacional_OES/Evaluadores/respuesta/'.$pregunta->id.'/editar')}}" class="btn btn-info">Editar</a>
    <br><br>
</form>

    @endforeach
</div>
</body>
</html>
