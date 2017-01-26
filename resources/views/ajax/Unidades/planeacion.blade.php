 <div Style="display:none" id="planeacionC" class="col-md-10 col-md-offset-1">
      
    <a href="{{ route('planeacion')}}" style="display:none;" id="plna"></a>
  
  <h2 align="center"> Crear Unidad</h2>
  <hr>
  {!! Form::open(['route' => 'storePlan', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'plcuni']) !!}
  
   <div class="form-group">
  {!! Form::label('materia', 'Nombre de la asignatura: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'asignatura', 'readonly' => 'readonly']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('semestre', 'Semestre: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('semestre', null, ['class' => 'form-control', 'id' => 'Csemes', 'readonly' => 'readonly']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('seriacion', 'Seriación: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('seriacion', null, ['class' => 'form-control', 'id' => 'seriacion', 'placeholder' => 'Seriacion' ]) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('clave', 'Clave:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::email('clave', null, ['class' => 'form-control', 'id' => 'clave', 'readonly' => 'readonly']) !!}
   </div>
  </div>
    <div class="form-group">
  {!! Form::label('objetivo', 'Objetivo de la materia:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'objetivo']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('asesor', 'Asesor: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('asesor', null, ['class' => 'form-control', 'id' => 'asesor', 'readonly' => 'readonly']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('unidad', 'Unidad:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'unidad', 'placeholder' => 'Unidad' ]) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('tema', 'Tema:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('tema', null, ['class' => 'form-control', 'id' => 'tema', 'placeholder' => 'Tema' ]) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('actividadP', 'Actividades de Aprendizaje:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::textarea('actividadP', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'actividadP']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'fechaU']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('materia_id', 'Materia id', ['class' => 'form-group', 'Style' => 'display:none'])!!}
  <div class="col-xs-9">
     {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'materia'])!!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('user_id', 'User id ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
   <div class="col-xs-9">
     {!! Form::text('user_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'Us']) !!}
   </div>
  </div>
  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Crear unidad', ['class' => 'btn btn-default', 'id' => 'crunidad', 'data-toggle' => 'modal', 'data-target' => '#modalUnidad']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>