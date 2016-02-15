@extends('template.alumno')

@section('content')

	<div class="header"></div>

	@include('include.menualumnos')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Archivos recibidos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body optimal">
						
							{!! Form::model(Request::all(), ['action' => 'FileEntryController@enviado', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de actividad']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

					<h6>Hay {!! $arenviado ->total(); !!} Archivos</h6>
					<table class="table table-bordered">
			
		<tr>
			

			<td>Nombre</td>
			<td>Mensaje</td>
			<td>Archivo</td>

		</tr>
		
		@foreach($arenviado  as $entry)

		<tr>
			<td>{{ $entry->name }}</td>
			<td>{{ $entry->mensaje }}</td>
			<td>
				
				
						<a href="{{ route('getentry', $entry->pivot->id)}}" class="btn btn-success">Descargar</a>		
			</td>
		</tr>
		@endforeach
	</table>
		{!! $arenviado->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop

