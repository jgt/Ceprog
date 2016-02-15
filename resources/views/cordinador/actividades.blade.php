@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de Materias del maestro {{$maestro->name}}</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-hover">
			
		<tr>
			
			<td>Materias</td>
			<td>Semestre</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($materias as $materia)

		<tr>
			<td>{{ $materia->name}}</td>
			<td>{{ $materia->semestre->name}}</td>
			<td>
				<a href="{{ route('portafolio', $materia)}}" class="btn btn-default"><i class="fa fa-book"></i> Actividades</a>
				<a href="{{ route('videoCordinador', $materia)}}" class="btn btn-default"><i class="fa fa-file-archive-o"></i> Archivos/Videos</a>
			</td>

		</tr>
			
		@endforeach
	</table>
	<a href="{{route('cordinador.index')}}" class="btn btn-warning">Retroceder</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
{{$materias->render()}}
@stop


@section('scripts')


@stop