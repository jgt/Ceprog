{!! Form::model(Request::all(), ['route' => 'buscarUser', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search', 'id' => 'formFindUser']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de usuario', 'id' => 'nameUser']) !!}

							</div>		

							{!! Form::submit($submitButtonText, ['class' => 'btn btn-default', 'id' => 'findUser']) !!}

						{!! Form::close() !!}
