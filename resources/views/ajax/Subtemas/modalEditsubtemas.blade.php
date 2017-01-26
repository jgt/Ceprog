<div id="editST" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Subtemas</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'updateSubtemas', 'method' => 'POST', 'class' => 'form-group', 'id' => 'edit-formSubt']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
  {!! Form::label('unidad_id', 'Unidad ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
   {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'editsubId']) !!}
   </div>

    <div class="form-group">
  {!! Form::label('subtemas_id', 'SubTemas id', ['class' => 'form-group', 'Style' => 'display:none']) !!}
   {!! Form::text('subtemas_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'Idsubtemas']) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>
  
  <div class="form-group">
  {!! Form::label('subtemas', 'SubTemas ', ['class' => 'form-group']) !!}
   {!! Form::text('subtemas', null, ['class' => 'form-control', 'id' => 'editsubT']) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>

   <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control',  'rows' => '3', 'id' => 'descSubedit']) !!}
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="editS">Editar</a>
      </div>
    </div>

  </div>
</div>