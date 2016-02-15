@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

		@include('include.menumaestro')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Nota de la materia</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							<!--{!! Form::open(['route' => 'profesor.show', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de Materia']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}-->
					
			
					<table class="table table-bordered">
			
		<tr>
			
			<td>Actividad</td>
			<td>Nota</td>
		
		</tr>
		
		@foreach($alumno->semestres as $semestre)

			@foreach($semestre->materias as $materia)

				@foreach($materia->actividades as $actividad)

		<tr>
				<td>{{$actividad->actividad}}</td>
	
				<td>
					@if($alumno->hasNota($alumno, $actividad))

					@foreach($calificaciones as $calificacion)

					{{$calificacion->promedio}}% 

					@endforeach

					@else

					<a href="#">Sin nota</a>
					
					@endif
				
				</td>

		</tr>
		@endforeach
		@endforeach
		@endforeach

		<tr>
			<td>Promedio General de la materia</td>
			<td>
				
				{{$promedio}}%

			</td>
		</tr>

		
	</table>
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop