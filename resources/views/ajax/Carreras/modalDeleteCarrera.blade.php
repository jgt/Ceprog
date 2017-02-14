<div id="forcedltCarrera" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Borrar Programa</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'deleteCarrera', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forceCarrera']) !!}
  
        <h3><strong>Seguro quieres borrar este programa?</strong></h3><p>Una vez borrado de esta forma no se podra restaurar ningun dato del programa.</p>
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'idForceCarrera'])!!}

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="crt-forceCarrera">Borrar</a>
      </div>
    </div>

  </div>
</div>