<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
  <title>Portal UC</title>
  
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>
<body>

  
  <div class="col-md-12">

      <h2 class="tamaños" id="color-letra" align="center">Centro de Estudios Profesionles del Grijalva</h2>

<h3 id="color-letra" align="center">Ficha de Inscripcion</h3>


<hr>

<h1>Nota</h1>
<p>los campos que estan como selecion multiple se mostraran por numeros empezara del 1 y terminara dependiendo de la cantidad de datos que tenga el selector un ejemplo seria el selector Nivel educativo ese selector tiene 4 datos y se representaria de la siguiente forma</p>
<h3>Nivel Educativo</h3>
<p>Opcion 1 = Bachillerato, Opcion 2 = Licenciatura, Opcion 3 = Maestria, Opcion 4 = Doctorado</p>
<h3>Campus</h3>
<p>Opcion 1 = Palenque, Opcion 2 = San cristobal, Opcion 3 = Tuxtla, Opcion 4 = Reforma</p>

<hr>
    <h4>I.Datos Personales</h4>
    <p>Nombres de Alumno : {{ $Nombre }}</p>
    <p>Nivel Eductivo/Nombre : {{ $Nivel}}</p>
    <p>Semestre : {{ $Semestre }}</p>
    <p>Modalidad : {{ $Modalidad }}</p>
    <p>Campus : {{ $Campus }}</p>
    <p>Enero - Junio : {{ $Fecha }}</p>
  <hr>
     <div class="col-md-12">
    <hr>
    <h4>II.Datos de Direccion</h4>
    <br>
      
      <p>Calle y Numero : {{ $CalleN }}</p>
      <p>Colonia : {{ $Colonia }}</p>
      <p>Municipio : {{ $Municipio }}</p>
       <p>Estado : {{ $Estado }}</p>
      <p>C.P : {{ $CP }}</p>
      <p>Tutor : {{ $Tutor }}</p>
      <p>Tel. de Casa : {{ $TelefonoC }}</p>
      <p>Tel. de Celular : {{ $TelefonoCel }}</p>
      <p>Tel. de Oficina : {{ $TelefonoOfc }}</p>
      <p>Correo : {{ $Correo }}</p>

    </div>
</body>
</html>