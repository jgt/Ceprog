
 <div Style="display:none" id="updateUser" class="col-md-8 col-md-offset-1">
      
  {!! Form::open(['route' => 'admin.update', 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formUpdate-user']) !!}
  
   <div class="form-group">
  {!! Form::label('name', 'Nombre:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameUpdate']) !!}
   <input type="text" id="udpUser" Style="display:none">
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'cuentaUpdate']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('password', 'Password:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
      {!! Form::password('password', ['class' => 'form-control', 'id' => 'passwordUpdate']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('role_list', 'Lista de Roles: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
      <ul id="rolesUser" style="list-style-type: none;"></ul>
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('semestre_list', 'Lista de semestre:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <ul id="userSemestres" style="list-style-type: none;"></ul>
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('materia_list', 'Lista de materias:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     <ul id="userMaterias" style="list-style-type: none;"></ul>
  </div>
  </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Editar', ['class' => 'btn btn-success', 'id' => 'usrEdi']) !!}
            <a href="#" id="backListPersonal" class="btn btn-warning">Regresar</a>
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>