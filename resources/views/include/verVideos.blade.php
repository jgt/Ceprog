@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Archivos de la materia {{$materia->name}}</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
					
			
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre del Video</td>
			<td>Materia</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($videos as $video)

		<tr>
			<td>{{$video->original_filename}}</td>
			<td>{{$video->materia->name}}</td>
			<td>
				
				<a href="{{ route('download', $video->original_filename )}}" target="_blank" class="btn btn-success">Descargar</a>
				@if(Auth::user()->is('prf'))	
				<a href="{{ route('delete', $video )}}" class="btn btn-danger">Borrar</a>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
	<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
	{!! $videos->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop