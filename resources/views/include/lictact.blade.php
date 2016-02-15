@extends('template.alumno')

@section('content')
	
	<div class="header"></div>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
				<h1 align="center"  id="principal-maestro">Actividades asignadas</h1>
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				
				<div class="table-responsive">
				<div class="panel-body">
						
					<table class="table table-bordered">
			
		<tr>
			
			<td>Nombre</td>
			<td>Ver actividades</td>
			<td>Responder actividad</td>
			<td>Material de Apoyo</td>
			<td>Fecha de inicio</td>
			<td>Fecha limite</td>

		</tr>
		
		@foreach($actividades as $actividad) 
        <tr>
            <td>{{ $actividad->actividad}}</td>
             @if((date('Y-m-d') >= $actividad->fecha)&&( date('Y-m-d') <= $actividad->fechaF))
            <td><a href="{{ route('pdf', $actividad) }}" target="_blank" class="btn btn-default"><i class="fa fa-book"></i> Ver actividad</a></td>	

            @if(Auth::user()->hasArchivo(Auth::user(), $actividad))
            <td><a href="{{ route('descarga', $actividad )}}" id="consulta" class="btn btn-success"><i class="fa fa-file-word-o"></i> Responder actividad ({{Auth::user()->hasArchivo(Auth::user(), $actividad)}})</a></td>
            @else
            <td><a href="{{ route('descarga', $actividad )}}" id="Fconsulta" class="btn btn-default"><i class="fa fa-file-word-o"></i> Responder actividad ({{Auth::user()->hasArchivo(Auth::user(), $actividad)}})</a></td>
            @endif
			
			@if($actividad->apoyos->count())
            <td> <a href="{{ route('material', $actividad)}}" class="btn btn-success"><i class="fa fa-folder"></i> Material de apoyo ({{$actividad->apoyos->count()}})</a></td>
            @else
			<td> <a href="{{ route('material', $actividad)}}" id="apoyo" class="btn btn-default"><i class="fa fa-folder"></i> Material de apoyo ({{$actividad->apoyos->count()}})</a></td>
            @endif
             @else
                                   
                    <td><a desibled href="#" class="btn btn-danger">Fecha vencida</a></td>
                     <td><a desibled href="#" class="btn btn-danger">Fecha vencida</a></td>
            		 <td><a desibled href="#" class="btn btn-danger">Fecha vencida</a></td>
                @endif	

                 <td> {{ $actividad->fecha}}</td>
            	 <td>{{ $actividad->fechaF}}</td>
           
        </tr>
        @endforeach
	</table>
	<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
			{!! $actividades->render() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>
</div>

@stop


@section('scripts')
	
	@include('script.actividadAlumnos')


@stop