<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <h1>ACTUALIZAR USUARIO</h1>
</head>
<body>
    <form action="{{url('/consulta/'.$usuario->id)}}" method="post">
        @csrf
        {{method_field('PATCH')}}
        <label for="Nombres">Nombres:</label>
        <input type="text" name="Nombres" value="{{$usuario->Nombres}}">
        <br>
        <label for="Apellidos">Apellidos:</label>
        <input type="text" name="Apellidos" value="{{$usuario->Apellidos}}">
        <br>
        <label for="Tipo_documento">Tipo Documento:</label>
        <select name="Tipo_documento" required id="Tipo_documento">
            <option value="{{$usuario->Tipo_documento}}">{{$usuario->Tipo_documento}}</option>
            <option value="1">Cedula</option>
            <option value="2">Tarjeta de identidad</option>
            <option value="3">Pasaporte</option>
        </select>
        <br>
        <label for="Documento">Documento:</label>
        <input type="number" name="Documento" value="{{$usuario->Documento}}">
        <br>
        <label for="Fecha_nacimiento">Fecha nacimiento:</label>
        <input type="date" name="Fecha_nacimiento" value="{{$usuario->Fecha_nacimiento}}">
        <br>
        <label for="Correo">Correo:</label>
        <input type="email" name="Correo" value="{{$usuario->Correo}}">
        <br>
        <label for="Direccion">Direccion:</label>
        <input type="text" name="Direccion" value="{{$usuario->Direccion}}">
        <br>
        <label for="Tipo_Usuario">Tipo Usuario:</label>
        <select name="Tipo_Usuario"  required id="Tipo_Usuario">
        <option value="{{$usuario->Tipo_Usuario}}">{{$usuario->Tipo_Usuario}}</option>
            <option value="1">Administrador</option>
            <option value="2">Operador</option>
            <option value="3">Operador2</option>
        </select>
        <br>
        <label for="Estado">Estado:</label>
        <select name="Estado"  required id="Estado">
        <option value="{{$usuario->Estado}}">{{$usuario->Estado}}</option>
            <option value="Habilitado">Habilitado</option>
            <option value="Suspendido">Suspendido</option>
        </select>
        <br>
        <input type="submit" name = "actualizar" value="Actualizar">
    </form>
</body>
</html>