@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

		@include('include.menucordinador')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de Actividades</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td>Actividades</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($actividades as $actividad)

		<tr>
			<td>{{ $actividad->actividad}}</td>
			<td>

				<a href="{{ route('pdf', $actividad) }}" class="btn btn-default">Ver</a>
				<a href="{{ route('notaCordinador', $actividad )}}" class="btn btn-default">Consulta Notas</a>
				<a href="{{ route('archivoCordinador', $actividad )}}" class="btn btn-default">Material de Apoyo</a>
			
			</td>

		</tr>
			
		@endforeach
	</table>
				</div>
			</div>
			
		</div>
	</div>
</div>
{{$actividades->render()}}
@stop


@section('scripts')


@stop