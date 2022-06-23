<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
</head>
<body>
    <h5>USUARIOS</h5>
    <table>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tipo documento</th>
                <th>Documento</th>
                <th>Fecha nacimiento</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Tipo usuario</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->Nombres}}</td>
                <td>{{$usuario->Apellidos}}</td>
                <td>{{$usuario->Tipo_documento}}</td>
                <td>{{$usuario->Documento}}</td>
                <td>{{$usuario->Fecha_nacimiento}}</td>
                <td>{{$usuario->Correo}}</td>
                <td>{{$usuario->Direccion}}</td>
                <td>{{$usuario->Tipo_Usuario}}</td>
                <td>{{$usuario->Usuario}}</td>
                <td>{{$usuario->Estado}}</td>
                <td>
                    <a href="{{url('/consulta/'.$usuario->id.'/edit')}}">Actualizar</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="/home">Inicio</a>
</body>
</html>