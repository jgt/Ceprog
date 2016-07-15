@extends('template.Maestro')

@section('content')

<div class="header-admin"></div>

<h2 class="tamaños" id="color-letra" align="center">Materia : {{$actividad->materia->name}}</h2>
<h3 align="center" id="color-letra">Rellena los campos solicitados para crear rubricas de la actividad	 {{$actividad->actividad}}</h3>
<hr>
	
{!! Form::open(['route' => 'storeRubrica', 'method' => 'POST', 'class' => 'form-group']) !!}

	<div class="container">
		<div class="row">

			<div class="col-md-4 col-md-offset-1">
				<div class="panel panel-default">
					 <div class="panel-heading"></div>
					 <div class="panel-body">

	@include('errors.error')
	<div class="form-group">
	{!! Form::label('name', 'Nombre de la rubrica ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control']) !!}
   </div>

	<div class="form-group">
	{!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
	</div>
	
	<div class="form-group">
	{!! Form::label('actividad_id', 'Nombre de la actividad  ', ['class' => 'form-group']) !!}
   {!! Form::select('actividad_id', [ $actividad->id => $actividad->actividad], null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Nrubrica', 'Rubricas de la actividad  ', ['class' => 'form-group']) !!}
   {!! Form::select('Nrubrica', [$rubricas], null, ['class' => 'form-group', 'disabled']) !!}
	</div>
 
	<div class="form-group">
	{!! Form::label('total', 'Porcentaje  ', ['class' => 'form-group']) !!}
   {!! Form::text('total', null, ['class' => 'form-group']) !!}
	</div>
	
	
   <div class="form-group">
		{!! Form::text('rubrica', $rubricas, ['class' => 'alert'])!!}
		{!! Form::submit('Crear rubrica', ['class' => 'btn btn-default', 'id' => 'crear']) !!}	
		<a href="{{ route('menu')}}" class="alert btn btn-warning" id="finalizar">Finalizar</a>

	</div>
   
					 	</div>
					 </div>
				</div>

				<div class="col-md-4 col-md-offset-1">

					<h2 class="tamaños" id="color-letra" align="center">Material de Ayuda!!</h2>
					<hr>
					<ul>
						<li><p id="color-letra">Una vez creada la actividad rellenaras los datos de la rubricas que aparece en pantalla.</p></li>
						<li><p id="color-letra">Las actividades solo puden tener un maximo de 5 rubricas y un minimo de 3 rubricas.</p></li>
						<li><p id="color-letra">Si la actividad no tiene rubricas solo podras ver un boton con nombre <span>Crear Rubricas</span>, cuando creas un minimo de 3 rubricas apecera el boton Finalizar ese boton te retorna al menu principal.</p></li>
					</ul>

				</div>

			</div>
		</div>

	{!! Form::close() !!}

    @section('footer')
	
	@include('script.select')
	
    @stop


    @section('scripts')
	
	<script>

	$(document).on('ready', function(){

		var rubricas = $('.alert').val();

		if(rubricas>=5)
		{
			$('#crear').removeClass('btn btn-default');
			$('#crear').addClass('alert');
			$('#finalizar').removeClass('alert');
		}else if(rubricas >=3)
		{

			$('#crear').removeClass('alert');
			$('#crear').addClass('btn btn-default');
			$('#finalizar').removeClass('alert');

		}
	});


	</script>

    @stop