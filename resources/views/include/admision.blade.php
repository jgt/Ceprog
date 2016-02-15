   <div class="col-xs-3">
     {!! Form::label('Campus', 'Campus: ')!!} <br>
  {!! Form::select('Campus', [ 'Selecionar...', 'Palenque', 'San Cristóbal', 'Tuxtla', 'Reforma'])!!}
  </div>

<div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">I.Datos Generales</h4>
    <br>
    </div>
  <div class="col-xs-2">
    {!! Form::label('ApellidoP', 'Apellido Paterno')!!}
	{!! Form::text('ApellidoP', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-2">
    {!! Form::label('ApellidoM', 'Apellido Materno')!!}
	{!! Form::text('ApellidoM', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-3">
    {!! Form::label('Nombres', 'Nombre(s)')!!}
	{!! Form::text('Nombres', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-1">
     {!! Form::label('Edad', 'Edad')!!}
  {!! Form::text('Edad', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-1">
     {!! Form::label('Sexo', 'Sexo')!!}
  {!! Form::select('Sexo', ['Masculino', 'Femenino'])!!}
  </div>
   <div class="col-xs-2">
    {!! Form::label('FechaN', 'Fecha de Nacimiento')!!}
  {!! Form::date('FechaN', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-3">
  	 {!! Form::label('Curp', 'Curp')!!}
	{!! Form::text('Curp', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">II.DATOS DE DIRECCIÓN</h4>
    <br>
  <div class="col-xs-5">
  	 {!! Form::label('CalleN', 'Calle y Número')!!}
	{!! Form::text('CalleN', null, ['class' => 'form-control'])!!}
  </div>
     <div class="col-xs-2">
    {!! Form::label('Pais', 'País')!!}
  {!! Form::text('Pais', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-3">
     {!! Form::label('Ciudad', 'Ciudad')!!}
  {!! Form::text('Ciudad', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-2">
    {!! Form::label('Estado', 'Estado')!!}
  {!! Form::text('Estado', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
  	 {!! Form::label('TelefonoC', 'Tel. de Casa')!!}
	{!! Form::text('TelefonoC', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
  	 {!! Form::label('TelefonoCel', 'Tel. Celular')!!}
	{!! Form::text('TelefonoCel', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
  	 {!! Form::label('Correo', 'Email')!!}
	{!! Form::text('Correo', null, ['class' => 'form-control'])!!}
  </div>
  </div>
  <div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">III.DATOS DEL PROGRAMA QUE SOLICITA</h4>
      <br>
      <div class="col-xs-4">
     {!! Form::label('Programa', 'Programa')!!} <br>
  {!! Form::select('Programa', [ 'Seleccionar...', 'Bachillerato', 'Lic. en Administración de Empresas', 'Lic. en Administración de Empresas Turísticas', 'Lic. en Arquitectura', 'Lic. en Contaduría Pública', 'Lic. en Derecho', 'Lic. en Informática', 'Lic. en Ingeniería Civil', 'Lic. en Ingeniería Telemática', 'Lic. en Psicología General', 'Mtría. en Administración', 'Mtría. en Ciencias de la Educación', 'Mtría. en Computación con Formación en Base de Datos', 'Mtría. en Derecho Constitucional y Amparo', 'Mtría. en Derecho Penal', 'Mtría. en Finanzas Estratégicas', 'Doctorado en educación con formación en área docente'])!!}
  </div>
   <div class="col-xs-3">
  	 {!! Form::label('Modalidad', 'Modalidad')!!}
	{!! Form::select('Modalidad', [ 'Selecionar...', 'Escolar (Lunes - Viernes)', 'Mixta (Domingos)'])!!}
  </div>
   <div class="col-xs-3">
  	 {!! Form::label('Turno', 'Turno')!!}
	{!! Form::select('Turno', ['Seleccionar...', 'Matutino', 'Vespertino '])!!}
  </div>
   <div class="col-xs-3" >
     {!! Form::label('Periodo', 'Periodo')!!} <br>
  {!! Form::select('Periodo', [ 'Seleccionar...', 'Enero - Junio', 'Febrero - Julio', 'Julio - Diciembre', 'Agosto - Diciembre'])!!}
  </div>
  </div>
  <div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">IV.ANTECEDENTE ACADÉMICO</h4>
    <br>
   <div class="col-xs-4">
  	 {!! Form::label('escuela', 'Escuela de procedencia: ')!!}
	{!! Form::text('escuela', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-2">
  	 {!! Form::label('nivel', 'Nivel Educativo: ')!!}
	{!! Form::select('nivel', ['Selecionar...', 'Bachillerato', 'Licenciatura', 'Maestría', 'Doctorado'])!!}
  </div>
  <div class="col-xs-2">
  	 {!! Form::label('fechaE', 'Fecha de Egreso: ')!!}
	{!! Form::date('fechaE', null, ['class' => 'form-control'])!!}
  </div>
  </div>
  <div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">V.DATOS LABORALES</h4>
    <br>
     <div class="col-xs-3">
     {!! Form::label('nombreEp', 'Nombre de la Empresa: ')!!}
  {!! Form::text('nombreEp', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-5">
     {!! Form::label('CalleEP', 'Calle y Número')!!}
  {!! Form::text('CalleEP', null, ['class' => 'form-control'])!!}
  </div>
    <div class="col-xs-2">
    {!! Form::label('PaisEP', 'País')!!}
  {!! Form::text('PaisEP', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('CiudadEP', 'Ciudad')!!}
  {!! Form::text('CiudadEP', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-2">
    {!! Form::label('EstadoEP', 'Estado')!!}
  {!! Form::text('EstadoEP', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('TelefonoEP', 'Telefono: ')!!}
  {!! Form::text('TelefonoEP', null, ['class' => 'form-control'])!!}
  </div>
    <div class="col-xs-3">
     {!! Form::label('CorreoEP', 'Email')!!}
  {!! Form::text('CorreoEP', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-3">
     {!! Form::label('PuestoTR', 'Puesto')!!}
  {!! Form::text('PuestoTR', null, ['class' => 'form-control'])!!}
  </div>
    <div class="col-xs-3">
     {!! Form::label('OcupacionTR', 'Ocupación')!!}
  {!! Form::text('OcupacionTR', null, ['class' => 'form-control'])!!}
  </div>
  </div>
  <div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">VI.OTROS DATOS</h4>
    <br>
     <div class="col-xs-3">
     {!! Form::label('Civil', 'Estado Civil')!!}
  {!! Form::select('Civil', ['Selecionar...', 'Soltero (a)', 'Casado (a)'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('tutor', 'Tutor')!!}
  {!! Form::text('tutor', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('EdadT', 'Edad')!!}
  {!! Form::text('EdadT', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('Parentesco', 'Parentesco')!!}
  {!! Form::text('Parentesco', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('TelefonoDT', 'Telefono')!!}
  {!! Form::text('TelefonoDT', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('Ocupacion', 'Ocupación')!!}
  {!! Form::text('Ocupacion', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('Enfermedad', 'Padece alguna enfermedad')!!}
  {!! Form::text('Enfermedad', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('MedioTR', 'Porque medio te enteraste de nuestras ofertas educativas')!!}
  {!! Form::select('MedioTR', [ 'Selecionar...', 'Radio', 'Periodico', 'Recomendacion', 'T.V', 'Promocion de Escuela', 'Otro Medio'])!!}
  </div>
   <div class="col-xs-3">
     {!! Form::label('Ceprog', 'Razón por la que seleccionaste a CEPROG para realizar tus estudios')!!}
  {!! Form::select('Ceprog', [ 'Selecionar...', 'Prestigio', 'Acceso', 'Nivel Academico', 'Ubicacion', 'Modalidad de Estudios', 'Costo', 'Otro'])!!}
  </div>
  <div class="col-md-12">
    <hr>
   {!! Form::submit('Enviar Solicitud', ['class' => 'btn btn-success ' ] ) !!}
  </div>
  </div>

