@extends('app')


@section('content')

<div class="header"></div>

@include('include.menudefault')


<h3 class="tamaños" id="color-letra" align="center">Centro de Estudios Profesionales del Grijalva</h3>
<h4 id="color-letra" align="center">Área de Difusión y Admisión</h4>

<h1 id="color-letra" align="center">Solicitud de Admisión Online</h1>

<hr>

<div class="col-md-12" id="margen-bottom">
	<div class="row datos-personales">

	{!! Form::open(['route' => 'enviar', 'method' => 'post']) !!}
	
	@include('errors.error')
    @include('include.admision')

  {!! Form::close()!!}

@stop



