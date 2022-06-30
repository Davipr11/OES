<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <header>
        <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
        <div class="button-home">
                <a href="/index" class="btn btn-light">Principal</a> 
            </div>
    </header>
</head>
<body>
    <br>
<div class="container">
    
    <form action="/login" method="post" >       
            @csrf       
        
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
                </div>
            @endif
        <h1>Login</h1>
        <br>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario o correo:</label>
                <input type="text" name="usuario"class="form-control" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="Password" name="password" class="form-control" required>
            </div>
            <br>
            <input type="submit" name="Iniciar_sesion" value="Iniciar sesion" class="btn btn-primary">
        
    </form>

</div>   
</body>
</html>