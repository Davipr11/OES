<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>operador</title>
</head>
<body>
        <h5>BUENA OPERADOR</h5>

        @auth
            <p>buena {{auth()->user()->Usuario}} inicio sesion</p>

            <a href="/logout">cerrar</a>
            <a href="/cambiocontrasena">Cambiar contraseña</a>
        @endauth

        @guest
            <p>pa ver inicie <a href="/login">iniciar sesion</a></p>
        @endguest
</body>
    
</body>
</html>