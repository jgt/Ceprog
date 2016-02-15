@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Crear role</h1>
	
{!! Form::open(['route' => 'role.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
	@include('include.role', ['submitButtonText' => 'Crear role'])


{!! Form::close() !!}

@stop