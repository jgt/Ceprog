@extends('template.Maestro')


@section('content')

<div class="header"></div>

@include('include.menumaestro')

	<h1 align="center"  id="principal-maestro">Subir actividades</h1>
 
 
   {!! Form::open() !!}
		
			@include('include.subir', ['submitButtonText' => 'Subir archivo'])

   {!! Form::close() !!}


@endsection
 





