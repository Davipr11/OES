<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>operador</title>
    <header>
        <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
                @auth
                <div class="button-logout">
                    <a href="/logout" class="btn btn-light">cerrar sesion</a>
                </div>               
    </header>
</head>
<body>
<br>
    <div class="container">
        
            <h3>OPERADOR</h3>
            <h4>Bienvenido {{auth()->user()->Usuario}} </h4><br>
            <div class="d-grid gap-2 col-6 mx-auto">
            <a href="/cambiocontrasena" class="btn btn-primary">Cambiar contraseña</a>
            <a href="/pregunta" class="btn btn-primary">Preguntas</a>
        </div>
        @endauth

        @guest
            <p>pa ver inicie <a href="/login">iniciar sesion</a></p>
        @endguest
        
    </div>
</body>
</body>
    
</body>
</html>