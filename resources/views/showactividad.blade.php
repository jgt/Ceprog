<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="UTF-8">
  <title>Actividad</title>
  <link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>
      <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <br><br><br><br><br><br><br><br>
     <h1>{{$actividad->actividad}}</h1>
      <div id="project">
        <div><span>Valor de la actividad</span>{{$actividad->valoractividad}}</div>
         <div><span>Codigo de actividad</span>{{ $actividad->codigoactividad}}</div>
        <div><span>Fecha de inicio</span>{{ $actividad->fecha}}</div>
        <div><span>Fecha de entrega</span>{{ $actividad->fechaF}}</div>
      </div>
    </header>
    <main>
      <hr>
      <h3>Descripción</h3>
      <p>{{$actividad->descripcion}}</p>
      <br><br>
      <h3>Objetivos</h3>
      <p>{{$actividad->estrategia}}</p>
      <br><br>
      <h3>Caracteristicas de entrega</h3>
      <p>{{$actividad->caracteristicas}}</p>
      <br><br>
      <h3>Sugerencias de realización</h3>
      <p>{{$actividad->realizacion}}</p>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Este formato es un reporte de la actividad creada.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
</body>
</html>


