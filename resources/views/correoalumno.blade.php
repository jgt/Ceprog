@extends('template.alumno')

@section('content')

	<div class="header"></div>

	@include('include.menualumnos')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-admin">Lista de Mensajes</h1>

			<div class="panel panel-default">

				<div class="panel-body">

					@include('include.bucaralumno', ['submitButtonText' => 'Buscar'])
						
					<h6><i class="fa fa-exclamation-triangle"></i> Mensajes disponibles ({!! $mensajes->count(); !!})</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Email</td>
			<td>Responder mensaje</td>

		</tr>
		
		@foreach($mensajes as $mensaje)

		<tr>
			<td>{{ $mensaje->name }}</td>
			<td>{{ $mensaje->email}}</td>
			<td>
					{!! Form::model($mensaje, ['route' => ['alumno.destroy', $mensaje->id], 'method' => 'DELETE', 'role' => 'form']) !!}

						<a href="{{ route('alumno.show', $mensaje->id) }}" class="btn btn-info">Ver mensaje</a>
						<a href="{{ route('alumno.create', $mensaje->id) }}" class="btn btn-default">Responder mensaje</a>
						<button type="submit" class="btn btn-danger">Borrar</button>

						{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</table>
		{!! $mensajes->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

	
@stop


@section('scripts')


@stop
