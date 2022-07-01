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
    <br><br>
    <div class="form">
        <h3>Preguntas</h3>
        @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <h6 class="error">{{session('success')}}</h6>
                    </div> 
                @endif
    @foreach ($preguntas as $pregunta)
    <table class="table table-striped table-hover">
        <tr>
            <tr>
                <th>
                    Pregunta de {{$pregunta->Usuario}}
                </th>
            </tr>
            <tr>
                <td>
                    Pregunta: {{$pregunta->pregunta}} 
                    
                </td>               
            </tr>
            <tr>
                <td>
                    Realizada el: {{$pregunta->created_at}} 
                </td>
            </tr>
            <tr>
                <th>
                    Respuestas
                </th>
                <tr>
                    <td>                   
                             @foreach ($respuestas as $respuesta)
                             @if ($pregunta->id==$respuesta->id_pregunta)
                                -{{$respuesta->respuesta}}
                                <br><br>
                              @endif  
                            @endforeach    
                    </td>
                </tr>
            </tr>
        </tr>
    </table>
    <form action="/respuesta" method="post">
        @csrf
        
    <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="respuesta" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Responde</label>
            <input type="hidden" name="id_pregunta" value="{{$pregunta->id}}">
    </div>
        <input type="submit" class="btn btn-primary" value="responder">
    <br><br>
</form>
    @endforeach
</div>
    @endauth
</body>
</html>