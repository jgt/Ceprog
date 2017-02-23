 <div Style="display:none" id="consUser" class="col-md-10 col-md-offset-1">
        
  <h2 align="center"> Consultar</h2>
  <hr>
  {!! Form::open(['route' => 'editComentario', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'formConsul']) !!}
  
   <div class="form-group">
  {!! Form::label('alumno', 'Alumno: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('alumno', null, ['class' => 'form-control', 'id' => 'userConsultar', 'readonly' => 'readonly']) !!}
    {!! Form::text('idAlumno', null, ['id' => 'consulIduser', 'style' => 'display:none']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('actividad', 'Actividad: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'actConsultar', 'readonly' => 'readonly']) !!}
     {!! Form::text('idAct', null, ['id' => 'consulIdact', 'style' => 'display:none']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('rubricas', 'Rubricas: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <ul id="rubConsultar"></ul>
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('archivos', 'Archivos: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <ul id="fileConsultar"></ul>
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('promedio', 'Promedio:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('promedio', null, ['class' => 'form-control', 'id' => 'proConsultar', 'readonly' => 'readonly']) !!}
     {!! Form::text('idCal', null, ['id' => 'consulIdcal', 'style' => 'display:none']) !!}
   </div>
  </div>
    <div class="form-group">
  {!! Form::label('comentario', 'Comentario:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('comentario', null, ['class' => 'form-control ckeditor', 'rows' => '3', 'id' => 'cmoConsultar']) !!}
   </div>
  </div>
  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Editar comentario', ['class' => 'btn btn-default', 'id' => 'editConsul']) !!}
            <a href="#" class="btn btn-warning" id="consulBack">Atras</a>
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>