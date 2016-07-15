@extends('template.Maestro')


@section('content')

<div class="header"></div>

<h2 class="tamaños" id="color-letra" align="center">Centro de Estudios Profesionales del Grijalva</h2>
<h3 align="center" id="color-letra">Campus Palenque </h3>
	

{!! Form::open(['route' => 'planeacion', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
		@include('errors.error')
	@include('include.planeacion', ['submitButtonText' => 'Crear planeacion'])

{!! Form::close() !!}

@stop