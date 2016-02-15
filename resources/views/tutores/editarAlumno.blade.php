@extends('template.Maestro')

@section('content')

<div class="header"></div>

<h1 align="center" class="sans" id="principal-admin">Modificar alumno</h1>

{!! Form::model($user, ['route' => ['updateAlumno', $user->id ], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

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
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('cuenta', 'Numero de cuento:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('cuenta', null, ['class' => 'form-control']) !!}
	</div>


	</div>
	
	<div class="form-group">
	
	{!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">

   {!! Form::label('carrera_list', 'Carrera : ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('carrera_list[]', $carreras, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

</div>

<div class="form-group">

   {!! Form::label('semestre_list', 'Semestre : ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('semestre_list[]', $semestres, null, [ 'id' => 'semestre_list', 'class' => 'form-control', 'multiple']) !!}
   <hr>
    {!! Form::submit('Modificar', ['class' => 'btn btn-default']) !!}
    <a href="{{ route('ver')}}" class="btn btn-warning">Retroceder</a>
    </div>

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