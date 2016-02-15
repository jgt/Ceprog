@extends('template.Maestro')


@section('content')

<div class="header"></div>

	<h1 align="center"  id="principal-maestro">Editar Foro</h1>
 
   {!! Form::model($foro, ['route' => ['updateForo', $foro], 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ]) !!}
		
			@include('include.editForo', ['submitButtonText' => 'Editar Foro'])

   {!! Form::close() !!}


@endsection