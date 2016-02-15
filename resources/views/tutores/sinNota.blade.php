@extends('template.Maestro')

@section('content')

<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Consulta de Alumnos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
						
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Alumnos</strong></td>
			<td><strong>Respuesta de Actividad</strong></td>
			<td><strong>Estado del alumno</strong></td>

		</tr>
			
				@foreach($actividad->materia->semestre->users as $user)

					<tr>
						@if($user->is('alm'))
						<td>{{$user->name}}</td>
						<td>
							
							@if($user->hasArchivo($user, $actividad))
						
						<a href="#">Ha respondido la actividad</a>

						@else

						<a href="#"><strong>No ha respondido la actividad</strong></a> 

						@endif


						</td>

						@if($user->hasNota($user, $actividad))
						
						<td><a href="#">Calificado</a></td>
						
						@else

						<td><strong><a href="#">No tiene nota</a></strong></td>

						@endif
						@endif
					</tr>

				@endforeach


	</table>
	<a href="{{ route('portafolio', $actividad->materia)}}" class="btn btn-warning">Retroceder</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop