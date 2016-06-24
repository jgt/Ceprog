<div  Style="display:none" id="examen">
  {!! Form::open(['route' => 'storeExamen', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formExa']) !!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  <div class="container">
    <div class="row">

      <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading"></div>
           <div class="panel-body">

  @include('errors.error')
  <div class="form-group">
  {!! Form::label('materia', 'Materia ', ['class' => 'form-group']) !!}
   {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'mta']) !!}
   </div>

    <div class="form-group">

   {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'idMat']) !!}
   </div>

  <div class="form-group">
  {!! Form::label('catedratico', 'Catedratico ', ['class' => 'form-group']) !!}
   {!! Form::text('catedratico', null, ['class' => 'form-control', 'id' => 'auth']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('modalidad', 'Modalidad ', ['class' => 'form-group']) !!}
   {!! Form::text('modalidad', null, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
  {!! Form::label('modulo', 'Modulo ', ['class' => 'form-group']) !!}
   {!! Form::text('modulo', null, ['class' => 'form-control']) !!}
   </div>
  
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                  {!! Form::label('fecha', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fecha', null, ['class' => 'form-control']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

  <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                  {!! Form::label('fechaF', 'Fecha limite', ['class' => 'form-control']) !!}
                  {!! Form::text('fechaF', null, ['class' => 'form-control']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>
 
   <div class="form-group">

    {!! Form::submit('Siguiente', ['class' => 'btn btn-default', 'id' => 'crearExa']) !!}  
  
  </div>
   
            </div>
           </div>
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>