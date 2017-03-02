 <div Style="display:none" id="calAct">
      
  
  <h2 align="center"> Calificar</h2>
  <hr>
 {!! Form::open(['route' => 'nota', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'form-calificacion']) !!}
  
   <div class="form-group">
  {!! Form::label('user_id', 'Alumno: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('usuario', null, ['class' => 'form-control', 'id' => 'nameAuth', 'readonly' => 'readonly'])!!}
  {!! Form::text('user_id', null, ['id' => 'uid', 'Style' => 'display:none'])!!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('actividad_id', 'Actividad: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'nameAct', 'readonly' => 'readonly'])!!}
    {!! Form::text('actividad_id', null, ['id' => 'aid', 'Style' => 'display:none'])!!}
  </div>
  </div>

  <div class="form-group">
  {!! Form::label('archivos', 'Archivos: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9" id="archUser"></div>
  </div>

  <div class="form-group">
    {!! Form::label('comentario', 'Comentario', ['class' => 'control-label col-xs-3']) !!}
    <div class="col-xs-9" id="archUser">
      {!! Form::textarea('comentario', null, ['class' => 'form-control ckeditor', 'id' => 'calComentario'])!!}
    </div>
  </div>

   <div class="form-group">
  {!! Form::label('rubrica', 'Rubricas: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
    <ol type="1" id="ulR"></ol>
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('promedio', 'Nota ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('promedio', null, ['class' => 'form-control', 'id' => 'ntoFinal', 'readonly' => 'readonly'])!!}
   </div>
  </div>
    
  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Guardar Nota', ['class' => 'btn btn-primary', 'id' => 'subCal'])!!}
            <a href="#" class="btn btn-success" id="sumar">Calcular</a>
            <a href="#" class="btn btn-danger" id="subEnd" Style="display:none">Salir</a>
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>