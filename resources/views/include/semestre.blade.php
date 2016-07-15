@extends('template.Master')


@section('content')

<div class="header-admin"></div>

@include('include.menuadmin')

<h1 align="center" id="principal-role">Crear Semestre</h1>
	
{!! Form::open(['route' => 'crearSemestre', 'method' => 'POST', 'form' => 'form-control']) !!}
	
	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('name', 'Nombre del Semestre:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>
	<div class="form-group">

   {!! Form::label('carrera_id', 'Seleciona una carrera : ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('carrera_id', [$carrera->id => $carrera->name], null, ['class' => 'form-control']) !!}
    </div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('Crear Semestre', ['class' => 'btn btn-default']) !!}

    </div>


{!! Form::close() !!}

@stop


 @section('footer')
	
	@include('script.select')
	
    @stop