@extends('template.Maestro')

@section('content')

<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Notas de Alumnos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
						
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Alumnos</strong></td>
			<td><strong>Nota</strong></td>

		</tr>
			
				@foreach($actividad->calificaciones as $calificacion)
					
				<tr>
					@if($calificacion->user->is('alm'))

					<td>{{ $calificacion->user->name}}</td>
					<td><a href="{{ route('nto', $calificacion )}}" class="btn btn-default">Nota</a></td>
						
						
					
					@endif
				</tr>
			
		@endforeach


	</table>
	<a href="{{route('portafolio', $actividad->materia)}}" class="btn btn-warning">Retroceder</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop