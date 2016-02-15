@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Editar Rubrica</h1>
	
{!! Form::model($rubrica, ['route' => ['updaterubrica', $rubrica], 'method' => 'POST', 'class' => 'form-group']) !!}
	
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
   {!! Form::select('actividad_id', [ $rubrica->actividad->id => $rubrica->actividad->actividad], null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('total', 'Porcentaje  ', ['class' => 'form-group']) !!}
   {!! Form::text('total', null, ['class' => 'form-group']) !!}
	</div>
	
	
   <div class="form-group">
		{!! Form::submit('Editar', ['class' => 'btn btn-default', 'id' => 'crear']) !!}	
		<a href="{{ route('listrubrica')}}" class="btn btn-warning">Retroceder</a>

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

 

<div class="col-xs-offset-2 col-xs-10">


    </div>


    @section('footer')
	
	@include('script.select')
	
    @stop