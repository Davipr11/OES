<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <br><br>
    <form action="/login" method="post" >
            @csrf

            @if($errors->any())
                {!! implode('', $errors->all('<h1>:message</h1>')) !!}
            @endif
            <label for="usuario">Usuario o correo:</label>
            <input type="text" name="usuario" required>
            <br>
            
            <label for="password">Contraseña:</label>
            <input type="Password" name="password" required >
            
            
            <br>
            <input type="submit" name="Iniciar_sesion" value="Iniciar sesion">
        
    </form>
    <br><br>
    <a href="/index">Atras</a>
</body>
</html>