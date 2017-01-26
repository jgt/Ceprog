 <div Style="display:none" id="examen">
  
  <h2 align="center">Crear Examenes</h2>    
  <hr>
  {!! Form::open(['route' => 'storeExamen', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'formExa']) !!}
  
   <div class="form-group">
  {!! Form::label('materia', 'Materia:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'mta']) !!}
  </div>
   </div>

  <div class="form-group">
  {!! Form::label('catedratico', 'Catedratico:', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('catedratico', null, ['class' => 'form-control', 'id' => 'auth', 'readonly' => 'readonly']) !!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('modalidad', 'Modalidad:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('modalidad', null, ['class' => 'form-control']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('modulo', 'Modulo:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
   {!! Form::text('modulo', null, ['class' => 'form-control']) !!}
   </div>
   </div>
  
    <div class="form-group">
      {!! Form::label('fecha', 'Fecha de activación', ['class' => 'control-label col-xs-3']) !!}
      <div class='input-group date' id='datetimepicker1'>
      <div class="col-xs-10">
        {!! Form::text('fecha', null, ['class' => 'form-control']) !!}
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>         
      </div>   
    </div>

  <div class="form-group">
  {!! Form::label('fechaF', 'Fecha limite', ['class' => 'control-label col-xs-3']) !!}
    <div class='input-group date' id='datetimepicker2'>
    <div class="col-xs-10">
      {!! Form::text('fechaF', null, ['class' => 'form-control']) !!}
      <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>           
    </div>   
  </div>

  <div class="form-group">
   {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'idMat']) !!}
   </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Siguiente', ['class' => 'btn btn-default', 'id' => 'crearExa']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>