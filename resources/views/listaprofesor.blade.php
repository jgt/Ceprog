@extends('template.Maestro')

@section('content')

<div class="header"></div>

@include('include.menumaestro')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Lista de actividades</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'profesor.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de actividad']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

					<h6>Hay {!! $profesores->total(); !!} Actividades</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Name</td>
			<td>Carrera</td>
			<td>Modificar actividad</td>

		</tr>
		
		@foreach($profesores as $profesor)

		<tr>

			<td>{{ $profesor->actividad }}</td>
			<td>{{ $profesor->materia}}</td>
			<td>
				
				{!! Form::model($profesor, ['route' => ['profesor.destroy', $profesor->id], 'method' => 'DELETE', 'role' => 'form']) !!}
						
						<a href="{{ route('profesor.show', $profesor->id) }}" class="btn btn-info">Ver actividad</a>
						<a href="{{ route('profesor.edit', $profesor->id) }}" class="btn btn-warning">Asignar / Editar Actividad</a>
						<button type="submit" onclick= "return confirm('seguro que desea eliminar la actividad?')" class="btn btn-danger">Borrar</button>
						

				{!! Form::close() !!}
				
			</td>
		</tr>
		@endforeach
	</table>
		{!! $profesores->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop