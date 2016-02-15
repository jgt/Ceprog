@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Crear Materia</h1>

{!! Form::open(['route' => 'materia.store', 'method' => 'POST', 'form' => 'form-control']) !!}

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('name', 'Materia:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>
<br><br>
	<div class="form-group">
	
	{!! Form::label('creditos', 'Clave: ', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('creditos', null, ['class' => 'form-control']) !!}
	</div>

	</div>
<br><br>
	<div class="form-group">
	
	{!! Form::label('semestre_id', 'Semestre', ['class' => 'control-label col-xs-2']) !!}
		<div class="col-lg-10">
	{!! Form::select('semestre_id', $semestres, null, [ 'id' => 'tag_list', 'class' => 'form-control']) !!}
	</div>

	</div>
<br><br>
	<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('Crear materia', ['class' => 'btn btn-default']) !!}
	<a href="{{route('carrera.index')}}" class="btn btn-warning">Retroceder</a>
    </div>

{!! Form::close() !!}
	
</div>	

				</div>
			</div>
		</div>
	</div>
</div>



@stop


 @section('footer')
	
	@include('script.select')
	
    @stop