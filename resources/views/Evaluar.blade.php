<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>Document</title>
    <header>   
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="https://premiocalidadaps.com.co/"><img src="{{asset('logominisalud.png')}}" alt=""></a>       
           
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores">home</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/register">Crear Usuario</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/cambiocontrasena">Cambiar contraseña</a>
                </button>
                </li>
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consulta/show">Usuarios</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consultaInscripcion">Inscripciones</a>
            </button>
                </li>
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/respuesta">Preguntas</a>
                </button>
                </li> 
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="/Premio_nacional_OES/Evaluadores/evaluados">Evaluados</a>
                </button>
                </li> 
                @auth
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/logout">Cerrar sesion</a>
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
<body>

    <h1>Evaluacion de la inscripcion {{$inscripcion->Codigorandom}}</h1>
    
    <form action="{{url('Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$inscripcion->Codigorandom.'/evaluacion')}}" method="post">
    @csrf
    <table class="table table-striped container-table">
        <th>Estructura gobierno</th>
    
    <br>
    
    <tr>
        
        <td>
            @if($errors->any())
            
                    {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
          
            @endif
            <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
            
                @if ($recommendation->id==1)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalegobierno1" value="{{$scale->valor}}" {{ old('scalegobierno1') == "$scale->valor" ? 'checked' : '' }}> 
            
        </td> 
    @endforeach
         
    </tr>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==2)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalegobierno2" value="{{$scale->valor}}" {{ old('scalegobierno2') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach      
    </tr>  
     
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==3)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalegobierno3" value="{{$scale->valor}}" {{ old('scalegobierno3') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach      
    </tr>
</table>
<br><br>
    <table class="table table-striped container-table">
    <th>Cohesion y Trazabilidad</th>
    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==4)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalecohesionintegrabilidad1" value="{{$scale->valor}}" {{ old('scalecohesionintegrabilidad1') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach

    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==5)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalecohesionintegrabilidad2" value="{{$scale->valor}}" {{ old('scalecohesionintegrabilidad2') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach

    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==6)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalecohesionintegrabilidad3" value="{{$scale->valor}}" {{ old('scalecohesionintegrabilidad3') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach

    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==7)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scalecohesionintegrabilidad4" value="{{$scale->valor}}" {{ old('scalecohesionintegrabilidad4') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach
    </table>

    <br><br>
    <table class="table table-striped container-table">
    <th>Trazabilidad del resultado</th>
    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==8)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaletrazabilidadresultado1" value="{{$scale->valor}}" {{ old('scaletrazabilidadresultado1') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach

    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==9)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaletrazabilidadresultado2" value="{{$scale->valor}}" {{ old('scaletrazabilidadresultado2') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach

    <br>
    <tr>
        <td>
        <br><strong>Recomendacion </strong> <br>
            @foreach ($recommendations as $recommendation)
                @if ($recommendation->id==10)
                    {{$recommendation->recommendation}}
                @endif        
            @endforeach
        </td>
    </tr> 
    @foreach ($scales as $scale)
    <tr>
       
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaletrazabilidadresultado3" value="{{$scale->valor}}" {{ old('scaletrazabilidadresultado3') == "$scale->valor" ? 'checked' : '' }}> 
        </td> 
    @endforeach
    </table>
    <BR></BR>
    <input type="hidden" name="codigoUsuario" value="{{$inscripcion->Codigorandom}}">
    <center>
        <button type="button" class="button-edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Enviar
        </button>
    </center>
    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar evaluacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que desea enviar la evaluacion? Una vez enviada no se podran hacer modificaciones.
      </div>
      <div class="modal-footer">
        <input type="submit" value="Enviar" name="Enviar" class="button-edit">
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>