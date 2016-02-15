@extends('template.Maestro')

@section('content')

	<div class="header-admin"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-admin">Lista de alumnos</h1>

			<div class="panel panel-default">

				<div class="panel-body">
						
						{!! Form::open(['route' => 'ver', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Alumno']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
					
						
					<h6><i class="fa fa-exclamation-triangle"></i> Alumnos disponibles ({!! $users->total(); !!})</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Carrera</td>
			<td>Modificar alumno</td>		


		</tr>
		@foreach($users as $user)

		<tr>
			@if($user->is('alm'))
			<td>{{ $user->name }}</td>
			<td>
				@foreach($user->carreras as $carrera)

				{{ $carrera->name}}

				@endforeach

			</td>
			<td><a href="{{ route('edt', $user )}}" class="btn btn-default">Modificar alumno</a></td>
		</tr>
			@endif
		@endforeach
	</table>
	<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $users->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop
