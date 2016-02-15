@extends('template.Maestro')

@section('content')

<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Lista de Planeaciones</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							<!--{!! Form::open(['route' => 'listplan', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de materias']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}-->
					<table class="table table-hover">
			
		<tr>
			
			<td>Planeaciones</td>
			<td>Semestre</td>
			<td>Acciones</td>

		</tr>
		
		@foreach($planeaciones as $planeacion)

		<tr>

			<td>{{ $planeacion->materia->name}}</td>
			<td>{{ $planeacion->materia->semestre->name}}</td>

			<td>
				
				<a href="{{route('planpdf', $planeacion)}}" class="btn btn-success">Ver planeacion en PDF</a>
				<a href="{{ route('showPdf', $planeacion)}}" class="btn btn-info">Vista previa</a>
	
			</td>
		</tr>
		@endforeach
	</table>
	<a href="{{route('cordinador.index')}}" class="btn btn-warning">Retroceder</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@stop


@section('scripts')


@stop