@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de actividades</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Actividades</strong></td>
			<td><strong>Clave</strong></td>
			<td><strong>Acciones</strong></td>
		</tr>
		
		@foreach($materia->actividades as $actividad)
			
		<tr>
			<td>{{ $actividad->actividad }}</td>
			<td>{{ $actividad->codigoactividad}}</td>
			<td>
				
				<a href="{{ route('sinNota', $actividad )}}" class="btn btn-default">Consulta de alumnos</a>
				<a href="{{ route('cloTutores', $actividad )}}" class="btn btn-default">Ver Notas</a>
			
			</td>

		</tr>

		@endforeach
	</table>
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop