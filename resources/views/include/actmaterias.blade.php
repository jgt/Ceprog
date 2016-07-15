@extends('template.Maestro')

@section('content')

<div class="header"></div>

	<h1 align="center"  id="principal-maestro">Actividades de la Materia {{$materia->name}}</h1>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				
				<div class="table-responsive">
				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			@if(Auth::user()->is('prf'))
			<td>Actividad</td>
			<td>Ver material</td>
			<td>Archivos</td>
			<td>Activar/Editar</td>
			<td>Subir Material</td>
			<td>Rubricas</td>
			@endif
			@if(Auth::user()->is('ctr'))
			<td>Consultas</td>
			@endif
			@if(Auth::user()->is('cdo'))
			<td>Material</td>
			@endif
			@if(Auth::user()->is('prf') || Auth::user()->is('ctr') || Auth::user()->is('cdo'))
			<td>Notas</td>
			<td>Actividad/PDF</td>
			@elseif(Auth::user()->is('ctr') || Auth::user()->is('cdo'))
			<td>Actividad</td>
			@endif

			<td>Borrar</td>

		</tr>
			
			@foreach($actividades as $actividad)
				
					
				<tr>
					<td>{{ $actividad->actividad}}</td>

					@if(Auth::user()->is('prf'))
						
						@if($actividad->apoyos->count())
						<td><a href="{{route('material', $actividad)}}" class="btn btn-success">Ver material ({{$actividad->apoyos->count()}})</a></td>
						@else
						<td><a href="{{route('material', $actividad)}}" id="material" class="btn btn-default">Ver material ({{$actividad->apoyos->count()}})</a></td>
						@endif

						@if($actividad->fileentries->count())

					<td><a href="{{ route('verArchivos', $actividad)}}" class="btn btn-success"><i class="fa fa-folder-open-o"></i> Ver archivos ({{$actividad->fileentries->count()}})</a></td>
					@else

					<td><a href="{{ route('verArchivos', $actividad)}}" id="file" id="file" class="btn btn-default"><i class="fa fa-folder-open-o"></i> Ver archivos ({{$actividad->fileentries->count()}})</a></td>

					@endif	
					
					@if($actividad->fecha && $actividad->fechaF)
						
						<td><a href="{{ route('profesor.edit', $actividad)}}" class="btn btn-success">Activar/Editar</a></td>

						@else
						<td><a href="{{ route('profesor.edit', $actividad)}}" class="btn btn-default"><i class="fa fa-calendar-o"></i> Activar/Editar</a></td>

					@endif
					
					<td><a href="{{ route('apollo', $actividad )}}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> Material de apoyo</a></td>

					@if($actividad->rubricas->count()>=5)

						<td><a href="#" class="btn btn-success">Completas</a></td>
						@else

						<td><a href="{{ route('rubrica', $actividad )}}" class="btn btn-default"><i class="fa fa-exclamation"></i> Rubricas ({{$actividad->rubricas->count()}})</a></td>

					@endif
					@endif
					@if(Auth::user()->is('ctr'))

						<td><a href="{{ route('sinNota', $actividad )}}" class="btn btn-default"><i class="fa fa-users"></i> Consulta de alumnos</a></td>

					@endif
					@if(Auth::user()->is('cdo'))
							
						@if($actividad->apoyos->count())
						<td><a href="{{ route('archivoCordinador', $actividad )}}" class="btn btn-success">Material de Apoyo ({{$actividad->apoyos->count()}})</a></td>
						@else
						<td><a href="{{ route('archivoCordinador', $actividad )}}" id="material" class="btn btn-default">Material de Apoyo ({{$actividad->apoyos->count()}})</a></td>
						@endif

						
					@endif
					@if(Auth::user()->is('prf') || Auth::user()->is('ctr') || Auth::user()->is('cdo'))

						@if($actividad->calificaciones->count())

					<td><a href="{{ route('cloTutores', $actividad )}}" class="btn btn-success"><i class="fa fa-users"></i> Notas Alumnos ({{ $actividad->calificaciones->count()}})</a></td>

					@else
					<td><a href="{{ route('cloTutores', $actividad )}}" id="alumnos" class="btn btn-default"><i class="fa fa-users"></i> Notas Alumnos ({{ $actividad->calificaciones->count()}})</a></td>

					@endif

					<td><a href="{{ route('pdf', $actividad) }}" target="_blank" class="btn btn-default"><i class="fa fa-eye"></i> Ver actividad</a></td>
					@endif
					<td>
						{!! Form::model($actividad, ['route' => ['profesor.destroy', $actividad], 'method' => 'DELETE', 'role' => 'form']) !!}
							<button type="submit" onclick= "return confirm('seguro que desea eliminar la actividad?')" class="btn btn-danger"><i class="fa fa-eraser"></i> Borrar</button>
						{!! Form::close() !!}
					</td>
				</tr>

		@endforeach
	</table>
	{!!$actividades->render()!!}
	<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
	
	@include('script.actividad')
	
@stop