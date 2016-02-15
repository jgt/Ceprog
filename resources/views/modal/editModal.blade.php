
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Registro</h4>
      </div>
      <div class="modal-body">
    
  <div class="form-group">
    <input type="hidden" id="id">
  {!! Form::open(['url' => '', 'id' => 'form', 'method' => 'PUT'])!!}
        
  {!! Form::label('name', 'Nombre:') !!}

  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
  
  {!! Form::label('cuenta', 'Numero de cuenta:') !!}

  {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'cuenta']) !!}
 
  {!! Form::label('password', 'Password:') !!}

  {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}

   {!! Form::label('carreras', 'Carreras:') !!}

  {!! Form::select('carreras', [], null, ['class' => 'form-control', 'id' => 'carreras'])!!}

   {!! Form::label('semestres', 'Semestres:') !!}

  {!! Form::select('semestres', [], null, ['class' => 'form-control', 'id' => 'semestres'])!!}

   {!! Form::label('materias', 'Materias:') !!}

  {!! Form::select('materias', [], null, ['class' => 'form-control', 'id' => 'materias'])!!}

  {!! Form::label('roles', 'Role:') !!}

  {!! Form::select('roles', [], null, ['class' => 'form-control', 'id' => 'roles'])!!}

  {!! Form::close()!!}

  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="#" class="btn btn-primary" id="actualizar">Actualizar</a>
      </div>
    </div>
  </div>
</div>