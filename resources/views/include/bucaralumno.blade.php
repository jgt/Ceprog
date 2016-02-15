{!! Form::model(Request::all(), ['route' => 'email.show', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de usuario']) !!}

							</div>		

							{!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}

						{!! Form::close() !!}
