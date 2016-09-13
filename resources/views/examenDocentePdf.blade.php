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
        <img src="img/logo.jpg">
      </div>
      <br><br><br><br><br><br><br><br>
      <h3 align="center"><strong>Evaluación ordinaria</strong></h3>
      <div id="project">
      	<div><span>Materias:</span></div>
        @foreach ($examen->materias as $materia)
        	{{$materia->name}},
        @endforeach
        <hr>
        <div><span>Modalidad: </span>{{$examen->modalidad}}</div>
        <hr>
        <div><span>Semestres: </span></div>
        @foreach ($examen->materias as $materia)
        	{{$materia->semestre->name}},
        @endforeach
        <hr>
        <div><span>Fecha: </span>{{$fecha}}</div>
        <hr>
        <div><span>Catedratico: </span></div>
        @foreach ($examen->materias as $materia)
        	@foreach ($materia->users as $user)
        		{{$user->name}},
        	@endforeach
        @endforeach
        <hr>
        <div><span>Modulo: </span>{{ $examen->modulo}}</div>
        <hr>
        <div><strong>Instrucción: </strong> Selecciona el inciso que contenga la respuesta correcta.</div>
      </div>
    </header>
    <hr>
    <main>
      <ol class="olNumeros">
      @foreach($examen->preguntas as $pregunta)
          
          <li><p>{{$pregunta->contenido}}</p></li>
       

         <ol class="olLetras">
          @foreach($pregunta->respuestasDocentes as $respuesta)
              
             <li>{{$respuesta->name}}</li>

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