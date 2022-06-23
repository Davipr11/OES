<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>BUENA ADMIN</h5>

    @auth
        <p>buena {{auth()->user()->Usuario}} inicio sesion</p>
        <a href="/register">crear</a><br>
        
        <a href="/cambiocontrasena">Cambiar contraseña</a><br>
        <a href="/consulta/show">Consultar usuarios</a><br><br>
        <a href="/logout">cerrar sesion</a><br>
    @endauth

    @guest
        <p>pa ver inicie <a href="/login">iniciar sesion</a></p>
    @endguest
</body>
</html>