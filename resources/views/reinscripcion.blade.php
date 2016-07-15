<!-- 
	
	Esta vista extiende del template app, y se inserta una imagen en el div(header).

	los include que maneja son los siguientes

	*errors(son los errores de validacion del formulario)
	*reinscripcion(los campos del formulario html)


-->


@extends('app')


@section('content')

<div class="header"></div>

@include('include.menudefault')


<h2 class="tamaños" id="color-letra" align="center">Centro de Estudios Profesionales del Grijalva</h2>
<h3 align="center" id="color-letra">Departamento de servicios escolares </h3>
<h3 id="color-letra" align="center">Ficha de RE-INSCRIPCIÓN </h3>

<div class="col-md-12" id="margen-bottom">
	<div class="row datos-personales">

	{!! Form::open(['route' => 'reinscripcion', 'method' => 'post']) !!}
	
	@include('errors.error')
    @include('include.reinscripcion')

  {!! Form::close()!!}

@stop