@extends('template.Maestro')

@section('content')

<div class="header-admin"></div>

<h2 class="tamaños" id="color-letra" align="center">Materia : {{$materia->name}}</h2>
<h3 class="tamaños" id="color-letra" align="center">Evaluacion Ordinaria</h3>
<hr>
	
{!! Form::open(['route' => 'storeExamen', 'method' => 'POST', 'class' => 'form-group']) !!}

	<div class="container">
		<div class="row">

			<div class="col-md-4 col-md-offset-1">
				<div class="panel panel-default">
					 <div class="panel-heading"></div>
					 <div class="panel-body">

	@include('errors.error')
	<div class="form-group">
	{!! Form::label('materia_id', 'Materia ', ['class' => 'form-group']) !!}
   {!! Form::select('materia_id', [ $materia->id => $materia->name], null, ['class' => 'form-control']) !!}
   </div>

	<div class="form-group">
	{!! Form::label('catedratico', 'Catedratico ', ['class' => 'form-group']) !!}
   {!! Form::select('catedratico', [ Auth::user()->id => Auth::user()->name ], null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('modalidad', 'Modalidad ', ['class' => 'form-group']) !!}
   {!! Form::text('modalidad', null, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
	{!! Form::label('modulo', 'Modulo ', ['class' => 'form-group']) !!}
   {!! Form::text('modulo', null, ['class' => 'form-control']) !!}
   </div>
	
	<div class="form-group">
	{!! Form::label('fecha', 'Fecha de activacion ', ['class' => 'form-group']) !!}
   {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('fechaF', 'Fecha limite ', ['class' => 'form-group']) !!}
   {!! Form::date('fechaF', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('hora', 'Durcion del examen ', ['class' => 'form-group']) !!}
   {!! Form::time('hora', null, ['class' => 'form-control']) !!}
	</div>
 
	
   <div class="form-group">

		{!! Form::submit('Siguiente', ['class' => 'btn btn-default', 'id' => 'crear']) !!}	
		<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>
	
	</div>
   
					 	</div>
					 </div>
				</div>

				<div class="col-md-4 col-md-offset-1">

					<h2 class="tamaños" id="color-letra" align="center">Recomendaciones!!</h2>
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

