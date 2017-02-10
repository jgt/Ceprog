<div id="agreeMateria" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Materia</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'attachMaterias', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forceMateria']) !!}
        
        <div class="form-group">
      {!! Form::label('name', 'Nombre:', ['class' => 'form-group']) !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'agreeNameMateria', 'readonly' => 'readonly']) !!}

      <input type="text" id="udpUserMateria" Style="display:none">
      </div>

        <div class="form-group">
      {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'form-group']) !!}
      {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'agreeCuentaMateria', 'readonly' => 'readonly']) !!}
      </div>

      <div class="form-group">
      {!! Form::label('matProg', 'Elige una Materia:', ['class' => 'form-group']) !!}
      {!! Form::select('matProg[]', [], null, ['class' => 'form-control', 'id' => 'matProg', 'multiple', 'style' => 'width:570px']) !!}
      </div>
            

        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-success" id="crt-forceMateria">Agregar</a>
      </div>
    </div>

  </div>
</div>