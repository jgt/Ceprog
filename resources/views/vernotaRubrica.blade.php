@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>

		@include('include.menumaestro')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Nota de las Rubricas</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td>Rubrica</td>
			<td>Nota</td>
		</tr>
		
		@foreach($actividad->rubricas as $rubrica)

				<tr>
				<td>{{ $rubrica->name}}</td>
				<td>
			@foreach($rubrica->calificaciones as $calificacion)
						
					{{ $calificacion->pivot->nota}}%

			@endforeach
				</td>
				
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