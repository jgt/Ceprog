@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de carreras</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'mat', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre del semestre de la carrera']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
					<h6>Hay {!! $semestres->total(); !!} Actividad</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Semestre</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($semestres as $semestre)

		<tr>
			<td>{{ $semestre->carrera->name }}</td>

			<td>{{$semestre->name}}</td>
			<td>
				
				<a href="{{ route('mtm', $semestre )}}" class="btn btn-default">Ver Materias</a>
	
			</td>
		</tr>
		@endforeach
	</table>
		{!! $semestres->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop