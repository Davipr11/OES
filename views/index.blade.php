<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>oes</title>
    <header>     
            <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
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
</head>
<body>
     
</body>
</html>