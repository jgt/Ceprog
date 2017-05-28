<div Style="display:none" id="crtExaDiag">
  {!! Form::open(['route' => 'exaDiag', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formExadig']) !!}
  <div class="container">
    <div class="row">

      <div class="col-md-6 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading"></div>
           <div class="panel-body">

  <div class="form-group">
  {!! Form::label('name', 'Nombre del Examen ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control']) !!}
   </div>

  
  <div class="form-group">
  {!! Form::label('carrera_list', 'Carrera ', ['class' => 'form-group']) !!}
  {!!Form::select('carrera_list[]', $carreras, null, ['id' => 'carrera_list', 'multiple', 'style' => 'width:520px'])!!}
   </div>

  <div class="form-group">
  {!! Form::label('modalidad', 'Modalidad ', ['class' => 'form-group']) !!}
   {!! Form::text('modalidad', null, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
  {!! Form::label('modulo', 'Modulo ', ['class' => 'form-group']) !!}
   {!! Form::text('modulo', null, ['class' => 'form-control']) !!}
   </div>
<br>
   <div class="form-group">
                <div class='input-group date' id='datetimepicker13'>
                  {!! Form::label('fecha', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fecha', null, ['class' => 'form-control']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

    <div class="form-group">
                <div class='input-group date' id='datetimepicker14'>
                  {!! Form::label('fechaF', 'Fecha Limite', ['class' => 'form-control']) !!}
                  {!! Form::text('fechaF', null, ['class' => 'form-control']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>
 
   <div class="form-group">

    {!! Form::submit('Siguiente', ['class' => 'btn btn-default', 'id' => 'crtExadia']) !!}  
  
  </div>
   
            </div>
           </div>
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>
