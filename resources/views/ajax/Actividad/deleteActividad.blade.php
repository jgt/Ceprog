<div id="dltAct" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Borrar Actividad</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => ['deleteActividad', null], 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forceAct']) !!}
  
        <h3><strong>Seguro quieres borrar esta actividad?</strong></h3>
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'idActdelete'])!!}

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="crt-forceAct">Borrar</a>
      </div>
    </div>

  </div>
</div>