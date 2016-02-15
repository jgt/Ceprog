@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

		@include('include.menualumnos')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Videos de la Materia</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							<!--{!! Form::open(['route' => 'profesor.show', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de Materia']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}-->
						
			
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre del Video</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($videos as $video)

		<tr>
			<td>{{$video->original_filename}}</td>
			<td>
				
				<a href="{{ route('download', $video->original_filename )}}" target="_blank" class="btn btn-success">Descargar</a>

			</td>
		</tr>
		@endforeach
	</table>
		{!! $videos->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop