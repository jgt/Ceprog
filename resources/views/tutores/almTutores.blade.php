@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

		@include('include.menuadmision')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de Materias</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
						
					<h6>Hay ({!! $materias->total(); !!}) Materias</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Materias</strong></td>
			<td><strong>Acciones</strong></td>

		</tr>
		
		@foreach($materias as $materia)

		<tr>
			<td>{{ $materia->name }}</td>
			<td><a href="{{ route('actTutores', $materia )}}" class="btn btn-default">Ver actividades</a></td>

		</tr>
		@endforeach
	</table>
		{!! $materias->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop