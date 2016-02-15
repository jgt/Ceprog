<hr>
<div class="col-md-12" id="palenque">
      {!! Form::label('Campus', 'Campus : ')!!} 
       {!! Form::select('Campus', [ 'Seleccionar...', 'Palenque', 'San cristobal', 'Tuxtla', 'Reforma'])!!}
  </div> 
<div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">I.Datos Generales</h4>
      <br>
 <div class="col-xs-5" id="reinscripcion">
    {!! Form::label('Nombre', 'Nombre Completo')!!}
	{!! Form::text('Nombre', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-2" id="select">
     {!! Form::label('Nivel', 'Nivel Educativo')!!} <br>
  {!! Form::select('Nivel', [ 'Seleccionar...', 'Bachillerato', 'Licenciatura', 'Maestría', 'Doctorado'])!!}
  </div>
  <div class="col-xs-4" id="select">
     {!! Form::label('Programa', 'Programa')!!} <br>
  {!! Form::select('Programa', [ 'Seleccionar...', 'Bachillerato', 'Lic. en Administración de Empresas', 'Lic. en Administración de Empresas Turísticas', 'Lic. en Arquitectura', 'Lic. en Contaduría Pública', 'Lic. en Derecho', 'Lic. en Informática', 'Lic. en Ingeniería Civil', 'Lic. en Ingeniería Telemática', 'Lic. en Psicología General', 'Mtría. en Administración', 'Mtría. en Ciencias de la Educación', 'Mtría. en Computación con Formación en Base de Datos', 'Mtría. en Derecho Constitucional y Amparo', 'Mtría. en Derecho Penal', 'Mtría. en Finanzas Estratégicas', 'Doctorado en educación con formación en área docente'])!!}
  </div>
    <div class="col-xs-2" id="select">
     {!! Form::label('Semestre', 'Semestre')!!} <br>
  {!! Form::select('Semestre', [ 'Seleccionar...', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'])!!}
  </div>   
   <div class="col-xs-1" id="select">
     {!! Form::label('Modalidad', 'Modalidad')!!} <br>
  {!! Form::select('Modalidad', [ 'Seleccionar...', 'Escolarizado', 'Semiescolarizado'])!!}
  </div>   
   <div class="col-xs-2" id="select-menu">
     {!! Form::label('Fecha', 'Periodo')!!} <br>
  {!! Form::select('Fecha', [ 'Seleccionar...', 'Enero - Junio', 'Febrero - Julio', 'Julio - Diciembre', 'Agosto - Diciembre'])!!}
  </div>
  </div>
  </div>
    <hr>
    <h4 class="titulo-reinscripcion">II.Datos de Contacto</h4>
    <br>
  <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('CalleN', 'Calle y Número')!!}
  {!! Form::text('CalleN', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('Colonia', 'Colonia')!!}
  {!! Form::text('Colonia', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('Municipio', 'Municipio')!!}
  {!! Form::text('Municipio', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('Estado', 'Estado')!!}
  {!! Form::text('Estado', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-5"id="reinscripcion">
     {!! Form::label('CP', 'C.P')!!}
  {!! Form::text('CP', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('TelefonoC', 'Tel. de Casa')!!}
  {!! Form::text('TelefonoC', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('TelefonoCel', 'Tel. Celular')!!}
  {!! Form::text('TelefonoCel', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-5" id="reinscripcion">
     {!! Form::label('TelefonoOfc', 'Tel. Oficina')!!}
  {!! Form::text('TelefonoOfc', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-5"id="reinscripcion">
     {!! Form::label('Correo', 'Correo Electrónico')!!}
  {!! Form::text('Correo', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-5" id="select">
     {!! Form::label('Tutor', 'Tutor Académico')!!} <br>
  {!! Form::select('Tutor', [ 'Seleccionar...', 'Lic. Diana Carolina Díaz Antonio', 'Lic. Guadalupe Latournerie Rodríguez', 'Lic. María las Nieves López Barragán', 'Lic. Laura Patricia Gómez Díaz', 'Lic. Jorge Alberto Vargas Juárez'])!!}
  </div>
  <div class="col-md-12" id="reinscripcion">
    <hr>
  {!! Form::submit('Enviar Solicitud', ['class' => 'btn btn-success ' ] ) !!}
  </div>
