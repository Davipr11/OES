<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
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
    <div class="form">
    <h3>INSCRITOS</h3><br>    
        <table class="table table-striped table-hover"> 
            <tr>
                <th>IPS</th>
                <th>NIT</th>         
                <th>Departamento</th>
                <th>Director medico</th>
                <th>Telefono</th>
                <th>Email</th>
            </tr>
            @foreach ($inscritos as $inscrito)
            <tr>
               <td>{{$inscrito->ips}}</td>         
                <td>{{$inscrito->nit}}</td>        
                <td>{{$inscrito->departamento}}</td>        
                <td>{{$inscrito->director_medico}}</td>         
                <td>{{$inscrito->telefono}}</td>
                <td>{{$inscrito->email}}</td>
            </tr>
             @endforeach        
    </table> 

    <a href="/exportar" class="btn btn-primary">Exportar excel</a>
    </div>
</body>
</html>