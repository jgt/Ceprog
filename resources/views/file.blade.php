@extends('template.alumno')

@section('content')

	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Archivos adjuntos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body optimal">
						
							{!! Form::open(['route' => 'archivos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de archivo']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

					<h6>Hay {!! $archivos->total(); !!} Archivos</h6>
					<table class="table table-bordered">
			
		<tr>
			

			<td>Archivo</td>
			<td>Materia</td>
			<td>Actividad</td>
			<td>Alumno</td>
			<td>Acciones</td>
			<td>Borrar</td>
			<td>Respondio</td>

		</tr>
		
		@foreach($archivos as $archivo)

		<tr>
			<td>{{ $archivo->original_filename }}</td>
			<td>{{ $archivo->actividad->materia->name}}</td>
			<td>{{ $archivo->actividad->actividad }}</td>
			<td>{{ $archivo->usuario}}</td>
			<td><a href="{{ route('getentry', $archivo->filename)}}" target="_black" class="btn btn-success">Descargar</a></td>
			
			@if((date('Y-m-d') >= $archivo->actividad->fecha)&&( date('Y-m-d') <= $archivo->actividad->fechaF))

			<td><a href="{{ route('borrar', $archivo->filename)}}" class="btn btn-danger">Borrar</a></td>

			@else
				
				<td><a href="#">Fecha vencida</a></td>

			@endif
			<td>{{$archivo->created_at}}</td>

		</tr>
		@endforeach
	</table>
	<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $archivos->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop

