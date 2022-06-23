<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
    <h1>CREAR USUARIO</h1>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        <label for="Nombres">Nombres:</label>
        <input type="text" name="Nombres">
        <br>
        <label for="Apellidos">Apellidos:</label>
        <input type="text" name="Apellidos">
        <br>
        <label for="Tipo_documento">Tipo Documento:</label>
        <select name="Tipo_documento" required id="Tipo_documento">
            <option value="1">Cedula</option>
            <option value="2">Tarjeta de identidad</option>
            <option value="3">Pasaporte</option>
        </select>
        <br>
        <label for="Documento">Documento:</label>
        <input type="number" name="Documento">
        <br>
        <label for="Fecha_nacimiento">Fecha nacimiento:</label>
        <input type="date" name="Fecha_nacimiento" >
        <br>
        <label for="Correo">Correo:</label>
        <input type="email" name="Correo">
        <br>
        <label for="Direccion">Direccion:</label>
        <input type="text" name="Direccion">
        <br>
        <label for="Tipo_Usuario">Tipo Usuario:</label>
        <select name="Tipo_Usuario"  required id="Tipo_Usuario">
            <option value="1">Administrador</option>
            <option value="2">Operador</option>
            <option value="3">Operador2</option>
        </select>
        <br>
        <label for="Usuario">Usuario:</label>
        <input type="text" name ="Usuario" id="Usuario">
        <br>
        <label for="Contrasena">Contraseña:</label>
        <input type="password" name ="Contrasena" id="Contrasena">
        <br>
        <label for="Estado">Estado:</label>
        <select name="Estado"  required id="Estado">
            <option value="Habilitado">Habilitado</option>
            <option value="Suspendido">Suspendido</option>
        </select>
        <br>
        <input type="submit" name = "crear" value="Crear">
    </form>

    <a href="/home">Inicio</a>
</body>
</html>