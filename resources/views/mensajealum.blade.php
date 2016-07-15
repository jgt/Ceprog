@extends('template.Master')

@section('content')

	<div class="header"></div>

	@include('include.menumaestro')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-admin">Lista de Alumnos</h1>

			<div class="panel panel-default">

				<div class="panel-body">

					@include('include.buscaremail', ['submitButtonText' => 'Buscar'])
						
					<h6><i class="fa fa-exclamation-triangle"></i> Alumnos diponibles ({!! $users->total(); !!})</h6>
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Email</td>

		</tr>
		
		@foreach($users as $user)

		<tr data-id="{{ $user->id }}">
			<td>{{ $user->name }}</td>
			<td>{{ $user->email}}</td>
		</tr>
		@endforeach
	</table>
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


@stop
