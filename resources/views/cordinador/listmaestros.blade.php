@extends('template.Maestro')

@section('content')

<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Lista de Maestros</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							{!! Form::open(['route' => 'cordinador.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de maestro']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}
						
					<table class="table table-hover">
			
		<tr>
			
			<td>Maestros</td>
			<td>Acciones</td>

		</tr>

		@foreach($users as $user)

		<tr>
			@if($user->is('prf'))
			<td>{{ $user->name }}</td>
			<td>
				
				{!! Form::model($user, ['route' => ['cordinador.destroy', $user], 'method' => 'DELETE', 'role' => 'form']) !!}
						
						<a href="{{ route('cordinador.edit', $user )}}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> Ver / Editar Maestro</a>
						<a href="{{ route('cordinador.show', $user )}}" class="btn btn-default"><i class="fa fa-eye"></i> Ver planeacion</a>
						<a href="{{ route('actCordinador', $user )}}" class="btn btn-default"><i class="fa fa-eye"></i> Ver materias</a>
						<button type="submit" onclick= "return confirm('seguro que desea eliminar el maestro?')" class="btn btn-danger"><i class="fa fa-eraser"></i> Borrar</button>

				{!! Form::close() !!}
				
			</td>
			@endif
		</tr>
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