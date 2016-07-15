@extends('template.Maestro')

@section('content')
	
	<div class="header"></div>
		
<h1 align="center"  id="principal-maestro">Archivos de {{$materia->name}}</h1>

	<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Videos</div>

				<div class="panel-body">

						
							{!! Form::open(['route' => ['storeSubir', $materia], 'method' => 'POST', 'class' => 'dropzone', 'id' => 'my-dropzone', 'files' => true]) !!}
							
							<div class="dz-message">
								
								Sube tus trabajos/videos aqui <br>
			
							</div>

							<div class="dropzone-previews"></div>

							{!! Form::submit('Enviar archivos', ['class' => 'btn btn-success', 'id' => 'submit-all']) !!}
							<a href="{{ route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
							


						{!! Form::close() !!}
			
				</div>
			</div>
			
		</div>
		<div class="col-md-4 col-md-offset-1">
			 <h2 class="tamaños" id="color-letra" align="center">Recomendaciones!!</h2>
          <hr>
          <ul>
            <li><p id="color-letra">Para subir un archivo de la materia {{$materia->name}}, solo tenemos que dar clic en el cuadro donde dice videos.</p></li>
            <li><p id="color-letra">selecionamos seleccionamos el archivo y le damos clic en enviar archivos.</p></li>
            <li><p id="color-letra">para verificar si el archivo se ha subido sactifactoriamente puedes dar clic <a href="{{ route('allVideos', $materia)}}">Aqui</a> o ir al menu principal en el apartado consultas luego dar clic en archivos.</li>
          </ul>
		</div>
	</div>
</div>

@stop

@section('scripts')


@include('script.dropzone')

@stop


