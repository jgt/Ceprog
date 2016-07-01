<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="UTF-8">
  <title>Examen</title>
  <link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>

   <div><img src="img/logo.jpg" id="imgLogo"></div>
   <br><br><br><br><br><br><br><br>
      <h3 align="center"><strong>Evaluación ordinaria</strong></h3>
      <div id="project">
        <div><span>Alumno</span>{{Auth::user()->name}}</div>
        <div><span>Materia</span>{{ $resultado->examen->materia->name}}</div>
        <div><span>Resultado</span>{{$resultado->resultado}}</div>
      </div>
    </header>
    <hr>
    <main></main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  
</body>
</html>