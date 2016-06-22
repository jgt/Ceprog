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
        <img src="img/logo.png">
        <h2 align="right"><strong>{{$examen->materia->creditos}}</strong></h2>
      </div>
      <h1 align="center"><strong>Campus Palenque</strong></h1>
      <h3 align="center"><strong>Evaluación ordinaria</strong></h3>
      <div id="project">
        <div><span>Materia: </span>{{$examen->materia->name}}</div>
        <div><span>Modalidad: </span>{{$examen->modalidad}}</div>
        <div><span>Semestre: </span>{{$examen->materia->semestre->name}}</div>
        <div><span>Fecha de inicio: </span>{{$examen->fecha}}</div>
        <div><span>Catedratico: </span>{{$examen->catedratico}}</div>
        <div><span>Modulo: </span>{{ $examen->modulo}}</div>
        <div><span>Nota: </span>0 es incorrecta y 1 es correcta</div>
      </div>
    </header>
    <hr>
    <main>
      <ol id="olNumeros">
      @foreach($examen->preguntas as $pregunta)
          
          <li><p>{{$pregunta->contenido}} - (Valor de la pregunta {{$pregunta->valor}})</p></li>
       

         <ol id="olLetras">
          @foreach($pregunta->respuestas as $respuesta)
              
             <li>{{$respuesta->name}} - {{$respuesta->estado}}</li>

          @endforeach
          </ol>
      @endforeach
      </ol>
      <div id="notices">
        <div class="notice"></div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  
</body>
</html>