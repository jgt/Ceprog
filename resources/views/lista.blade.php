@extends('template.Maestro')

@section('content')

	<div class="header-admin"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-admin">Personal</h1>

			<div class="panel panel-default">

				<div class="panel-body">

					@include('include.buscar', ['submitButtonText' => 'Buscar'])
					
					<div id="err-timedout" class="alert">¡Error! Tiempo de espera agotado. Intente más tarde</div>
					<h6><i class="fa fa-exclamation-triangle"></i> Usuarios disponibles ({!! $users->total(); !!})</h6>
					
			<table class="table">
				
				<thead>
					
					<th>Usurios</th>
					<th>Roles</th>
					<th>Acciones</th>
				</thead>

				<tbody id="datos">
				@foreach($users as $user)
			
		<tr data-id="{{ $user->id }}">
			<td>{{ $user->name }}</td>
			<td>
				@foreach($user->roles as $role)
					
						
					({{$role->name}})
					
				
				@endforeach
			</td>
			<td>
				
				{!! Form::model($user, ['route' => ['admin.destroy', $user->id], 'method' => 'DELETE', 'role' => 'form']) !!}
						
						
						<a href="{{ route('admin.show', $user->id)}}" class="btn btn-info">Ver Usuario</a>
						<a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning">Editar Usuario</a>
						<button type="submit" onclick= "return confirm('seguro que desea eliminar el usuario?')" class="btn btn-danger">Borrar</button>


				{!! Form::close() !!}


				
			</td>
		</tr>
			
		@endforeach
				</tbody>

			</table>


		<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
		{!! $users->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>

{!! Form::model($users, ['route' => ['admin.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}




	
@stop

@section('scripts')

	
<script>
	/*
	$(document).on('ready', function(){

		var tablaDatos = $('#datos');
		var route = $('#ruta').attr('href');

		$.get(route, function(resp){

			$(resp).each(function(key,value){

				tablaDatos.append("<tr><td>"+value.user+"</td></tr>");

			});

		});

	});

</script>

@stop






