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
      <h2>Descripción</h2>
      <p>{{$actividad->descripcion}}</p>
      <br><br>
      <h2>Objetivos</h2>
      <p>{{$actividad->estrategia}}</p>
      <br><br>
      <h2>Caracteristicas de entrega</h2>
      <p>{{$actividad->caracteristicas}}</p>
      <br><br>
      <h2>Sugerencias de realización</h2>
      <p>{{$actividad->realizacion}}</p>
      <br><br>
      <h2>Rubricas/Material</h2>
      <hr>
      @foreach($actividad->rubricas as $rubrica)
  
          <ul><strong><li>{{$rubrica->name}} - {{$rubrica->descripcion}}</strong></li></ul>  

      @endforeach
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
</body>
</html>


