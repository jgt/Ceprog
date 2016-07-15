<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="panel-body">
						<div class="form-group">
	
						@include('errors.error')

					{!! Form::label('name', 'Nombre del Profesor: ', ['class' => 'control-label col-xs-2']) !!}

					<div class="col-lg-10">
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>

					</div>
					
					<div class="form-group">

						{!! Form::label('mensaje', 'Nombre de actividad: ', ['class' => 'control-label col-xs-2']) !!}

						<div class="col-lg-10">
							{!! Form::text('mensaje', null, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						
						{!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'control-label col-xs-2']) !!}

						<div class="col-lg-10">
							{!! Form::file('archivo', null, ['class' => 'form-control']) !!}
						</div>

					</div>

					<div class="form-group">

  					 {!! Form::label('user_list', 'Estudiante : ', ['class' => 'control-label col-xs-2']) !!}

      					 <div class="col-lg-10">
   					{!! Form::select('user_list[]', $users, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
   					<hr>
   					 {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
   						 </div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

    

    </div>



    @section('footer')
	
	@include('script.select')
	
    @stop