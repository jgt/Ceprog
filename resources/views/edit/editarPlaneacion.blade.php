@extends('template.Maestro')


@section('content')

<div class="header"></div>

<h2 class="tamaños" id="color-letra" align="center">Centro de Estudios Profesionales del Grijalva</h2>
<h3 align="center" id="color-letra">Campus Palenque </h3>
	

{!! Form::model($planeacion, ['route' => ['updateplan', $planeacion->id], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
		@include('errors.error')
	@include('editplan', ['submitButtonText' => 'Editar planeacion'])

{!! Form::close() !!}

@stop