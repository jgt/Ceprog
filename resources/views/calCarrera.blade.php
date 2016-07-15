@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

		@include('include.menualumnos')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Carreras cursadas</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Materia</strong></td>
			<td><strong>Nota</strong></td>

		</tr>
		
		@foreach($materias as $materia)

		<tr>
			<td>{{ $materia->name }}</td>
			<td>
				@foreach($semestre->users as $user)
					
					@foreach($user->calificaciones as $calificacion)
						
						{{$calificacion->promedio}}

					@endforeach

				@endforeach

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