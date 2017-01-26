 <div Style="display:none" id="act" class="col-md-8 col-md-offset-1">
  
  {!! Form::open(['route' => 'storeActividad', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'prf']) !!}
  
   <div class="form-group">
  {!! Form::label('cognoscitivo', 'Nivel Cognitivo:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::textarea('cognoscitivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'cognoscitivo']) !!}
  </div>
   </div>

  <div class="form-group">
  {!! Form::label('actividad', 'Nombre de la actividad:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'actividad']) !!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('descripcion', 'Descripción de la actividad:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'descripAct']) !!}
   </div>
  </div>
   
    <div class="form-group">
  {!! Form::label('objetivo', 'Objetivo:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('estrategia', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'estrategia']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('valoractividad', 'Valor Total de la actividad:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::selectRange('valoractividad', 10, 40, null, ['class' => 'form-control', 'id' => 'valoractividad']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('evidencia', 'Evidencias:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('evidencia', null, ['class' => 'form-control', 'id' => 'evidencia']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('caracteristicas', 'Caracteristicas de entrega:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('caracteristicas', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'caracteristicas']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('realizacion', 'Sugerencias de realización:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::textarea('realizacion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'realizacion']) !!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('codigoactividad', 'Código de la actividad:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
       {!! Form::text('codigoactividad', null, ['class' => 'form-control', 'id' => 'codigoactividad']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('unidad_id', 'unidad_id', ['class' => 'form-group', 'Style' => 'display:none'])!!}
  <div class="col-xs-9">
     {!! Form::text('unidad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'unId'])!!}
  </div>
  </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Crear actividad', ['class' => 'btn btn-default', 'id' => 'crtAct']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>