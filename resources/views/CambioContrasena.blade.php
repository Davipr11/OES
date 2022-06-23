<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambio</title>
    <h1>CAMBIO CONTRASEÑA</h1>
</head>
<body>
<form action="/cambiocontrasena" method="post" >
            @csrf

            @if($errors->any())
                {!! implode('', $errors->all('<h1>:message</h1>')) !!}
            @endif
            <label for="password">Contraseña Actual:</label>
            <input type="Password" name="password" required>
            <br>
            <label for="nuevapassword"> Nueva Contraseña:</label>
            <input type="Password" name="nuevapassword" required>
            <br>
            <label for="conpassword"> Confirmar Contraseña:</label>
            <input type="Password" name="conpassword" required>
            <br>
            <input type="submit" name="Actualizar_contraseña" value="Cambiar">
        
    </form>
    <br><br>
    <a href="/">Inicio </a>
</body>
</html>