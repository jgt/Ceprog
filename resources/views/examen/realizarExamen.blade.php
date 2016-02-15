@extends('template.Maestro')

@section('content')

	<div class="header-admin"></div>

	<h2 class="tamaños" id="color-letra" align="center"></h2>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						@if($preguntaNext)
						{!! Form::open(['route' => ['resultadoExamen', $examen], 'method' => 'POST'])!!}
						{!! Form::text('examen_id', $examen->id, ['class' => 'alert'])!!}

								@foreach($preguntaNext as $pregunta)
									
									<p>{{$pregunta->contenido}}</p>

									<hr>
										<input type="hidden" name="pregunta_id" value="{{$pregunta->id}}"> 
									@foreach($pregunta->respuestas as $respuesta)
										
										
										<ul class="examen">
											<li>
												
												{!! Form::radio('respuesta', $respuesta->id)!!}
												{!! Form::label('respuesta', $respuesta->name)!!}
											</li>
										</ul>
									
									@endforeach	
								@endforeach
									
								{!! Form::submit('Siguiente', ['class' => 'btn btn-default'])!!}
								{!! $preguntaNext->render()!!}
						{!! Form::close()!!}
						@endif
					

							@if(! $preguntaNext)
			
							{!! Form::open(['route' => ['terminarExamen', $examen], 'method' => 'POST', 'id' => 'exForm'])!!}
							
							{!! Form::text('resultado', $nota, ['class' => 'alert', 'id' => 'ntEx'])!!}
							{!! Form::text('examen_id', $examen->id, ['class' => 'alert'])!!}
							{!! Form::text('user_id', Auth::user()->id, ['class' => 'alert'])!!}

							@if($examen->hasResultado(Auth::user(), $examen))
								
								<p>Este examen ya tiene una nota para este usuario.</p>

							@else

							{!! Form::submit('Finalizar Examen', ['class' => 'btn btn-default', 'id' => 'FinEx'])!!}
 
							@endif
							{!! Form::close()!!}
						
						@endif
						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>

@stop


@section('scripts')

<script>
	
	$(document).on('ready', function(){

		$('#FinEx').on('click', function(e){

			e.preventDefault();
			var form = $('#exForm');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					var nota = $('input#ntEx').val();
					alertify.alert('Tu examen ha finalizado, tu calificacion es de: '+nota);
					$('#FinEx').addClass('alert');

				},

				error:function(resp){

					if(resp == 'timeout')
					{
						alertify.alert('El examen no puedo finalizarce correctamente debido a un problema con su internet.');
					}

				}

			});

		});

	});


</script>

@stop