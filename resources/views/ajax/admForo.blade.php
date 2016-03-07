<div id="admForo" class="col-md-10 col-md-offset-1 alert">
 	
        
        {!! Form::open(['route' => 'foro.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-createForo']) !!}
  
           <div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default" id="usuario">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')

	
	{!! Form::label('title', 'Titulo:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('title', null, ['class' => 'form-control', 'id' => 'form']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('materia_id', 'Materia :', ['class' => 'control-label col-xs-2']) !!}
	<div class="col-lg-10">
	{!! Form::select('materia_id', $materiasForo, null, ['class' => 'form-control']) !!}
		<hr>
		{!! Form::submit('Crear foro', ['class' => 'btn btn-default', 'id' => 'admForoCrt']) !!}
	</div>


	</div>
	
	</div>
			</div>
		</div>
	</div>
</div>

  

        {!! Form::close() !!}

     </div>