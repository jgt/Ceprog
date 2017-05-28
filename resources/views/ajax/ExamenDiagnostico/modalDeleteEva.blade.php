<div id="forceEva" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Borrar Examen</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'deleteEva', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forceEva']) !!}
  
        <h3><strong>Seguro quieres borrar este examen?</strong></h3><p>Una vez borrado de esta forma no se podra restaurar ningun dato del examen.</p>
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'dltEva'])!!}

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="crt-forceEva">Borrar</a>
      </div>
    </div>

  </div>
</div>