@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Notas</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Rubrica</strong></td>
			<td><strong>Nota</strong></td>
		</tr>
		
		@foreach($calificacion->rubricas as $rubrica)
			
			
				<tr>
				<td>{{ $rubrica->name}}</td>
				<td>{{ $rubrica->pivot->nota}}</td>
				</tr>
		@endforeach
			
					<tr>

					<td><strong>Promedio de la actividad</strong></td>
					<td>{{$calificacion->promedio}}%</td>

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