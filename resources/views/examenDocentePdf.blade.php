<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example Docente</title>
     <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <h1>Examen Docente</h1>
      <div id="company" class="clearfix">
         <div>Universidad Ceprog</div>
        <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
        <div>+52 (916) 345 3906 </div>
        <div><a href="#">contacto@uceprog.edu.mx</a></div>
      </div>
      <div id="project">
        <div><span>Materia:</span>
        @foreach($examen->materias as $materia)
        {{$materia->name}},
        @endforeach
        </div>
        <div><span>Catedratico</span>
          @foreach($examen->materias as $materia)
            @foreach($materia->users as $user)
              {{$user->name}},
            @endforeach
          @endforeach
        </div>
        <div><span>Modalidad</span>{{$examen->modalidad}}</div>
        <div><span>Semestre</span>
          @foreach($examen->materias as $materia)
            {{$materia->semestre->name}}
          @endforeach
        </div>
        <div><span>Modulo</span>{{$examen->modulo}}</div>
        <div><span>Fecha</span>{{$fecha}}</div>
      </div>
    </header>
    <main>
    <hr>
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
        <div>NOTICE:</div>
        <div class="notice">Este formato es un reporte de la creacion del examen docente.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  </body>
</html>