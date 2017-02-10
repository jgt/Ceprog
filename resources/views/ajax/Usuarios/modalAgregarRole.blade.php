<div id="agreeRole" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Role</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'agregarRole', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forceRole']) !!}
        
        <div class="form-group">
      {!! Form::label('name', 'Nombre:', ['class' => 'form-group']) !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'agreeNameRole', 'readonly' => 'readonly']) !!}

      <input type="text" id="udpUserRole" Style="display:none">
      </div>

        <div class="form-group">
      {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'form-group']) !!}
      {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'agreeCuentaRole', 'readonly' => 'readonly']) !!}
      </div>

       <div class="form-group">
      {!! Form::label('role_list', 'Elige un Role:', ['class' => 'form-group']) !!}
      {!! Form::select('role_list[]', [], null, ['class' => 'form-control', 'id' => 'role_list', 'multiple', 'style' => 'width:570px']) !!}
      </div>
            

        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-success" id="crt-forceRole">Agregar</a>
      </div>
    </div>

  </div>
</div>