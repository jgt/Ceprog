 <div Style="display:none" id="videoUnidad" class="col-md-8 col-md-offset-1">
      
    {!! Form::open(['route' => 'storeSubir', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'my-videoUnidad', 'files' => true]) !!}
  
   <div class="form-group">
  {!! Form::label('unidad_id', 'Unidad ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
  <div class="col-xs-9">
   {!! Form::text('unidad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'viduni']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('unidad', 'Unidad: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
   {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'namUnidad', 'readonly' => 'readonly']) !!}
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
            {!! Form::submit('Subir video', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'Vimg'])!!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>