<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>Document</title>
    <header>
    <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
                @auth
                <div class="button-logout">
                    <a href="/logout" class="btn btn-light">cerrar sesion</a>
                </div>   
                <div class="button-home">
                    <a href="/" class="btn btn-light">Inicio</a>
                </div>  
</head>
</header>
<body>
    <div class="form">
        <form action="{{url('/respuesta/'.$pregunta->id.'/update')}}" method="post">
            @csrf
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="pregunta" style="height: 100px">{{$pregunta->pregunta}}</textarea>
                    <br><label for="floatingTextarea2">Pregunta</label>
                
                </div>
                <input type="submit" name="Editar" value="Editar" class="btn btn-primary">
            </form>
    @endauth
    </div>
    
</body>
</html>