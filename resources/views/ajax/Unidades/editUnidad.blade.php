 
 <div id="mnUnidad" class="col-md-10 col-md-offset-1">
   <table class="table">
         <tbody id="menUnidad"></tbody>
       </table>
 </div>
<hr>
 <div Style="display:none" id="editUnidad" class="col-md-8 col-md-offset-1">
      
  {!! Form::open(['route' => 'updateplan', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'edit-formplan']) !!}
  
   <div class="form-group">
  {!! Form::label('materia', 'Nombre de la asignatura: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'editasignatura', 'readonly' => 'readonly']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('semestre', 'Semestre: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('semestre', null, ['class' => 'form-control', 'id' => 'editsemes', 'readonly' => 'readonly']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('seriacion', 'Seriación: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
      {!! Form::text('seriacion', null, ['class' => 'form-control', 'id' => 'editseriacion']) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('clave', 'Clave:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('clave', null, ['class' => 'form-control', 'id' => 'editclave']) !!}
   </div>
  </div>
    <div class="form-group">
  {!! Form::label('objetivo', 'Objetivo de la materia:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'editobjetivo']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('asesor', 'Asesor: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('asesor', null, ['class' => 'form-control', 'id' => 'editasesor', 'readonly' => 'readonly']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('unidad', 'Unidad:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
    {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'editunidad']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('tema', 'Tema:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('tema', null, ['class' => 'form-control', 'id' => 'edittema']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('actividadP', 'Actividades de Aprendizaje:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::textarea('actividadP', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'editactividadP']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'editfechaU']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('materia_id', 'Materia id', ['class' => 'form-group', 'Style' => 'display:none'])!!}
  <div class="col-xs-9">
     {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'editmateria'])!!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('user_id', 'User id ', ['class' => 'form-group', 'Style' => 'display:none']) !!}
   <div class="col-xs-9">
     {!! Form::text('user_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'editUs']) !!}
   </div>
  </div>

  <div class="form-group">
      {!! Form::label('unidad_id', 'Unidad id', ['class' => 'form-group alert', 'Style' => 'display:none'])!!}
      {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'unidadId'])!!}
      <strong class="validation" id="mat"></strong>
  </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Editar', ['class' => 'btn btn-success', 'Style' => 'display:none', 'id' => 'editU']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>