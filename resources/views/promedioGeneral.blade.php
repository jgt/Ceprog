@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Nota de la materia</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Actividad</strong></td>
			<td><strong>Rubricas Evaluadas</strong></td>
			<td><strong>Nota</strong></td>
			
		
		</tr>
		
		
			@foreach($calificaciones as $calificacion) 
		<tr>
			

				<td>{{$calificacion->actividad->actividad}}</td>	
				<td>
					@foreach($calificacion->rubricas as $rubrica)
						
						{{$rubrica->name}} ({{$rubrica->pivot->nota}}%)

					@endforeach
				</td>
				<td>{{$calificacion->promedio}}%</td>	
		</tr>
@endforeach
		<tr>

			<td><strong>Ponderado</strong></td>
			<td><strong>Promedio General de la materia</strong></td>
			<td>{{$promedio}}%</td>
		</tr>

		
	</table>
	<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop