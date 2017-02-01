<div id="modalUnidad" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Subtemas</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'storeSubtemas', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formT']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')
  <div class="form-group">
  {!! Form::label('unidad', 'Unidad ', ['class' => 'form-group']) !!}
   {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'subUni']) !!}
   </div>

   <div class="form-group">
  {!! Form::label('unidad_id', 'Unidad ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
   {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'subId']) !!}
   </div>

  <div class="form-group">
  {!! Form::label('tema', 'Tema ', ['class' => 'form-group']) !!}
   {!! Form::text('tema', null, ['class' => 'form-control', 'id' => 'tem']) !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('subtemas', 'SubTemas ', ['class' => 'form-group']) !!}
   {!! Form::text('subtemas', null, ['class' => 'form-control', 'id' => 'subT']) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>

  <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control ckeditor',  'rows' => '3', 'id' => 'descSub']) !!}
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" id="canUnidad" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="crearU">Crear</a>
      </div>
    </div>

  </div>
</div>