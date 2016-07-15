@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>
		
<h1 align="center"  id="principal-maestro">Tutoriales</h1>

	<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tutorial</div>

				<div class="panel-body">

						
							{!! Form::open(['route' => 'storeTutorial', 'method' => 'POST', 'class' => 'dropzone', 'id' => 'my-dropzone', 'files' => true]) !!}
							
							<div class="dz-message">
								
								Sube tus Tutoriales aqui <br>
			
							</div>

							<div class="dropzone-previews"></div>

							{!! Form::submit('Subir archivos', ['class' => 'btn btn-success', 'id' => 'submit-all']) !!}
							<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
							


						{!! Form::close() !!}
			
				</div>
			</div>
			
		</div>
		<div class="col-md-4 col-md-offset-1">
			 <h2 class="tamaños" id="color-letra" align="center">Tips!!</h2>
          <hr>
          <ul>
            <li><p id="color-letra">Para subir un video tutorial  solo tenemos que dar clic en el cuadro donde dice tutoriales.</p></li>
            <li><p id="color-letra">selecionamos seleccionamos el archivo y le damos clic en subir archivos.</p></li>
          </ul>
		</div>
	</div>
</div>

@stop

@section('scripts')
	
	@include('script.dropzone')

@stop
