
<div id="updateUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       
       {!! Form::open(['route' => 'admin.update', 'method' => 'PUT', 'class' => 'form-group', 'id' => 'formUpdate-user']) !!}

  @include('errors.error')

   <div class="form-group">
  {!! Form::label('name', 'Nombre:', ['class' => 'form-group']) !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameUpdate']) !!}
  <input type="text" id="udpUser" class="alert">
   </div>

    <div class="form-group">
  {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'form-group']) !!}
  {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'cuentaUpdate']) !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('password', 'Password:', ['class' => 'form-group']) !!}
  {!! Form::password('password', ['class' => 'form-control', 'id' => 'passwordUpdate']) !!}
  </div>

   <div class="form-group">
    {!! Form::label('roles', 'Roles del usuario: ', ['class' => 'form-group']) !!}
    <ul id="rolesUser" style="list-style-type: none;"></ul>
  </div>

   <div class="form-group">
    {!! Form::label('carreras', 'Carreras del usuario: ', ['class' => 'form-group']) !!}
    <ul id="userCarreras" style="list-style-type: none;"></ul>
  </div>

   <div class="form-group">
    {!! Form::label('semestre', 'Semestres del usuario: ', ['class' => 'form-group']) !!}
    <ul id="userSemestres" style="list-style-type: none;"></ul>
  </div>


   <div class="form-group">
    {!! Form::label('materias', 'Materias del usuario: ', ['class' => 'form-group']) !!}
    <ul id="userMaterias" style="list-style-type: none;"></ul>
  </div>

  <hr>

  <div class="form-group" id="car_list">
      
 {!! Form::label('carrera_list', 'Lista de carreras:', ['class' => 'form-group']) !!}
  {!! Form::select('carrera_list[]', [], null, ['class' => 'form-control', 'id' => 'carrera_list', 'multiple']) !!}

  </div>

  <div class="form-group" id="sem_list">
  {!! Form::label('semestre_list', 'Lista de semestre:', ['class' => 'form-group']) !!}
  {!! Form::select('semestre_list[]', [], null, ['class' => 'form-control', 'id' => 'semestre_list', 'multiple']) !!}
  </div>

  <div class="form-group" id="mat_list">
  {!! Form::label('materia_list', 'Lista de materias:', ['class' => 'form-group']) !!}
  {!! Form::select('materia_list[]', [], null, ['class' => 'form-control', 'id' => 'materia_list', 'multiple']) !!}
  </div>

   <div class="form-group">
      {!! Form::label('role_list', 'Lista de Roles: ', ['class' => 'form-group']) !!}
     {!! Form::select('role_list[]', $roles, null, ['class' => 'form-control', 'id' => 'role_list', 'multiple']) !!}
   </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="usrEdi">Editar</a>
      </div>
    </div>
  </div>
</div>