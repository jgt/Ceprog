 <div id="user" class="col-md-10 col-md-offset-1 alert">
 
        
        {!! Form::open(['route' => 'admin.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-create']) !!}
  
           <div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1" id="user">
			<div class="panel panel-default" id="usuario">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')

	
	{!! Form::label('name', 'Nombre:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'form']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'form']) !!}
	</div>


	</div>
	
	<div class="form-group">
	
	{!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::password('password', ['class' => 'form-control', 'id' => 'form']) !!}
	</div>

	</div>


<div class="form-group">

   {!! Form::label('role_list', 'Grupo : ', ['class' => 'col-lg-2 control-label']) !!}

       <div class="col-lg-10">
   {!! Form::select('role_list[]', $roles, null, ['class' => 'form-control']) !!}
   <hr>
  	
  	<div id="canvasloader-container" class="wrapper"></div>
    {!! Form::submit('Crear', ['class' => 'btn btn-default', 'id' => 'submit']) !!}
    </div>


</div>
				</div>
			</div>
		</div>
	</div>
</div>

  

        {!! Form::close() !!}

     </div>