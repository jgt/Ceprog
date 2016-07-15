<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar permiso</div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')
	
	{!! Form::label('name', 'Nombre:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('slug', 'Slug:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
	</div>


	</div>
	

	<div class="form-group">

   {!! Form::label('user_list', 'Usuarios : ', ['class' => 'control-label col-xs-2']) !!}

       <div class="col-lg-10">
   {!! Form::select('user_list[]', $user, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>
</div>

	
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}

    </div>


    @section('footer')

	@include('script.select')

    @stop