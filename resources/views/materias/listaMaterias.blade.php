@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de materias</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'listmaterias', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de la materia']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
					<h6>Hay {!! $materias->total(); !!} Materias</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Clave</td>
			<td>Semestre</td>
			<td>Editar</td>
			<td>Editar Semestre</td>
			<td>Borrar</td>

		</tr>
		
		@foreach($materias as $materia)

		<tr>
			<td>{{ $materia->name }}</td>
			<td>{{ $materia->creditos}}</td>
			<td>{{ $materia->semestre->name}}</td>
			<td><a href="{{ route('materia.edit', $materia )}}" class="btn btn-success">Editar</a></td>
			<td><a href="{{ route('semestre.edit', $materia->semestre )}}" class="btn btn-default">Editar semestre</a></td>
			<td>
			
			{!! Form::model($materia, ['route' => ['materia.destroy', $materia->id], 'method' => 'DELETE', 'role' => 'form']) !!}

				<button type="submit" onclick= "return confirm('seguro que desea eliminar la materia?')" class="btn btn-danger">Borrar</button>
				
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</table>
	<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $materias->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop