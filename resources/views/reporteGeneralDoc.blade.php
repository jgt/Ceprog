
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
        <img src="img/logo_10A_FullColor.png">
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
      <table>
        <thead>
          <tr>
            <th class="service">Materias</th>
             @foreach($rangos as $rango)
              <th class="desc">{{$rango->name}}</th>
              <?php  $rngs[] = $rango;?>
              @endforeach
              <th>Porcentaje</th>
          </tr>
        </thead>
        <tbody>
           @foreach($materias as $materia)
            <?php $porcentaje = 0;?>
               <tr>
                 <td class="service">{{$materia->name}}</td>
                 @foreach($rngs as $rango)
                  <?php $total=0; ?>
                    @foreach($rango->preguntas as $pregunta)
                      @foreach($pregunta->respuestasDocentes as $posResp)
                        @foreach($posResp->respuestasDocentes as $respuesta)
                            @if($materia->id == $respuesta->materia_id && $pregunta->rango_id == $rango->id)

                            <?php $total +=$posResp->valor;?>
                                
                            @endif
                        @endforeach
                      @endforeach
                    @endforeach
                    <td class="service">{{$total}}</td>
                    <?php $porcentaje += $total; ?>
                 @endforeach
                  <td class="service">{{$porcentaje}}</td>
               </tr>
            @endforeach 
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
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