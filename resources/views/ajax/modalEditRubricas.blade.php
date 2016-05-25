<div id="modalRubricasEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rubricas</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'updaterubrica', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formRE']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')
  <div class="form-group">
  {!! Form::label('name', 'Nombre de la rubrica ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameRE']) !!}
   <strong class="val" id="nombre"></strong>
   </div>

  <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'descripcionRE']) !!}
   <strong class="val" id="descripcion"></strong>
  </div>

  <div class="form-group">
  {!! Form::label('total', 'valor Rubrica ', ['class' => 'form-group']) !!}
   {!! Form::text('total', null, ['class' => 'form-control', 'id' => 'totalR']) !!}
   <strong class="val" id="descripcion"></strong>
  </div>

  <div class="form-group">
  {!! Form::label('rubrica_id', 'rubrica id  ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
   {!! Form::text('rubrica_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'rubrica_id']) !!}
   <input name="actividad_id" type="hidden" id="actividadIdE">
  </div>
  
  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="edrubrica">Editar</a>
      </div>
    </div>

  </div>
</div>