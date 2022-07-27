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
    <title>Actualizar</title>
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
            @endif
                </li>
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
            @endif
                </li>
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
    <form action="{{url('/Premio_Nacional_OES/Evaluadores/consulta/'.$usuario->id)}}" method="post">
    <br>
    <div class="container">
        <center>
            <b><h3 style="color: #009FE3 ">Actualizar usuario</h3></b>
        </center>
    
        @csrf
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label for="Nombres" class="form-label">Nombres:</label>
            <input type="text" name="Nombres" value="{{$usuario->Nombres}}"  class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos:</label>
            <input type="text" name="Apellidos" value="{{$usuario->Apellidos}}"  class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Tipo_documento" class="form-label">Tipo Documento:</label>
            <select name="Tipo_documento" required id="Tipo_documento"  class="form-control">
                <option value="{{$usuario->Tipo_documento}}">{{$usuario->Tipo_documento}}</option>
                <option value="1">Cedula</option>
                <option value="2">Tarjeta de identidad</option>
                <option value="3">Pasaporte</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Documento" class="form-label">Documento:</label>
            <input type="number" name="Documento" value="{{$usuario->Documento}}"  class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Fecha_nacimiento" class="form-label">Fecha nacimiento:</label>
            <input type="date" name="Fecha_nacimiento" value="{{$usuario->Fecha_nacimiento}}"  class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Correo" class="form-label">Correo:</label>
            <input type="email" name="Correo" value="{{$usuario->Correo}}"  class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Direccion" class="form-label">Direccion:</label>
            <input type="text" name="Direccion" value="{{$usuario->Direccion}}"  class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Tipo_Usuario" class="form-label">Tipo Usuario:</label>
            <select name="Tipo_Usuario"  required id="Tipo_Usuario"  class="form-control">
            <option value="{{$usuario->Tipo_Usuario}}">{{$usuario->Tipo_Usuario}}</option>
                <option value="1">Administrador</option>
                <option value="2">Operador</option>
                <option value="3">Operador2</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado:</label>
            <select name="Estado"  required id="Estado"  class="form-control">
            <option value="{{$usuario->Estado}}">{{$usuario->Estado}}</option>
                <option value="Habilitado">Habilitado</option>
                <option value="Suspendido">Suspendido</option>
            </select>
        </div>
        
        <input type="submit" name = "actualizar" value="Actualizar" class="button-edit">
    </div>
    </form>
</body>
</html>