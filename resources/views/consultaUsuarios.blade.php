<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>usuarios</title>
    <header>     
            <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
                @auth
                <div class="button-logout">
                    <a href="/logout" class="btn btn-light">cerrar sesion</a>
                </div>
                @endauth
            <div class="button-home">
                <a href="/home" class="btn btn-light">Inicio</a>
            </div>
           
    </header>
</head>
<body>
<div class="form-table">
    <h3>USUARIOS</h3><br>
    <table class="table table-striped table-hover">
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

</div>
</body>
</html>