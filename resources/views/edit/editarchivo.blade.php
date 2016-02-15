@extends('template.Maestro')


@section('content')

<div class="header"></div>

@include('include.menumaestro')

	<h1 align="center"  id="principal-maestro">asignar archivo</h1>
 
   {!! Form::model($entries, ['route' => ['archivoupdate', $entries->id], 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ]) !!}
		
			@include('include.subir', ['submitButtonText' => 'asignar archivo'])

   {!! Form::close() !!}


@endsection
 