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

<h1>Nota</h1>
<p>las opciones 1, 2 y 3 es la respuesta del campus que eligio el estudiante asi como tambien las secciones como: cual es
tu aficion, ha obtenido reconocimientos academicos, porque medio te enteraste, porque razon selecionas ceprog</p>
<ul>
  <h3>Campus</h3>
  <li>Opcion 1 = Palenque</li>
  <li>Opcion 2 = Sancristobal</li>
  <li>Opcion 3 = Tuxtla</li>
  <li>Opcion 4 = Reforma</li>
</ul>

<ul>
  <h3>Porque medio te enteraste</h3>
  <li>Opcion 1 = Radio</li>
  <li>Opcion 2 = Periodico</li>
  <li>Opcion 3 = Recomendaciones</li>
  <li>Opcion 4 = T.V</li>
  <li>Opcion 5 = Promocion de Escuela</li>
  <li>Opcion 6 = Otro medio</li>
</ul>

<ul>
  <h3>Porque razon selecionas ceprog</h3>
  <li>Opcion 1 = Prestigio</li>
  <li>Opcion 2 = Acceso</li>
  <li>Opcion 3 = Nivel academico</li>
  <li>Opcion 4 = Ubicacion</li>
  <li>Opcion 5 = Modalidad de estudios</li>
  <li>Opcion 6 = Costo</li>
  <li>Opcion 7 = Otro</li>
</ul>

 <h3 class="tamaños" id="color-letra" align="center">Centro de Estudios Profesionles del Grijalva</h3>
    <h4 id="color-letra" align="center">Area de Difuncion y Admision</h4>

<h1 id="color-letra" align="center">Solicitud de Admision Online</h1>

<hr>
    <p>Campus : {{ $Campus }}</p>
    <p>Apellido Paterno : {{ $ApellidoP }}</p>
    <p>Apellido Materno: {{ $ApellidoM }}</p>
    <p>Nombres : {{ $Nombres }}</p>
    <p>Fecha de Nacimiento : {{ $FechaN }}</p>
    <p>Sexo : {{ $Sexo }}</p>
    <p>Edad : {{ $Edad }}</p>
    <p>Curp : {{ $Curp }}</p>

    <hr>
     <div class="col-md-12">
    <hr>
    <h4>II.Datos de Direccion</h4>
    <br>
      
      <p>Calle y Numero : {{ $CalleN }}</p>
      <p>Pais : {{ $Pais }}</p>
      <p>Estado : {{ $Estado }}</p>
      <p>Ciudad : {{ $Ciudad }}</p>
      <p>Tel. de Casa : {{ $TelefonoC }}</p>
      <p>Tel. de Celular : {{ $TelefonoCel }}</p>
      <p>Correo : {{ $Correo }}</p>

    </div>

     <div class="col-md-12">
    <hr>
    <h4>III.DATOS DEL PROGRAMA QUE SOLICITA</h4>
      <br>

        <p>Programa : {{ $Programa }}</p>
        <p>Modalidad : {{ $Modalidad }}</p>
        <p>Turno : {{ $Turno }}</p>
        <p>Periodo: {{ $Periodo }}</p>

    </div>

    <div class="col-md-12">
    <hr>
    <h4>IV.ANTECEDENTE ACADÉMICO</h4>
    <br>

    <p>Escuela : {{ $escuela }}</p>
    <p>Nivel Educativo : {{ $nivel }}</p>
    <p>Fecha de Egreso : {{ $fechaE }}</p>

  </div>

   <div class="col-md-12">
    <hr>
    <h4>V.DATOS LABORALES</h4>
    <br>

    <p>Nombre de la Empresa: {{ $nombreEp }}</p>
    <p>Calle y Numero : {{ $CalleEP }}</p>
    <p>Pais : {{ $PaisEP }}</p>
    <p>Estado : {{ $EstadoEP }}</p>
    <p>Ciudad : {{ $CiudadEP }}</p>
    <p>Telefono : {{ $TelefonoEP }}</p>
    <p>Correo : {{ $Correo }}</p>
    <p>Puesto : {{ $PuestoTR }}</p>
    <p>Ocupacion : {{ $OcupacionTR }}</p>

  </div>

  <div class="col-md-12">
    <hr>
    <h4>VI.Actividades Laborales</h4>
    <br>
  
    <p>Estado Civil: {{ $Civil }}</p>
    <p>Tutor : {{ $tutor }}</p>
    <p>Edad : {{ $EdadT }}</p>
    <p>Parentesco : {{ $Parentesco }}</p>
    <p>Telefono : {{ $TelefonoDT }}</p>
    <p>Ocupacion : {{ $Ocupacion }} </p>
    <p>Enfermedad : {{ $Enfermedad }} </p>
    <p>Porque medio te enteraste de nuestras ofertas educativas : {{ $MedioTR }}</p>
    <p>Razón por la que seleccionaste a CEPROG para realizar tus estudios : {{ $Ceprog }}</p>

  </div>
  </div> 
</body>
</html>