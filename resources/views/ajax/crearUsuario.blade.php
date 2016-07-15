 <div id="user" Style="display:none">
 
        <a href="{{ route('admin.create')}}" id="adminCrt" Style="display:none"></a>

        {!! Form::open(['route' => 'admin.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-create']) !!}
  				 <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
           <div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1" id="user">
			<div class="panel panel-default" id="usuario">
				<div class="panel-heading"></div>

				<div class="panel-body">


			<div class="form-group">

			@include('errors.error')

			<label name="name" class="control-label col-xs-2">Nombre:</label>
	
		<div class="col-lg-10">

			<input type="text" name="name" class="form-control" id="form">
	
		</div>

	</div>

	<div class="form-group">
	
	<label for="cuenta" class="col-lg-2 control-label">Cuenta</label>

	<div class="col-lg-10">

	<input type="text" name="cuenta" class="form-control" id="form">

	</div>


	</div>
	
	<div class="form-group">
	
	<label for="password" class="col-lg-2 control-label">Contraseña</label>
	
	<div class="col-lg-10">

	<input type="password" name="password" class="form-control" id="form">

	</div>

	</div>

	<div class="form-group">

   		<label name="role_list" class="col-lg-2 control-label">Rol</label>

       <div class="col-lg-10">
  	
  		<select name="role_list[]" id="roleSelect" class="form-control"></select>
   
    </div>


</div>

	<div class="form-group" Style="diplay:none" id="userCarr">
	
	<label name="carrera_list" class="col-lg-2 control-label">Carrera</label>

	<div class="col-lg-10">
	<select name="carrera_list[]" class="form-control" id="crrs"></select>
	</div>

	</div>

	<div class="form-group" Style="diplay:none" id="userSem">
	
	<label name="semestre_list" class="col-lg-2 control-label">Semestre</label>

	<div class="col-lg-10">
		<select name="semestre_list[]" class="form-control" id="smes"></select>

	</div>

	</div>

	<div class="form-group" Style="diplay:none" id="userMat">
	
	<label name="materia" class="col-lg-2 control-label">Materias</label>

	<div class="col-lg-10">
		<select name="materia_list[]" class="form-control" id="mtausr"></select>
	</div>

	</div>

	<hr>	
  	<div id="canvasloader-container" class="wrapper"></div>
    {!! Form::submit('Crear', ['class' => 'btn btn-default', 'id' => 'submit']) !!}
	</div>
			</div>
		</div>
	</div>
</div>

  

        {!! Form::close() !!}

     </div>