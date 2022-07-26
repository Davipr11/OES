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
    <title>Evaluados</title>
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
<center><h1 style="color: #009FE3">Evaluados</h1></center>
        @foreach ($evaluados as $rf)
        <div style="overflow-x:auto;">
          <table class="table table-striped container-table tabla-respo"> 
              <tr class="evaluados">
                  <th>Evaluacion inscripcion</th>
                  <th>{{$rf->User}}</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
              </tr>            
              <tr class="evaluados">
                  <th>Resultados claves</th>
                  <th>Atencion en salud materno perinatal</th>
                  <th>Deteccion temprana de enfermedades cardiovasculares</th>
                  <th>Deteccion temprana de cancer</th>
                  <th>Integracion del enfoque diferencial en la atencion del prestador</th>
                  <th>Total</th>
              </tr>
                        
               
                <tr>
                    <th>Estrutura</th>
                    <td>{{round($rf->porcentaje_estructura_perinatal,2)}}%</td>
                    <td>{{round($rf->porcentaje_estructura_cardio,2)}}%</td>
                    <td>{{round($rf->porcentaje_estructura_cancer,2)}}%</td>
                    <td>{{round($rf->porcentaje_estructura_enfoque,2)}}%</td>
                    <td>{{round($rf->PorcenajeEstructura,2)}}%</td>
                </tr>
                <tr>
                    <th>Proceso</th>
                    <td>{{round($rf->porcentaje_proceso_perinatal,2)}}%</td>
                    <td>{{round($rf->porcentaje_proceso_cardio,2)}}%</td>
                    <td>{{round($rf->porcentaje_proceso_cancer,2)}}%</td>
                    <td>{{round($rf->porcentaje_proceso_enfoque,2)}}%</td>
                    <td>{{round($rf->PorcenajeProceso,2)}}%</td>
                </tr> 
                <tr>
                    <th>Resultado</th>
                    <td>{{round($rf->porcentaje_resultado_perinatal,2)}}%</td>
                    <td>{{round($rf->porcentaje_resultado_cardio,2)}}%</td>
                    <td>{{round($rf->porcentaje_resultado_cancer,2)}}%</td>
                    <td>{{round($rf->porcentaje_resultado_enfoque,2)}}%</td>
                    <td>{{round($rf->PorcenajeResultado,2)}}%</td>
                </tr> 
                <tr class="evaluados"> 
                                    
                        <th>Total %</th>
                        <td>{{round($rf->porcentaje_perinatal,2)}}%</td>
                        <td>{{round($rf->porcentaje_cardio,2)}}%</td>  
                        <td>{{round($rf->porcentaje_cancer,2)}}%</td>  
                        <td>{{round($rf->porcentaje_enfoque,2)}}%</td>     
                        <td>{{round($rf->PorcenajeTotal,2)}}%</td>    
                </tr>             
               
          </table>
          <br><br><br><br>
        </div>
     @endforeach

</body>
</html>