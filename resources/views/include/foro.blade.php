<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('title', 'Titulo:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-md-10">
	{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Crea un nuevo foro']) !!}
	</div>

	</div>

	<div class="form-group">
		

		{!! Form::label('materia_id', 'Materia :', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-md-10">
		{!! Form::select('materia_id', $materias, null, [ 'id' => 'materia_list', 'class' => 'form-control', 'multiple']) !!}
		<hr>
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
		<a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>

		</div>

	</div>

				</div>
			</div>
		</div>
	</div>
</div>


     @section('footer')

	@include('script.select')

    @stop
