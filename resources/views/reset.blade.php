@extends('template.Master')

@section('content')

<div class="header"></div>

@include('include.navbar')

<h1 align="center" class="sans" id="principal-admin">Cambio de Contraseña</h1>

{!! Form::model($user, ['route' => ['resetC', $user->id ], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('name', 'Nombre:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('cuenta', 'Numero de cuento:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('cuenta', null, ['class' => 'form-control', 'disabled']) !!}
	</div>


	</div>
	
	<div class="form-group">
	
	{!! Form::label('password', 'Contraseña nueva', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>

	</div>

	
    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-default']) !!}


</div>

	
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10"></div>


    @section('footer')

	@include('script.select')

    @stop


@include('errors.error')

@stop