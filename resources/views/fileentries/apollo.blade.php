@extends('template.Maestro')


@section('content')

<div class="header"></div>


	<h1 align="center"  id="principal-maestro">Material de apoyo</h1>
	<hr>
 
   {!! Form::open(['route' => ['material', $actividad], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			@include('include.apollo', ['submitButtonText' => 'Subir archivo'])

   {!! Form::close() !!}


@endsection
 