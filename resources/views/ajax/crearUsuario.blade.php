 <div Style="display:none" id="user" class="col-md-10 col-md-offset-1">
      
  
  <h2 align="center"> Crear Usuarios</h2>
  <hr>
  {!! Form::open(['route' => 'admin.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-create']) !!}

  
   <div class="form-group">
  {!! Form::label('name', 'Nombre: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'form', 'placeholder' => 'Nombre']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('cuenta', 'Cuenta: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'form', 'placeholder' => 'Cuenta']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('password', 'Contraseña: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::password('password', null, ['class' => 'form-control', 'id' => 'form']) !!}
   </div>
  </div>
  
   <div class="form-group">
  {!! Form::label('role_list', 'Rol:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <select name="role_list[]" id="roleSelect" class="form-control"></select>
   </div>
  </div>
    <div class="form-group" Style="diplay:none" id="userCarr">
  {!! Form::label('carrera_list', 'Carrera:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <select name="carrera_list[]" class="form-control" id="crrs"></select>
   </div>
  </div>
  <div class="form-group" Style="diplay:none" id="userSem">
  {!! Form::label('semestre_list', 'Semestre: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <select name="semestre_list[]" class="form-control" id="smes"></select>
   </div>
  </div>
 
  <div class="form-group" Style="diplay:none" id="userMat">
  {!! Form::label('materia', 'Materia: ', ['class' => 'control-label col-xs-3'])!!}
  <div class="col-xs-9">
     <select name="materia_list[]" class="form-control" id="mtausr" style="width:560px" multiple></select>
  </div>
  </div>
  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
             {!! Form::submit('Crear', ['class' => 'btn btn-default', 'id' => 'submit']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>