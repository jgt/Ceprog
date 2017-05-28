{!! Form::open(['route' => 'almSem', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
	<div class="form-group">
								
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de usuario', 'id' => 'nombreUserAlm']) !!}

	</div>		

{!! Form::submit($submitButtonText, ['class' => 'btn btn-default', 'id' => 'bucAlm']) !!}
{!! Form::close() !!}