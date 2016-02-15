@extends('template.Maestro')

@section('content')

<div class="header"></div>

@include('include.menumaestro')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Alumnos de la materia</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'profesor.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de alumnos']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

					<table class="table table-bordered">
			
		<tr>
			
			<td>Name</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($materia->semestre->users as $user)	
				<tr>
					@if($user->is('alm'))
					<td>{{ $user->name}}</td>
					<td><a href="{{ route('notaMateria', $user)}}" class="btn btn-info">Ver nota</a></td>
					@endif
				</tr>

		@endforeach
	</table>
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop