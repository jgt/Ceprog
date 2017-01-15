<div id="borrarPlc" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Planeacion</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'borrarPlc', 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-deletePlc']) !!}
  
        <h3><strong>Seguro quieres eliminar este archivo?</strong></h3><p>Una vez eliminado ya no podra recuperar el archivo</p>
        {!! Form::text('id', null, ['style' => 'display:none', 'id' => 'idDeletePlc'])!!}

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="crt-deletePlc">Eliminar</a>
      </div>
    </div>

  </div>
</div>