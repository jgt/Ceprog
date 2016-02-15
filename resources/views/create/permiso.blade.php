@extends('template.Master')


@section('content')

<div class="header-admin"></div>

	@include('include.menuadmin')

	
{!! Form::open(['route' => 'permiso.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
	@include('include.permiso', ['submitButtonText' => 'Crear Permisos'])


{!! Form::close() !!}

@stop