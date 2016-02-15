@extends('template.Maestro')

@section('content')

	<div class="header-admin"></div>

	<h2 class="tamaños" id="color-letra" align="center">Examenes de la materia {{$materia->name}}</h2>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						
						<table class="table table-bordered">
							<thead>
								<th>Materia</th>
								<th>Acciones</th>
								<th>Fecha de inicio</th>
								<th>Fecha de vencimiento</th>
								
								@foreach($examenes as $examen)
								<tr>
									<td>{{$examen->materia->name}}</td>
									
									<td>
										
										@if((date('Y-m-d') >= $examen->fecha) && ( date('Y-m-d') <= $examen->fechaF))
											
											<a href="{{ route('realizarExamen', $examen)}}" class="btn btn-primary">Realizar Examen</a>

											@else

											<a href="#" class="btn btn-danger">Fecha vencida</a>

										@endif
										
									</td>
									<td>{{$examen->fecha}}</td>
									<td>{{$examen->fechaF}}</td>
									
								</tr>
								@endforeach
							</thead>
						</table>
						<a href="{{ route('menu')}}" class="btn btn-warning">Menu Principal</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop