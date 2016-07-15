@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de rubricas</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'listrubrica', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de la rubrica']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
					<h6>Hay {!! $rubricas->total(); !!} Actividad</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Actividad</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($rubricas as $rubrica)

		<tr>
			<td>{{ $rubrica->name }}</td>
			<td>{{ $rubrica->actividad->actividad }}</td>
			<td><a href="{{ route('editrubrica', $rubrica )}}" class="btn btn-success">Editar</a></td>
		</tr>
		@endforeach
	</table>
	<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $rubricas->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop