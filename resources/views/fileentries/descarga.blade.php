@extends('template.alumno')


@section('content')

<div class="header"></div>

	<h1 align="center"  id="principal-maestro">Responder actividad {{$actividad->actividad}}</h1>
 	<hr>
   {!! Form::open(['route' => ['descarga', $actividad], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
		
			@include('include.descarga', ['submitButtonText' => 'Subir archivo'])

   {!! Form::close() !!}


@endsection
 
