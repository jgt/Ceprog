<div id="mdlMateriados" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Materia</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'materia.store', 'method' => 'POST', 'form' => 'form-group', 'id' => 'form-mdlMatdos']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
  {!! Form::label('name', 'Materia:', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'mdlMtados']) !!}
   </div>
  
  <div class="form-group">
  {!! Form::label('creditos', 'Clave: ', ['class' => 'form-group']) !!}
   {!! Form::text('creditos', null, ['class' => 'form-control', 'id' => 'mdlCreditosdos']) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>

  <div class="form-group">
   {!! Form::text('semestre_id', null, ['id' => 'idSemmodaldos', 'Style' => 'display:none']) !!}
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="mdlMatdos">Crear</a>
      </div>
    </div>

  </div>
</div>