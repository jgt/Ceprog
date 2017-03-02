<div  Style="display:none" id="crtExamenDocente">
  {!! Form::open(['route' => 'examenDocente.store', 'method' => 'POST', 'class' => 'form-group', 'id' => 'evaDoc']) !!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  <div class="container">
    <div class="row">

      <div class="col-md-6 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading"></div>
           <div class="panel-body">

  @include('errors.error')
  <div class="form-group">
  {!! Form::label('name', 'Nombre del Examen ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control']) !!}
   </div>

  <div class="form-group">
  {!! Form::label('ciudad', 'Ciudad ', ['class' => 'form-group']) !!}
   {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
   </div>
  

  <div class="form-group">
  {!! Form::label('carrera_list', 'Carrera ', ['class' => 'form-group']) !!}
  {!!Form::select('carrera_list[]', [], null, ['id' => 'selectMatdocente', 'multiple', 'style' => 'width:520px'])!!}
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
                <div class='input-group date' id='datetimepicker5'>
                  {!! Form::label('fecha', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fecha', null, ['class' => 'form-control']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

    <div class="form-group">
                <div class='input-group date' id='datetimepicker6'>
                  {!! Form::label('fechaF', 'Fecha Limite', ['class' => 'form-control']) !!}
                  {!! Form::text('fechaF', null, ['class' => 'form-control']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>
 
   <div class="form-group">

    {!! Form::submit('Siguiente', ['class' => 'btn btn-default', 'id' => 'exaDocrt']) !!}  
  
  </div>
   
            </div>
           </div>
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>