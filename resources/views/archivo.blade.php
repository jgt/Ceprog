@extends('template.Maestro')

@section('content')

	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Material de apoyo</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body optimal">
						
							{!! Form::open(['route' => 'archivos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de archivo']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

					<table class="table table-bordered">
			
		<tr>
			

			<td>Archivo</td>
			<td>Actividad</td>
			<td>Mensaje</td>
			<td>Profesor</td>
			<td>Acciones</td>
			@if(Auth::user()->is('prf') && Auth::user()->is('alm'))
				<td>Borrar</td>
			@elseif(Auth::user()->is('prf'))
				<td>Borrar</td>
			@endif
			

		</tr>
		
		@foreach($archivos as $archivo)

		<tr>
			<td>{{ $archivo->original_filename }}</td>
			<td>{{ $archivo->actividad->actividad }}</td>
			<td>{{ $archivo->mensaje}}</td>
			<td>{{ $archivo->usuario}}</td>
			<td><a href="{{ route('apoyo', $archivo->filename)}}" class="btn btn-success">Descargar</a></td>
			@if(Auth::user()->is('prf') && Auth::user()->is('alm'))

				<td><a href="{{ route('borrarM', $archivo->filename )}}" class="btn btn-danger">Borrar</a></td>
			
			@elseif(Auth::user()->is('prf'))
				<td><a href="{{ route('borrarM', $archivo->filename )}}" class="btn btn-danger">Borrar</a></td>
			@endif
		</tr>
		@endforeach
	</table>
	@if(Auth::user()->is('prf') && Auth::user()->is('alm'))

	<a href="{{ route('act', $actividad->materia)}}" class="btn btn-warning">Retroceder al perfil Alumno</a>
	<a href="{{ route('portafolio', $actividad->materia )}}" class=" btn btn-warning">Retroceder al perfil Maestro</a>

	@elseif(Auth::user()->is('prf'))

		<a href="{{ route('portafolio', $actividad->materia )}}" class=" btn btn-warning">Retroceder</a>

	@elseif(Auth::user()->is('alm'))
	
		<a href="{{ route('act', $actividad->materia)}}" class="btn btn-warning">Retroceder</a>

	@endif
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop

