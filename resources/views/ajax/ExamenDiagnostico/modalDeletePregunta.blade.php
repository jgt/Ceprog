<div id="forcePreg" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Borrar Pregunta</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'deletePeva', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-forcePregunta']) !!}
  
        <h3><strong>Seguro quieres borrar esta pregunta?</strong></h3><p>Una vez borrado de esta forma no se podra restaurar ningun dato de la pregunta.</p>
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'dltPregunta'])!!}

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="crt-forcePregunta">Borrar</a>
      </div>
    </div>

  </div>
</div>