@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

		@include('include.menucordinador')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Nota de las Rubricas</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Rubrica</strong></td>
			<td><strong>Nota</strong></td>
		</tr>
		
		@foreach($actividad->rubricas as $rubrica)

				<tr>
				<td>{{ $rubrica->name}}</td>
				<td>
			@foreach($rubrica->calificaciones as $calificacion)
						
					{{ $calificacion->pivot->nota}}%

			@endforeach
				</td>
				
				</tr>
		@endforeach
			
					<tr>

					<td><strong>Promedio de la actividad</strong></td>
					<td>{{$promedio}}%</td>

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