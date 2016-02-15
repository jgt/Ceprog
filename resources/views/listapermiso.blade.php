@extends('template.Master')

@section('content')

<div class="header-admin"></div>

	@include('include.menuadmin')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Carreras</div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'permiso.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de permiso']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

					<h6>Hay {!! $permiso->total(); !!} Grupos</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Name</td>
			<td>slug</td>
			<td>Modificar Permisos</td>

		</tr>
		
		@foreach($permiso as $permisos)

		<tr>

			<td>{{ $permisos->name }}</td>
			<td>{{ $permisos->slug }}</td>
			<td>
				
				{!! Form::model($permisos, ['route' => ['permiso.destroy', $permisos->id], 'method' => 'DELETE', 'role' => 'form']) !!}
						
						<a href="{{ route('permiso.show', $permisos->id) }}" class="btn btn-info">Ver permisos</a>
						<a href="{{ route('permiso.edit', $permisos->id) }}" class="btn btn-warning">Asignar permiso</a>
						<button type="submit" onclick= "return confirm('seguro que desea eliminar el permiso?.')" class="btn btn-danger">Borrar</button>

				{!! Form::close() !!}
				
			</td>
		</tr>
		@endforeach
	</table>
		{!! $permiso->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop