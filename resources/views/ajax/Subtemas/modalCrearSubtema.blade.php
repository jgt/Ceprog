 <div Style="display:none" id="crtSub" class="col-md-8 col-md-offset-1">
      
    {!! Form::open(['route' => 'storeSubtemas', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'create-formSubt']) !!}
  
   <div class="form-group">
  {!! Form::label('unidad_id', 'Unidad ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
  <div class="col-xs-9">
    {!! Form::text('unidad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'createSubt']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('subtemas', 'SubTemas: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('subtemas', null, ['class' => 'form-control', 'id' => 'subtemaCreate']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
      {!! Form::textarea('descripcion', null, ['class' => 'form-control ckeditor',  'rows' => '3', 'id' => 'createDesc']) !!}
   </div>
  </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Crear', ['class' => 'btn btn-success', 'id' => 'crsubt']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>