<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>Crear usuario</title>
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
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h6 >{{session('success')}}</h6>
            </div> 
            @endif
    <form action="{{url('/Premio_nacional_OES/Evaluadores/register')}}" method="post">
    <div class="form">
        <br>
        <center>
            <h3 style="color: #009FE3;">Crear usuario</h3>
        </center>
    
        @csrf
        <div class="form-floating ">        
            <input type="text" name="Nombres" class="form-control" placeholder="Nombres"  value="{{old('Nombres')}}">
            <label for="Nombres" >Nombres:</label>
            @error('Nombres')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">        
            <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos"  value="{{old('Apellidos')}}">
            <label for="Apellidos" >Apellidos:</label>
            @error('Apellidos')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">    
            <select name="Tipo_documento"  id="Tipo_documento" class="form-select">
            <option selected value="">seleccione..</option>
                <option value="1" @if(old('Tipo_documento') == '1')selected @endif>Cedula</option>
                <option value="2" @if(old('Tipo_documento') == '2')selected @endif>Tarjeta de identidad</option>
                <option value="3" @if(old('Tipo_documento') == '3')selected @endif>Pasaporte</option>
            </select>
            <label for="Tipo_documento" >Tipo Documento:</label>
            @error('Tipo_documento')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">    
            <input type="number" name="Documento" class="form-control" placeholder="Documento"  value="{{old('Documento')}}">
            <label for="Documento">Documento:</label>
            @error('Documento')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">
            
            <input type="date" name="Fecha_nacimiento"  class="form-control" placeholder="Fecha nacimiento" value="{{old('Fecha_nacimiento')}}">
            <label for="Fecha_nacimiento">Fecha nacimiento:</label>
            @error('Fecha_nacimiento')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">  
            <input type="email" name="Correo"  class="form-control" placeholder="Correo" value="{{old('Correo')}}">
            <label for="Correo">Correo:</label>
            @error('Correo')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating"> 
            <input type="text" name="Direccion"  class="form-control" placeholder="Direccion" value="{{old('Direccion')}}">
            <label for="Direccion">Direccion:</label>
            @error('Direccion')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">
            
            <select name="Tipo_Usuario" id="Tipo_Usuario" class="form-select">
                <option selected value="">..seleccione..</option>
                <option value="1" @if(old('Tipo_Usuario') == '1')selected @endif>Administrador</option>
                <option value="2" @if(old('Tipo_Usuario') == '2')selected @endif>Evaluador</option>
                <option value="3" @if(old('Tipo_Usuario') == '3')selected @endif>Evaluador2</option>
            </select>
            <label for="Tipo_Usuario">Tipo Usuario:</label>

            @error('Tipo_Usuario')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating"> 
            <input type="text" name ="Usuario" id="Usuario" class="form-control"  placeholder="Usuario" value="{{old('Usuario')}}">
            <label for="Usuario">Usuario:</label>
            @error('Usuario')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">
            
            <input type="password" name ="Contrasena" id="Contrasena" class="form-control"  placeholder="Contrasena" value="{{old('Contrasena')}}">
            <label for="Contrasena" >Contraseña:</label>
            @error('Contrasena')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <div class="form-floating">
            
            <select name="Estado"   id="Estado" class="form-select">
                <option selected value="">seleccione..</option>
                <option value="Habilitado" @if(old('Estado') == 'Habilitado')selected @endif>Habilitado</option>
                <option value="Suspendido" @if(old('Estado') == 'Suspendido')selected @endif>Suspendido</option>
            </select>
            <label for="Estado">Estado:</label>
            @error('Estado')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror
        </div>
        <br>
        <input type="submit" name = "crear" value="Crear" class="button-edit">
    </div>
    </form>
</body>
</html>