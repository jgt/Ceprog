@extends('template.Maestro')

@section('content')

	<div class="header-admin"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-admin">Carreras</h1>

			<div class="panel panel-default">

				<div class="panel-body">

					{!! Form::open(['route' => 'carrera.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Carrera']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
					<h6><i class="fa fa-exclamation-triangle"></i> Carreras disponibles ({!! $carreras->total(); !!})</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Carreras</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($carreras as $carrera)
			
			<tr>

				<td>{{$carrera->name}}</td>	
				<td>
					
				{!! Form::model($carrera, ['route' => ['carrera.destroy', $carrera->id], 'method' => 'DELETE', 'role' => 'form']) !!}	

					<a href="{{ route('carrera.edit', $carrera )}}" class="btn btn-default">Editar</a>

					<a href="{{ route('crearSemestre', $carrera )}}" class="btn btn-default">Semestre</a>

					<a href="{{ route('createMateria', $carrera )}}" class="btn btn-default">Materia</a>

					<button type="submit" onclick= "return confirm('seguro que desea eliminar la carrera?')" class="btn btn-danger">Borrar</button>

					{!! Form::close() !!}

				</td>
		</tr>
		
		
		@endforeach
	</table>
	<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $carreras->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop


