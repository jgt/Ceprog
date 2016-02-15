@extends('template.Maestro')


@section('content')

<div class="header"></div>

@include('include.menumaestro')

<h1 align="center"  id="principal-maestro">Nuevo Tema</h1>

{!! Form::open(['route' => 'blog.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body optimal">

	@include('errors.error')
						
	{!! Form::label('tema', 'Tema')!!}
	{!! Form::text('tema', null, ['class' => 'form-control']) !!}

							
	{!! Form::label('mensaje', 'Mensaje')!!}
	{!! Form::textarea('mensaje', null, ['class' => 'form-control', 'rows' => '1'])!!}

   <hr>
   {!! Form::submit('Crear Solicitud', ['class' => 'btn btn-default']) !!}

{!! Form::close() !!}

</div>

			</div>
			
		</div>
	</div>
</div>

@stop
