@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

		@include('include.menumaestro')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de Actividades</h1>

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
			
			<td>Nombre</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($actividades as $actividad)

		<tr>
			<td>{{ $actividad->actividad}}</td>
			<td>
				
				{!! Form::model($actividad, ['route' => ['profesor.destroy', $actividad], 'method' => 'DELETE', 'role' => 'form']) !!}
				<a href="{{ route('profesor.edit', $actividad) }}" class="btn btn-info">Previo activar</a>
				<a href="{{ route('apollo', $actividad )}}" class="btn btn-success">Material de apoyo</a>
				<a href="{{ route('rubrica', $actividad )}}" class="btn btn-default">Crear rubrica</a>
				<button type="submit" onclick= "return confirm('seguro que desea eliminar la actividad?')" class="btn btn-danger">Borrar</button>
				

				{!! Form::close() !!}
			</td>

		</tr>
		@endforeach
	</table>
			{!! $actividades->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop