@extends('template.Maestro')


@section('content')

<div class="header"></div>

<h2 class="tamaños" id="color-letra" align="center">Materia : {{$materia->name}}</h2>
<h3 align="center" id="color-letra">Rellena los campos solicitados para crear una actividad</h3>
<hr>
{!! Form::open(['route' => 'profesor.store', 'method' => 'POST', 'class' => 'form-group']) !!}
	
	@include('include.actividad', ['submitButtonText' => 'Siguiente'])


{!! Form::close() !!}

@stop