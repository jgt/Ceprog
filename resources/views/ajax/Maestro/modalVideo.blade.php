<div id="vdoUplMaestro" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          {!! Form::open(['route' => 'uploadsVideo', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'my-vdoUnidad', 'files' => true]) !!}
  
           <div class="form-group">
          {!! Form::label('unidad_id', 'Unidad ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
          <div class="col-xs-9">
           {!! Form::text('unidad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'viduniMaestro']) !!}
          </div>
           </div>
          <div class="form-group">
          {!! Form::label('unidad', 'Paquete: ', ['class' => 'control-label col-xs-3']) !!}
          <div class="col-xs-9">
           {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'namUnidadMaestro', 'readonly' => 'readonly']) !!}
          </div>
          </div>
           <div class="form-group">
          {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'control-label col-xs-3']) !!}
           <div class="col-xs-9">
              {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'fileVideoDocente'])!!}
           </div>
          </div>

        <div class="form-group">
              <div class="col-xs-offset-3 col-xs-9">
                  {!! Form::submit('Subir video', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'vdoPrf'])!!}
              </div>
          </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>