@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Lista de Tutoriales</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
					
			
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre del Video</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($tutoriales as $tutorial)

		<tr>
			<td>{{$tutorial->original_filename}}</td>
			<td>
				
				<a href="{{ route('dwTutorial', $tutorial->original_filename)}}" target="_blank" class="btn btn-success">Descargar</a>
				@if(Auth::user()->is('adm'))	
				<a href="{{ route('dlTutorial', $tutorial)}}" class="btn btn-danger">Borrar</a>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
	<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop


@section('scripts')


@stop