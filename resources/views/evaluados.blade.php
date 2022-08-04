<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('premionacional.png')}}">
    <title>Premio Calidad</title>
    <header>   
    <nav class="navbar navbar-expand-xxl navbar-light bg-light"> <a class="navbar-brand" href="https://premiocalidadaps.com.co/"><img src="{{asset('logominisalud.png')}}" alt=""></a>       
           
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
    <br>
<center><h1 style="color: #009FE3">Evaluados</h1></center>
            @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<h6 class="error">:message</h6>')) !!}
                    </div>
            @endif
          <br>  
        @foreach ($evaluados as $rf)
        <div style="overflow-x:auto;">
          <table class="table table-striped container-table tabla-resp"> 
              <tr class="evaluados">
                  <th>Codigo inscripción: {{$rf->User}}</th> 
                  <th>IPS: {{$rf->ips}}</th>                                             
                  <th>Evaluador: {{$rf->Usuario}}</th>
                  <th>Fecha evaluado: </th>   
                  <th>{{$rf->updated_at}}</th>
                  <th></th>
                  
              </tr>            
              <tr class="evaluados">
                  <th>Resultados claves</th>
                  <th>Atención en salud materno perinatal</th>
                  <th>Detección temprana de enfermedades cardiovasculares</th>
                  <th>Detección temprana de cáncer</th>
                  <th>Integración del enfoque diferencial en la atencion del prestador</th>
                  <th>Total</th>
              </tr>
                        
               
                <tr class="evaluados-td">                
                    <th>Estrutura</th>
                    <td>{{$rf->porcentaje_estructura_perinatal}}%</td>
                    <td>{{$rf->porcentaje_estructura_cardio}}%</td>
                    <td>{{$rf->porcentaje_estructura_cancer}}%</td>
                    <td>{{$rf->porcentaje_estructura_enfoque}}%</td>
                    <td>{{$rf->PorcentajeEstructura}}%</td>
                  
                </tr>
                <tr class="evaluados-td">
                    <th>Proceso</th>
                    <td>{{$rf->porcentaje_proceso_perinatal}}%</td>
                    <td>{{$rf->porcentaje_proceso_cardio}}%</td>
                    <td>{{$rf->porcentaje_proceso_cancer}}%</td>
                    <td>{{$rf->porcentaje_proceso_enfoque}}%</td>
                    <td>{{$rf->PorcentajeProceso}}%</td>
                </tr> 
                <tr class="evaluados-td">
                    <th>Resultado</th>
                    <td>{{$rf->porcentaje_resultado_perinatal}}%</td>
                    <td>{{$rf->porcentaje_resultado_cardio}}%</td>
                    <td>{{$rf->porcentaje_resultado_cancer}}%</td>
                    <td>{{$rf->porcentaje_resultado_enfoque}}%</td>
                    <td>{{$rf->PorcentajeResultado}}%</td>
                </tr> 
                <tr class="evaluados-t">                                   
                        <th>Total %</th>
                            <td>{{$rf->porcentaje_perinatal}}%</td>
                            <td>{{$rf->porcentaje_cardio}}%</td>  
                            <td>{{$rf->porcentaje_cancer}}%</td>  
                            <td>{{$rf->porcentaje_enfoque}}%</td>     
                            <td>{{$rf->PorcentajeTotal}}%</td> 
                        </div>
                           
                </tr>             
               
          </table>
          <br>
          
        </div>
        <div class="container-fluid">       
                <canvas id="myChart{{$rf->User}}"></canvas>         
        </div>
        
    
    @foreach ($mejorResult as $mr)
    @foreach ($promedio as $pro)
              
        <script>
            const labels{{$rf->User}} = [
                'Atencion en salud Materno perinatal',
                'Deteccion de Cancer',
                'Deteccion temprana de enfermedades Cardiovasculares',
                'Enfoque diferencial del prestador',
            ];

            const data{{$rf->User}}= {
                labels: labels{{$rf->User}},
                datasets: [{
                label: 'Resultado Inscripcion {{$rf->User}}',
                borderColor: 'rgb(255, 99, 132)',
                data: [{{$rf->porcentaje_perinatal}}, {{$rf->porcentaje_cancer}}, {{$rf->porcentaje_cardio}}, {{$rf->porcentaje_enfoque}}],               
                },{
                    label: 'Mejor Resultado',
                    borderColor: '#00A6FF',
                    data: [{{$mr->porcentaje_perinatal}}, {{$mr->porcentaje_cancer}}, {{$mr->porcentaje_cardio}}, {{$mr->porcentaje_enfoque}}],
                },{
                    label: 'Promedio Resultados',
                    borderColor: '#00A655',
                    data: [{{$pro->porcentaje_perinatal}}, {{$pro->porcentaje_cancer}}, {{$pro->porcentaje_cardio}}, {{$pro->porcentaje_enfoque}}],
                }]
            };

            const config{{$rf->User}} = {
                type: 'radar',
                data: data{{$rf->User}},
                options: {
                    responsive:true, 
                    scales: {
                    r: {
                        angleLines: {
                            display: false
                        },
                        suggestedMin: 0,
                        suggestedMax: 25
                    }
                }
                },
            };
            
            const myChart{{$rf->User}}= new Chart(
                document.getElementById('myChart{{$rf->User}}'),
                config{{$rf->User}}
            );

        </script> 
        @endforeach 
         @endforeach     
     @endforeach
     
</body>


</html>