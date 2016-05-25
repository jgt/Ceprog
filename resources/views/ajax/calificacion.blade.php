
<div id="calificacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <table class="table">
        {!! Form::open(['route' => 'storeRubrica', 'method' => 'POST', 'class' => 'form-group', 'id' => 'cal']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')
  <div class="form-group">
  {!! Form::label('name', 'Nombre de la rubrica ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameR']) !!}
   <strong class="val" id="nombre"></strong>
   </div>

  <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'descripcionR']) !!}
   <strong class="val" id="descripcion"></strong>
  </div>
  
  <div class="form-group">
  {!! Form::label('actividad_id', 'Nombre de la actividad  ', ['class' => 'form-group']) !!}
   {!! Form::text('actividad_id', null, ['class' => 'form-control', 'id' => 'actividadId']) !!}
   <input name="actividad_id" type="hidden" id="idAct">
  </div>

   <div class="form-group">
  {!! Form::label('porcentaje', 'Porcentaje de la actividad ', ['class' => 'form-group']) !!}
   {!! Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'actividadP']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('porcentajeD', 'Porcentaje disponible ', ['class' => 'form-group']) !!}
   {!! Form::text('porcentajeD', null, ['class' => 'form-control', 'id' => 'porcentajeD']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('Nrubrica', 'Rubricas de la actividad  ', ['class' => 'form-group']) !!}
   {!! Form::text('Nrubrica', null, ['class' => 'form-control', 'id' => 'numeroR']) !!}
  </div>
 
  <div class="form-group">
  {!! Form::label('total', 'Porcentaje  ', ['class' => 'form-group']) !!}
   {!! Form::text('total', null, ['class' => 'form-control', 'id' => 'total']) !!}
   <strong class="val" id="prcT"></strong>
  </div>
  
  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>