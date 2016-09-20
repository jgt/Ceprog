
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte General</title>
    <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <h1>Reporte General</h1>
      <div id="company" class="clearfix">
        <div>Universidad Ceprog</div>
        <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
        <div>+52 (916) 345 3906 </div>
        <div><a href="#">contacto@uceprog.edu.mx</a></div>
      </div>
      <div id="project">
        <div><span>Proyecto</span> Evaluacion docente</div>
        <div><span>Fecha</span>{{$fecha}}</div>
      </div>
    </header>
    <main>
     @foreach($materias as $materia)
     <?php $porcentaje = 0;?>
      @foreach($materia->resultados as $resultado)
        @if($materia->id == $resultado->materia_id)
            <?php $usuarios[] = $resultado;
                  $num = sizeof($usuarios);
             ?>
        @endif
      @endforeach
     <ul>
          <li>{{$materia->name}}</li>
          @foreach($rangos as $rango)
          <?php $total=0; ?>
            <ul>
              <li>{{$rango->name}} =
                
                @foreach($rango->preguntas as $pregunta)
                    @foreach($pregunta->respuestasDocentes as $posResp)
                      @foreach($posResp->respuestasDocentes as $respuesta)
                        @if($materia->id == $respuesta->materia_id && $pregunta->rango_id == $rango->id)
                          <?php $total +=$posResp->valor;?> 
                        @endif
                      @endforeach
                    @endforeach
                @endforeach
                {{$total}}
                <?php $porcentaje += $total; ?>
              </li>
            </ul>
          @endforeach
           <li style="list-style-type:none">Porcentaje = {{number_format($porcentaje/$num,1)}}%</li>
           <hr>
     </ul>
     @endforeach 
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Este formato es un reporte General de la evaluacion al docente.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  </body>
</html>