@extends('template.Maestro')


@section('content')


<h1 align="center"  id="principal-maestro">Crear usuario</h1>
	
{!! Form::open(['route' => 'admin.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-create']) !!}
	
	@include('include.user', ['submitButtonText' => 'Crear usuario'])


{!! Form::close() !!}

@stop