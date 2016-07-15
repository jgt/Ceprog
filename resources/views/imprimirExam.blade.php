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
        <h2 align="right"><strong>Clave: </strong>07PSU0088B</h2>
      </div>
      <br><br><br><br><br><br><br><br>
      <h1 align="center"><strong>Evaluación ordinaria</strong></h1>
      <br><br>
      <div id="project">
        <div><span>Materia: </span>{{$examen->materia->name}}</div>
        <div><span>Modalidad: </span>{{$examen->modalidad}}</div>
        <div><span>Semestre: </span>{{$examen->materia->semestre->name}}</div>
        <div><span>Fecha de inicio: </span>{{$examen->fecha}}</div>
        <div><span>Catedratico: </span>{{$examen->catedratico}}</div>
        <div><span>Modulo: </span>{{ $examen->modulo}}</div>
       <br>
        <div><strong>Alumno:______________________________________ </strong></div>
        <br>
        <div><strong>Instrucción: </strong> Selecciona el inciso que contenga la respuesta correcta.</div>
      </div>
    </header>
    <hr>
    <main>
      <ol id="olNumeros">
      @foreach($examen->preguntas as $pregunta)
          
          <li><p>{{$pregunta->contenido}}</p></li>
       

         <ol id="olLetras">
          @foreach($pregunta->respuestas as $respuesta)
              
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