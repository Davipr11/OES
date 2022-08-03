<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <title>Premio Calidad</title>
    <header>   
    <nav class="navbar navbar-expand-xl navbar-light bg-light"> <a class="navbar-brand" href="https://premiocalidadaps.com.co/"><img src="{{asset('logominisalud.png')}}" alt=""></a>       
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse div-a" id="navbarSupportedContent2">
            <ul class="navbar-nav ">
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-house" style="font-size:12px"></i>&nbsp;
                <a href="https://premiocalidadaps.com.co/">home</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-table-list" style="font-size:12px"></i>&nbsp;
                <a href="https://premiocalidadaps.com.co/Premio_nacional_OES/proceso-de-postulacion/">Proceso de postulación</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-circle-question" style="font-size:12px"></i>&nbsp;
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Preguntas_Frecuentes">Preguntas frecuentes</a>
                </button>
                </li> 
                @auth
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-a" style="background-color:#006799; color:white "><i class="fa-solid fa-arrow-right-from-bracket" style="font-size:12px"></i>&nbsp;
                <a href="https://app.premiocalidadaps.com.co/logout">Cerrar sesión</a>
                </button>
                </li> 
                @endauth 
            </ul>  
        </div>
    </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#205493!important; "> <a class="navbar-brand" href="#"><img src="{{asset('iconopremiopng.png')}}" alt="" style="width:width: 100%; max-width: 250px "></a>
        </nav>
        <script src="https://kit.fontawesome.com/782d75be0f.js" crossorigin="anonymous"></script>
    </header>
</head>
<br><br>
<body>
    @auth
    <div class="form">
        <b>
            <h3 style="color: #009FE3 ">Preguntar</h3>
        </b>
        <br>
    <form action="/Premio_nacional_OES/Preguntas_Frecuentes" method="post">
        @csrf     
       
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <h6>{{session('success')}}</h6>
                    </div> 
                    @endif
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="pregunta" style="height: 100px"></textarea>
            <br><label for="floatingTextarea2">Pregunta</label>  
            @error('pregunta')
                <b><h6 class="error">{{$message}}</h6></b>
            @enderror  
        </div>
        <br>
        <div class="py-2">
            <input type="submit" name="Preguntar" value="Preguntar" class="button-home-pre" style="margin-top:10px !important">
        </div>
        
    </form>
    <br>
    <b>
        <h3 style="color: #009FE3">Preguntar frecuentes</h3>
    </b>
    
    @foreach ($preguntas as $pregunta)
    <table class="table table-hover">
        <tr>
            <tr>
                <th>
                    <span style="color: #439AFF">
                        Pregunta: 
                    </span>
                    <br> 
                    {{$pregunta->pregunta}} 
                </th>
            </tr>
            <tr>
                <td>
                    Realizada el: {{$pregunta->created_at}} 
                </td>
            </tr>
            <tr>
                <th>
                <span style="color: #439AFF">
                        Respuestas: 
                    </span>
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
    <br><br>
    @endforeach
    @endauth 

    @guest

    <div class="form">
        <h3 style="color: #009FE3">Preguntar</h3>
        <br>
    <form action="/Premio_nacional_OES/Preguntas_Frecuentes" method="post">
        @csrf     
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <h6>{{session('success')}}</h6>
                    </div> 
                    @endif
                        
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                        <label for="email">Email *</label>
                        @error('email')
                            
                            <h6 class="error">{{$message}}</h6>
                            
                        @enderror
                    </div><br>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="pregunta" style="height: 100px">{{old('pregunta')}}</textarea>
                        <label for="floatingTextarea2">Pregunta *</label>
                    </div>
                        @error('pregunta')
                            
                            <h6 class="error">{{$message}}</h6>
                           
                        @enderror
                        <div class="py-2">
                                <input type="submit" name="Preguntar" value="Preguntar" class="button-home-pre" style="margin-top:10px !important">
                        </div>
    </form>
    <br>
    <h3 style="color: #009FE3">Preguntar frecuentes</h3>
    @foreach ($preguntas as $pregunta)
    <table class="table table-hover">
        <tr>
            <tr>
                <th>
                    <span style="color: #439AFF">
                        Pregunta: 
                    </span>
                    
                    <br> 
                    {{$pregunta->pregunta}} 
                </th>
            </tr>
            <tr>
                <td>
                    Realizada el: {{$pregunta->created_at}} 
                </td>
            </tr>
            <tr>
                <th>
                    <span style="color: #439AFF">
                        Respuestas
                    </span>
                    
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
    <br><br>
    @endforeach
    @endguest
</div>
</body>
</html>