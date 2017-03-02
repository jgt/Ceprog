<div id="modalRubricas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rubricas</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'storeRubrica', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formR']) !!}
  
  <div class="form-group">
  {!! Form::label('name', 'Nombre de la rubrica ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameR']) !!}
   <strong class="val" id="nombre"></strong>
   </div>

  <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'descripcionR']) !!}
  </div>
 
  <div class="form-group">
  {!! Form::label('actividad_id', 'Nombre de la actividad  ', ['class' => 'form-group', 'style' => 'display:none']) !!}
   {!! Form::text('actividad_id', null, ['class' => 'form-control', 'id' => 'actividadId', 'style' => 'display:none']) !!}
  </div>

   <div class="form-group">
  {!! Form::label('porcentaje', 'Porcentaje de la actividad ', ['class' => 'form-group']) !!}
   {!! Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'actividadP', 'readonly' => 'readonly']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('porcentajeD', 'Porcentaje disponible ', ['class' => 'form-group']) !!}
   {!! Form::text('porcentajeD', null, ['class' => 'form-control', 'id' => 'porcentajeD', 'readonly' => 'readonly']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('Nrubrica', 'Rubricas de la actividad  ', ['class' => 'form-group']) !!}
   {!! Form::text('Nrubrica', null, ['class' => 'form-control', 'id' => 'numeroR', 'readonly' => 'readonly']) !!}
  </div>
 
  <div class="form-group">
  {!! Form::label('total', 'Porcentaje  ', ['class' => 'form-group']) !!}
   {!! Form::text('total', null, ['class' => 'form-control', 'id' => 'total']) !!}
   <strong class="val" id="prcT"></strong>
  </div>
  
  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" id="cancelar" class="btn btn-default" Style="display:none" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="crearR">Crear</a>
      </div>
    </div>

  </div>
</div>