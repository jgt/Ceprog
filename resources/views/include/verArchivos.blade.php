@extends('template.Maestro')

@section('content')

<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Lista de archivos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">

			
		<tr>
			
			<td>Archivo</td>
			<td>Alumno</td>
			<td>Mensaje</td>
			<td>Carrera</td>
			<td>Descargar</td>
			<td>Calificar</td>
			<td>Respondio</td>

		</tr>
		
		<tr>
			
			@foreach($archivos as $archivo)				
				
				@foreach($archivo->users as $user)

					@foreach($user->carreras as $carrera)

				<tr>
					<td>{{ $archivo->original_filename}}</td>
					<td>{{ $archivo->usuario}}</td>
					<td>{{ $archivo->mensaje}}</td>
					<td>{{ $carrera->name}}</td>
					<td><a href="{{ route('getentry', $archivo->filename )}}" class="btn btn-success">Descargar</a></td>
					
					@if(! $user->hasNota($user, $archivo->actividad))

					<td><a href="{{ route('calificacion', $archivo)}}" class="btn btn-warning">Calificar</a></td>
					@else

						<td><a href="#">no disponible</a></td>


						@endif
						<td>{{$archivo->created_at}}</td>
				</tr>
				@endforeach
			@endforeach
				
		@endforeach
	
		</tr>
		
		
	</table>
	<a href="{{ route('portafolio', $archivo->actividad->materia)}}" class="btn btn-warning">Retroceder</a>
	{!! $archivos->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop