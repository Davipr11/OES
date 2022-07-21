<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>operador</title>
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
                @auth
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-arrow-right-from-bracket" style="font-size:12px"></i>&nbsp;
                <a href="https://app.premiocalidadaps.com.co/logout">Cerrar sesion</a>
                </button>
                </li> 
                @endauth  
            </ul>  
        </div>
    </nav>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#205493!important; "> <a class="navbar-brand" href="#"><img src="{{asset('iconopremiopng.png')}}" alt="" style="width:width: 100%; max-width: 250px "></a>
        </nav>
        <script src="https://kit.fontawesome.com/782d75be0f.js" crossorigin="anonymous"></script>
    </header>
</head>
<body>
<br>
    <div class="container">
        
            <h3>EVALUADOR</h3>
           
            <div class="d-grid gap-2 col-6 mx-auto">
            <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consultaInscripcion" class=" button-home-a">Consultar inscripciones</a>
            <a href="https://app.premiocalidadaps.com.co/cambiocontrasena" class="button-home-a">Cambiar contraseña</a>
            <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Preguntas_Frecuentes" class=" button-home-a">Preguntas</a>
        </div>
        

    
    </div>
</body>
</body>
    
</body>
</html>