<div id="agreePrograma" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Programa</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'attachPrograma', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forcePrograma']) !!}
        
        <div class="form-group">
      {!! Form::label('name', 'Nombre:', ['class' => 'form-group']) !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'agreeNamePrograma', 'readonly' => 'readonly']) !!}

      <input type="text" id="udpUserPrograma" Style="display:none">
      </div>

        <div class="form-group">
      {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'form-group']) !!}
      {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'agreeCuentaPrograma', 'readonly' => 'readonly']) !!}
      </div>

       <div class="form-group">
      {!! Form::label('carr', 'Elige un Plan de estudios:', ['class' => 'form-group']) !!}
      {!! Form::select('carr', [], null, ['class' => 'form-control', 'id' => 'carr_list', 'style' => 'width:570px']) !!}
      </div>


      <div class="form-group">
      {!! Form::label('semProg', 'Elige el semestre del programa:', ['class' => 'form-group']) !!}
      {!! Form::select('semProg[]', [], null, ['class' => 'form-control', 'id' => 'semProg', 'multiple', 'style' => 'width:570px']) !!}
      </div>
            

        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-success" id="crt-forcePrograma">Agregar</a>
      </div>
    </div>

  </div>
</div>