@extends('template.alumno')


@section('content')

<div class="header"></div>

@include('include.menualumnos')

	<h1 align="center"  id="principal-maestro">Responder actividad</h1>
 
   {!! Form::model($profesor, ['route' => ['editrespuesta', $profesor->id] 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
		
			@include('include.descarga', ['submitButtonText' => 'Subir archivo'])

   {!! Form::close() !!}


@endsection
 