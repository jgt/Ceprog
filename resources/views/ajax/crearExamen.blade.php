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
   <strong id="mod" class="validation"></strong>
   </div>

   <div class="form-group">
  {!! Form::label('modulo', 'Modulo ', ['class' => 'form-group']) !!}
   {!! Form::text('modulo', null, ['class' => 'form-control']) !!}
   <strong id="modl" class="validation"></strong>
   </div>
  
  <div class="form-group">
  {!! Form::label('fecha', 'Fecha de activacion ', ['class' => 'form-group']) !!}
   {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
   <strong id="fec" class="validation"></strong>
  </div>

  <div class="form-group">
  {!! Form::label('fechaF', 'Fecha limite ', ['class' => 'form-group']) !!}
   {!! Form::date('fechaF', null, ['class' => 'form-control']) !!}
   <strong id="fecF" class="validation"></strong>
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