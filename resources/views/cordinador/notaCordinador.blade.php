@extends('template.Maestro')

@section('content')

<div class="header"></div>

@include('include.menucordinador')

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
			<td><strong>Respuesta de alumnos</strong></td>
			<td><strong>Nota</strong></td>

		</tr>
			
			@foreach($actividad->materia->semestre->users as $user)
					
				<tr>
					@if($user->hasArchivo($user, $actividad))

						<td>{{$user->name}}</td>
						<td><a href="#">Ha respondido la actividad</a></td>

						@endif
						
						@if($actividad->hasNota($user, $actividad))
							
							<td><a href="{{ route('ntCordinador', $actividad )}}" class="btn btn-default">Ver nota</a></td>


						@endif

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