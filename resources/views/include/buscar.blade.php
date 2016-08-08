{!! Form::model(Request::all(), ['route' => 'buscarUser', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search', 'id' => 'formFindUser']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre completo', 'id' => 'nameUser']) !!}

								{!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'modelo', 'placeholder' => 'numero de cuenta']) !!}

							</div>		

							{!! Form::submit($submitButtonText, ['class' => 'btn btn-default', 'id' => 'findUser']) !!}

						{!! Form::close() !!}
