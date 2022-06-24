<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>cambio</title>
    <header>     
            <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
                @auth
                <div class="button-logout">
                    <a href="/logout" class="btn btn-light">cerrar sesion</a>
                </div>
                @endauth
            <div class="button-home">
                <a href="/" class="btn btn-light">Inicio</a>
            </div>
    </header>
    
</head>
<body>

    
    <form action="/cambiocontrasena" method="post" >
        <br>
        <div class="container">
        <h3>CAMBIO CONTRASEÑA</h3>
        <br>
            @csrf

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h6 class="error">{{session('success')}}</h6>
            </div> 
            @endif
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña Actual:</label>
                <input type="Password" name="password" required class="form-control">
            </div>
            <br>
            <div class="mb-3">
                <label for="nuevapassword" class="form-label"> Nueva Contraseña:</label>
                <input type="Password" name="nuevapassword" required class="form-control">
            </div>
            <br>
            <div class="mb-3">
                <label for="conpassword" class="form-label"> Confirmar Contraseña:</label>
                <input type="Password" name="conpassword" required class="form-control">
            </div>
            <br>
            <input type="submit" name="Actualizar_contraseña" value="Cambiar" class="btn btn-primary"> 
    </form>
</div>
</body>
</html>