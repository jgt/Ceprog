@extends('template.Maestro')


@section('content')

<div class="header"></div>

@include('include.menuadmin')
	
{!! Form::open(['route' => 'storeTutor', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
	
	
	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div align="center" class="panel-heading">Crear Tutor</div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('name', 'Nombre:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'col-lg-2 control-label']) !!}

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

   {!! Form::label('carrera', 'Carrera : ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('carrera[]', $carrera, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>
</div>	

<div class="form-group">

   {!! Form::label('semestre', 'Semestre : ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('semestre[]', $semestre, null, [ 'id' => 'semestre_list', 'class' => 'form-control', 'multiple']) !!}
    </div>
</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('Crear alumno', ['class' => 'btn btn-default']) !!}

    </div>


    @section('footer')
	
	@include('script.select')
	
    @stop


{!! Form::close() !!}

@stop