@extends('template.alumno')


@section('content')

<div class="header"></div>

@include('include.menualumnos')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1 align="center"  id="principal-maestro">Bandeja de entrada</h1>

			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
				
 					<h4>De : {{ $mensajes->name }}</h4>
 					<h4>Mensaje : {{ $mensajes->mensaje}}</h4>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
