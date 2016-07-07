<div id="mdlPlan" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Semestre</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'semestre.store', 'method' => 'POST', 'form' => 'form-group', 'id' => 'form-mdl']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
  {!! Form::label('name', 'Semestre:', ['class' => 'form-group']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
   </div>
  
  <div class="form-group">
  {!! Form::label('carrera', 'Carrera', ['class' => 'form-group']) !!}
   {!! Form::text('carrera', null, ['class' => 'form-control', 'id' => 'carrModal', 'disabled']) !!}
   {!! Form::text('carrera_id', null, ['id' => 'idCarrmodal', 'Style' => 'display:none']) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#mdlMateria" class="btn btn-primary" id="mdlSem">Crear</a>
      </div>
    </div>

  </div>
</div>