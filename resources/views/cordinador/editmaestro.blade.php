<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('name', 'Nombre ', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('cuenta', 'Cuenta ', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('cuenta', null, ['class' => 'form-control']) !!}
	</div>


	</div>
	
	<div class="form-group">
	
	{!! Form::label('password', 'Password ', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">

   {!! Form::label('materia_list', 'Materia ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('materia_list[]', $materias, null, [ 'id' => 'materia_list', 'class' => 'form-control', 'multiple']) !!}
    <hr>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    <a href="{{route('cordinador.index')}}" class="btn btn-warning">Retroceder</a>
    </div>
</div>

	
				</div>
			</div>
		</div>
		 <div class="col-md-4 col-md-offset-1">

          <h2 class="tamaños" id="color-letra" align="center">Tips!!</h2>
          <hr>
          <ul>
            <li><p id="color-letra">Puedes editar los datos del maestro con el siguiente formulario.</p></li>
            <li><p id="color-letra">La informacion que edites es la que el maestro tendra hasta que se vuelva editar.</p></li>
            <li><p id="color-letra">Puedes editar un maestro las veces que puedas sin ningun limite.</p></li>
          </ul>
        </div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10"></div>


    @section('footer')

	@include('script.select')

    @stop