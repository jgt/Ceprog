@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

		@include('include.menualumnos')

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1 align="center"  id="principal-maestro">Materias</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						
							<!--{!! Form::open(['route' => 'profesor.show', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de Materia']) !!}

							</div>		

							<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}-->
						
			
					<table class="table table-bordered">
			
		<tr>
			
			<td><strong>Nombre</strong></td>
			<td><strong>Semestre</strong></td>
			<td><strong>Acciones</strong></td>

		</tr>

			@foreach($materias as $materia)

					<tr>
	
						<td>{{$materia->name}}</td>
						<td>{{$materia->semestre->name}}</td>

						<td><a href="{{ route('act', $materia)}}" class="btn btn-success">Ver Actvidades</a>
							
							<a href="{{ route('verPlaneacion', $materia)}}" class="btn btn-info">Ver planeacion</a>

							<a href="{{ route('promedio', $materia )}}" class="btn btn-default">Calificacion</a>

							<a href="{{ route('showVideos', $materia )}}" class="btn btn-warning">Videos</a>

							<hr>

							@foreach($materia->foros as $foro)
				
								<ul class="nav navbar-nav">
						
								<li class="dropdown">
							
										<a  href="#"  class="btn btn-default" data-toggle="dropdown"><i class="fa fa-bars"></i> Foros</a>
									<ul class="dropdown-menu">	
								
										<li><a href="{{route('Ecomentario', $foro)}}">{{$foro->title}}</a></li>

									</ul>

								</li>

					</ul>

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