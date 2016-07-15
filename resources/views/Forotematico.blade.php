@extends('template.Maestro')


@section('content')

<div class="header"></div>

@include('include.menumaestro')

<h1 align="center"  id="principal-maestro">Foro Tematico</h1>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body ">
					
					@include('include.buscarpreguntas', ['submitButtonText' => 'Buscar'])
					@include('errors.session')
					@foreach ($comentarios as $comentario)

					<article>
							<hr>
							<h3 class="optimal"><i class="fa fa-user"></i> {{ $comentario->users->name}} :</h3>
							<p><i class="fa fa-calendar-o"></i> {{ $comentario->created_at->format('d/m/y - h:ia') }}</p>
							<p class="optimal"><i class="fa fa-comment"></i> {{ $comentario->comment }}</p>
							
							@if($comentario->link)

							<div class="body">
							<a href="{{ $comentario->link }}" target="_blank"><i class="fa fa-circle-o-notch fa-spin"></i>	 {{ $comentario->link }}</a>
							</div>

							@endif
					</article>

					@endforeach

					{!! Form::open(['route' => 'prealm.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}


										@include('errors.error')
															
										{!! Form::label('comment', 'Comentario')!!}
										{!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Nuevo comentario']) !!}

																
										{!! Form::label('link', 'Enlace')!!}
										{!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Si tienes un enlace colocalo aqui'])!!}

									   <hr>
									   {!! Form::submit('Comentar', ['class' => 'btn btn-default']) !!}


									{!! Form::close() !!}

				</div>
				
			</div>
			{!! $comentarios->render() !!}
		</div>
	
	</div>

</div>


@stop