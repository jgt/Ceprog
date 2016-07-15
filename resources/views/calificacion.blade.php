@extends('template.Maestro')

@section('content')

<div class="header"></div>

<h1 align="center"  id="principal-maestro">Calificación de la actividad {{$archivo->actividad->actividad}}</h1>

	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">

						@include('errors.error')


			@foreach($archivo->users as $user)

				@if(! $user->hasNota($user, $archivo->actividad))	

			{!! Form::open(['route' => ['nota', $archivo], 'method' => 'POST']) !!}

				{!! Form::label('user_id', 'Alumno: ')!!}

				{!! Form::select('user_id', [$user->id => $user->name], null, ['class' => 'form-control'])!!}

				<br>	

				{!! Form::label('actividad_id', 'Actividad: ')!!}

				{!! Form::select('actividad_id', [$archivo->actividad->id => $archivo->actividad->actividad], null, ['class' => 'form-control'])!!}
					
				

					<br><br>

					<table class="table table-bordered">
			
		<tr>
			
			@foreach($archivo->actividad->rubricas as $rubrica)
						
						<td>{{ $rubrica->name }}  ({{ $rubrica->total}}%) <td>{!! Form::text('rubrica_'.$rubrica->id, null, ['class' => 'rubrica form-control']) !!}</td></td>


				@endforeach
						

	
		</tr>
			
			<tr>
					
					
					<td>Nota <td>{!! Form::text('promedio', null, ['id' => 'total', 'class' => 'form-control'])!!}</td></td>
				
					<td><button type="button" id="nota" name="nota" class="btn btn-success" >Calcular</button></td>

					<td>{!! Form::submit('Guardar Nota', ['class' => 'btn btn-info'])!!}</td>
					<td><a href="{{ route('verArchivos', $archivo->actividad)}}" class="btn btn-warning">Retroceder</a></td>

			</tr>
			
			
	</table>

	{!! Form::close()!!}

	@else
		
		<p>Este usuario ya tiene una nota.</p>

		@endif

		@endforeach
				</div>
			</div>
			
		</div>
	</div>
</div>

@stop

 @section('footer')
	
	@include('script.suma')
	
    @stop



