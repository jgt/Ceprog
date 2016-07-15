{!! Form::model(Request::all(), ['route' => 'almSem', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
							
							<div class="form-group">
								
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre de usuario', 'id' => 'mierda']) !!}

							</div>		

							{!! Form::submit($submitButtonText, ['class' => 'btn btn-default', 'id' => 'almSearch']) !!}

						{!! Form::close() !!}
