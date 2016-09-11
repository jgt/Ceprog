
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <h1>Reporte Evaluacion Docente</h1>
      <div id="company" class="clearfix">
        <div>Universidad Ceprog</div>
        <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
        <div>+52 (916) 345 3906 </div>
        <div><a href="#">contacto@uceprog.edu.mx</a></div>
      </div>
      <div id="project">
        <div><span>Materia</span>{{$materia->name}}</div>
        <div><span>Carrera</span>{{$materia->semestre->carrera->name}}</div>
        <div><span>Semetre</span>{{$materia->semestre->name}}</div>
        <div><span>Catedratico</span>
        @foreach($materia->users as $user)
          {{$user->name}}
        @endforeach
        </div>
        <div><span>Fecha/Hora</span>{{$fecha}}</div>
      </div>
    </header>
    <main>
      <table>
      <tr>
        <th>RANGOS/PUNTAJE</th>
      </tr>
       @foreach($rangos as $rango)
        <thead>
          <tr>
            <th class="service">{{$rango->name}}</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php $total =0;  ?>
              @foreach($rango->preguntas as $pregunta)
                @if($pregunta->rango_id == $rango->id)
                  @foreach($pregunta->respuestasDocentes as $respuesta)
                      @if($respuesta->estado == 1)
                        <?php $total += $respuesta->valor;?>
                        <td>{{$total}}</td>
                      @endif    
                  @endforeach
                @endif
              @endforeach
          </tr>
        </tbody>
           @endforeach
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>