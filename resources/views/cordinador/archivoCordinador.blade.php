@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Archivos de apoyo</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
						
					
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Mensaje</td>
			<td>Actividad</td>
			<td>Profesor</td>

		</tr>
		
		@foreach($entries as $entry)

		<tr>
			<td>{{ $entry->original_filename }}</td>
			<td>{{ $entry->mensaje}}</td>
			<td>{{ $entry->actividad->actividad}}</td>
			<td>{{ $entry->usuario}}</td>
		</tr>

		@endforeach

	</table>
		{!! $entries->render() !!}
		<a href="{{ route('portafolio', $actividad->materia )}}" class=" btn btn-warning">Retroceder</a>
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop