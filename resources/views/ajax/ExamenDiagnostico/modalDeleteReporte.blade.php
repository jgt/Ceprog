<div id="forceReport" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Borrar Reporte</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'borrarReporte', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forceRpt']) !!}
  
        <h3><strong>Seguro quieres borrar este reporte?</strong></h3><p>Una vez borrado de esta forma no se podra restaurar ningun dato del reporte.</p>
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'dltRpt'])!!}
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'dltUser'])!!}

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="crt-forceRpt">Borrar</a>
      </div>
    </div>

  </div>
</div>