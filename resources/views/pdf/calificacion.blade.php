@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

		<h1 align="center"  id="principal-maestro">Centro de Estudios Profesionales del Grijalva</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
						<table class="table table-bordered">
		
		
			<tr>
			<td><strong>Carreras:</strong> {{$materia->semestre->carrera->name}}</td>
			</tr>
			<tr>
			<td><strong>Asignatura: </strong>

			{{$materia->name}}	

			</td>
			</tr>
			<tr>
			<td><strong>Semestre:</strong>
				
				{{$materia->semestre->name}}
		
			</td>
			</tr>
	</table>

	<table class="table table-bordered">

		<tr>
			
			<td><strong>Nombre de alumnos</strong></td>
			<td><strong>Control de actividades</strong>
				
		</tr>
	
			@foreach($materia->semestre->users as $user)
				
					<tr>
						@if($user->is('alm'))
						<td>{{$user->name }}</td>
						
						<td>
							
									@foreach($user->calificaciones as $calificacion)

								<ul>
									@if($user->hasNota($user, $calificacion->actividad))

									<li>{{$calificacion->actividad->actividad}}  ({{$calificacion->promedio}})</li>

									@endif
								</ul>

								@endforeach
								<strong>Promedio de la materia</strong> ({{$promedios}})
						</td>
						@endif
					</tr>

			@endforeach
			
	</table>
				<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>	
		
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop

