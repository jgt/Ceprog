@extends('template.alumno')


@section('content')

<div class="header"></div>

@include('include.menualumnos')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Temas academicos</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body optimal">
						
					@foreach ($temas as $tema)

					<article>
							
							<h2 align="center">{{ $tema->tema }}</h2>
							<hr>

							<div class="body">
								
								<p class="parrafos-home">{{ $tema->body }}</p>

							</div>

					</article>

					@endforeach
					
				</div>
			</div>
			{{$temas->render()}}
		</div>

	</div>
</div>

@endsection

