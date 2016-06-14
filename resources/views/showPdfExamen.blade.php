<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="UTF-8">
  <title>Examen</title>
  <link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>

   <div id="logo">
        <img src="img/ceprog.png">
      </div>
      <h1>Univesidad Ceprog</h1>
      <div id="project">
        <div><span>Maestro: </span>{{$examen->catedratico}}</div>
        <div><span>Modulo: </span>{{ $examen->modulo}}</div>
        <div><span>Fecha de inicio: </span>{{$examen->fecha}}</div>
        <div><span>Fecha final: </span>{{$examen->fechaF}}</div>
        <div><span>Nota: </span>0 es incorrecta y 1 es correcta</div>
      </div>
    </header>
    <hr>
    <main>
      
      @foreach($examen->preguntas as $pregunta)
          
          <p>{{$pregunta->contenido}} - (Valor de la pregunta {{$pregunta->valor}})</p>

          @foreach($pregunta->respuestas as $respuesta)
              
              <ul><li>{{$respuesta->name}} - {{$respuesta->estado}}</li></ul>

          @endforeach

      @endforeach


      <div id="notices">
        <div class="notice"></div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  
</body>
</html>