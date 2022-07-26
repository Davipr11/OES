<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
</head>
<body>
    <br><br><br>
    <center>
               <span>
                <b><h3 style="color: #009FE3 ">Inicio de sesion</h3></b>
            </span> 
    </center>
    <br>
<div class="container-login">
    <center>
        <img class="img-fluid" src="{{asset('iconopremiopng.png')}}">
    </center>
    
    
    <form action="/login" method="post" >       
            @csrf      
        <br>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
                    </div>
                @endif
            <div class="form-floating">
                <input type="text" name="usuario" class="form-control" placeholder="Usuario o correo" value="{{old('usuario')}}">
                <label for="usuario" >Usuario o correo *</label>
                
            </div>
            <br>
            <div class="form-floating">
                
                <input type="Password" name="password" class="form-control" placeholder="Contraseña" value="{{old('password')}}">
                <label for="password" >Contraseña *</label>
                
            </div>
            <br>
            <input type="submit" name="Iniciar_sesion" value="Iniciar sesion" class="button-login">
        
    </form>
 
</div> 
<center>
    <img src="{{asset('logousaidlogin.jpg')}}" alt=""> 
</center>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>