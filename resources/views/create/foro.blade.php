@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Crear Foro</h1>
	
{!! Form::open(['route' => 'foro.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
	@include('include.foro', ['submitButtonText' => 'Crear foro'])


{!! Form::close() !!}

@stop