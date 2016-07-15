@extends('template.Maestro')


@section('content')

<div class="header"></div>

@include('include.menucordinador')
	
{!! Form::open(['route' => 'cordinador.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
	@include('cordinador.maestro', ['submitButtonText' => 'Crear maestro'])


{!! Form::close() !!}

@stop