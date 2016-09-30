<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de alumno</title>
   <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo_10A_FullColor.png">
      </div>
      <h1>Reporte de Encuesta</h1>
      <div id="company" class="clearfix">
        <div>Universidad Ceprog</div>
        <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
        <div>+52 (916) 345 3906 </div>
        <div><a href="#">contacto@uceprog.edu.mx</a></div>
      </div>
      <div id="project">
        <div><span>Proyecto</span> Evaluacion docente</div>
        <div><span>Alumno</span>{{$user->name}}</div>
        <div><span>Nombre</span>
        @foreach($materia->users as $user)
          {{$user->name}},
        @endforeach
        </div>
        <div><span>Materia</span>{{$materia->name}}</div>
        <div><span>Semestre</span>{{$materia->semestre->name}}</div>
        <div><span>Carrera</span>{{$materia->semestre->carrera->name}}</div>
        <div><span>Fecha</span>{{$fecha}}</div>
        @foreach($materia->examenesDocente as $examen)
        <div><span>Nombre</span>{{$examen->name}}</div>
        <div><span>Ciudad</span>{{$examen->ciudad}}</div>
        <div><span>Modalidad</span>{{$examen->modalidad}}</div>
        <div><span>Modulo</span>{{$examen->modulo}}</div>
        @endforeach
      </div>
    </header>
    <main>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Imprime este reporte.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  </body>
</html>