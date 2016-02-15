@extends('template.Maestro')


@section('content')

<div id="comentario"></div>

<div id="nuevoC">
<div class="header"></div>
<h1 align="center"  id="principal-maestro">{{ $foro->title}}</h1>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body ">
					
					@include('include.buscarpreguntas', ['submitButtonText' => 'Buscar'])
					@include('errors.session')
					@foreach ($comentarios as $comentario)
							
							<hr>
							<h3 class="optimal"><i class="fa fa-user"></i> {{ $comentario->users->name}}</h3>
							<p><i class="fa fa-calendar-o"></i> {{ $comentario->created_at->format('d/m/y - h:ia') }}</p>
							<p class="optimal"><i class="fa fa-comment"></i> {{ $comentario->comment }}</p>
							
							@if($comentario->link)

							<div class="body">
							<a href="{{ $comentario->link }}" target="_blank"><i class="fa fa-circle-o-notch fa-spin"></i>{{ $comentario->link }}</a>

							</div>
							<hr>


							@endif
					
					@endforeach

					{!! Form::open(['route' => ['preguntas', $foro->id], 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'formulario']) !!}

								
										@include('errors.error')
										
										{!! Form::label('comment', 'Comentario')!!}
										{!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Nuevo comentario', 'id' => 'publicacion']) !!}

																
										{!! Form::label('link', 'Enlace')!!}
										{!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Si tienes un enlace colocalo aqui', 'id' => 'publicacion'])!!}

									   <hr>
									   <div id="canvasloader-container" class="wrapper"></div>
									   {!! Form::submit('Comentar', ['class' => 'btn btn-default', 'id' => 'comentar']) !!}
									   <a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>


									{!! Form::close() !!}

				</div>
				
			</div>
			{!! $comentarios->render() !!}
		</div>
	
	</div>

</div>
</div>
@stop


@section('scripts')

@include('script.foro')

@stop
