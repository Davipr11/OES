<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <title>Premio calidad</title>
    <header>   
    <nav class="navbar navbar-expand-xxl navbar-light bg-light"> <a class="navbar-brand" href="https://premiocalidadaps.com.co/"><img src="{{asset('logominisalud.png')}}" alt=""></a>       
           
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white" onclick="history.back()">
                    Atras        
                </button>
                </li>
                @if (auth()->user()->Tipo_Usuario==1)
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/register">Crear Usuario</a>
            </button>
                </li>
                @endif
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/cambiocontrasena">Cambiar contraseña</a>
                </button>
                </li>
                
                @if (auth()->user()->Tipo_Usuario==1)
                <li class="nav-item mx-2 py-2 ">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consulta/show">Usuarios</a>
            </button>
                </li>
                @endif
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_Nacional_OES/Evaluadores/consultaInscripcion">Inscripciones</a>
            </button>
                </li>
                @if (auth()->user()->Tipo_Usuario==1)
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/respuesta">Preguntas</a>
                </button>
                </li> 
                @endif
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
                <a href="https://app.premiocalidadaps.com.co/Premio_nacional_OES/Evaluadores/evaluados">Evaluados</a>
                </button>
                </li> 
                @auth
                <li class="nav-item mx-2 py-2">
                <button type="button" class="btn-an" style="background-color:#006799; color:white ">
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
<body>
        <center>
            <h1 style="color: #009FE3">Evaluación de la inscripción {{$inscripcion->Codigorandom}}</h1>
        </center>
    
    
    <form action="{{url('Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$inscripcion->id.'/evaluacion')}}" method="post">
    @csrf
    <table class="table table-striped container-table table-resp">   
            <th class="table-eva">Evaluación atención en salud materno perinatal</th>
            <th></th>    
            <br>
            <tr>
                <td>
                Definir, ordenar e integrar las acciones y las intervenciones colectivas e individuales de la Ruta Integral de Atención en Salud Materno Perinatal,
                en el marco de la estrategia de APS, en donde las instituciones logren demostrar una implementación del 70% de las acciones de gestión y las
                intervenciones individuales dirigidas a las gestantes y recién nacidos a su cargo, de acuerdo con lo definido en la Ruta Integral de Atención
                en Salud Materno - Perinatal. Resolución 3280 de 2018, e impacto en los resultados de salud, haciendo énfasis en los resultados que inciden
                en la salud materno perinatal, garantizando los derechos sexuales y reproductivos de mujeres y hombres. 

                </td>
                <td></td>
            </tr>
            <tr>      
                    <th class="table-eva">ESTRUCTURA</th>
                    <th></th>
                    
            </tr>      
    <tr>
        <th>Recomendacion</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    @if($errors->any())
                    
                            {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
                
                    @endif
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==1)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
            <td></td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==1)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
             <td></td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==1)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalEstructura1" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->estructura == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalEstructura1') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br><br><br>
    <table class="table table-striped container-table table-resp">
    <br>
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==2)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==2)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==2)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalEstructura2" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->estructura2 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalEstructura2') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br>
    <BR></BR>
    <table class="table table-striped container-table table-resp">   
            <th class="table-eva">Evaluación atención en salud materno perinatal</th>
            <th></th>    
            <br>
            
            <tr>      
                    <th class="table-eva">PROCESO</th>
                    <th></th>
                    
            </tr>      
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==3)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==3)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==3)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalproceso3" value="{{$scale->valor}}"  @foreach ($is as $i) {{ $i->proceso == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalproceso3') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    
    <br>
    <BR></BR>
    <table class="table table-striped container-table table-resp">   
            
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==4)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==4)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==4)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalproceso4" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->proceso2 == "$scale->valor" ? 'checked' : ''}}  @endforeach  {{ old('scaleperinatalproceso4') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    
    <br>
    <BR></BR>

    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                   
                   
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==5)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==5)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==5)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalproceso5" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->proceso3 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalproceso5') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    
    <br>
    <BR></BR>

    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==6)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==6)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==6)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalproceso6" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->proceso4 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalproceso6') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    
    <br>
    <BR></BR>

    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==7)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==7)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==7)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalproceso7" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->proceso5 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalproceso7') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    
    <br>
    <BR></BR>


    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==8)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==8)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==8)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalproceso8" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->proceso6 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalproceso8') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    
    <br>
    <BR></BR>

    <table class="table table-striped container-table table-resp">   
            <th class="table-eva">Evaluación atención en salud materno perinatal</th>  
            <th></th>  
            <br>
            
            <tr>      
                    <th class="table-eva">RESULTADO</th>
                    <th></th>
                    
            </tr>      
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                  
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==9)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==9)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==9)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalResultado9" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->resultado == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalResultado9') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br><br><br>

    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                   
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==10)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==10)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==10)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalResultado10" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->resultado2 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalResultado10') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br><br><br>













    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==11)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==11)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==11)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalResultado11" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->resultado3 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalResultado11') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br><br><br>
    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th> 
        <th></th>
    </tr>
    <tr>
            <td>
                    
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==12)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==12)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==12)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalResultado12" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->resultado4 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalResultado12') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br><br><br>
    <table class="table table-striped container-table table-resp">     
            <br>   
    <tr>
        <th>Recomendación</th>
        <th></th> 
    </tr>
    <tr>
            <td>
                    
                    @foreach ($recommendations as $recommendation)
                            
                            @if ($recommendation->id==13)
                                &bull;{{$recommendation->recommendation}}
                            @endif                                          
                    @endforeach           
            </td>
    </tr>
    <tr>
        <th>Criterios</th>
        <th></th>
    </tr>
    <tr>    
            <td>           
                @foreach ($rules as $rule)                     
                    @if ($rule->recommendation==13)                  
                            -{{$rule->rule}} <br><br>                   
                    @endif                   
                @endforeach 
             </td>
    </tr>

    <tr>
        <th>
           Evaluación
        </th>
        <th></th>
    </tr>
     @foreach ($scales as $scale)
    <tr> 
       @if ($scale->recommendation==13)
        <td> 
            {{$scale->scale}}
        </td>
        <td>
            <input type="radio" name="scaleperinatalResultado13" value="{{$scale->valor}}" @foreach ($is as $i) {{ $i->resultado5 == "$scale->valor" ? 'checked' : ''}}  @endforeach {{ old('scaleperinatalResultado13') == "$scale->valor" ? 'checked' : '' }}> 
        </td>
       @endif
         
    @endforeach 
</tr>   
    </table>
    <br><br><br>
    <input type="hidden" name="codigoUsuario" value="{{$inscripcion->Codigorandom}}">
    <input type="hidden" name="category" value="1">
    <center>
        <button type="button" class="button-edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Enviar y guardar
        </button>
        <button type="button" class="button-edit" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            Salvar
        </button>
    </center>
    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar evaluación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que desea enviar la evaluación?
        Una vez enviada no se podrán hacer modificaciones.
      </div>
      <div class="modal-footer">
        <input type="submit" value="Enviar y guardar" name="Enviar" class="button-edit" formaction="{{url('Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$inscripcion->id.'/evaluacion')}}">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salvar evaluación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que desea salvar la evaluación?
      </div>
      <div class="modal-footer">
      <input type="submit" value="salvar" class="button-edit" name="Enviar" formaction="{{url('Premio_nacional_OES/Evaluadores/consultaInscripcion/'.$inscripcion->id.'/salvarevaluacionperinatal')}}">
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>