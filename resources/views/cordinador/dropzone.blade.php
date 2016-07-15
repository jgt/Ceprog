@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Archivos/Videos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'videoCordinador', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre del video']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
			
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre del Video</td>
			<td>Materia</td>

		</tr>
		
		@foreach($videos as $video)

		<tr>
			<td>{{$video->original_filename}}</td>
			<td>{{$video->materia->name}}</td>
		</tr>
		@endforeach
	</table>
	<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $videos->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop