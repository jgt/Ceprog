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
						
							{!! Form::open(['route' => 'mtmCordinador', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de la materia']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
					<h6>Hay {!! $materias->total(); !!} Materias</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Materia</td>
			<td>Clave</td>
			<td>Semestre</td>

		</tr>
		
		@foreach($materias as $materia)

		<tr>
			<td>{{ $materia->name }}</td>
			<td>{{ $materia->creditos}}</td>
			<td>{{ $materia->semestre->name}}</td>
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