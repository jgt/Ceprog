<div id="editMta" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Materia</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'materia.update', 'method' => 'PUT', 'form' => 'form-group', 'id' => 'form-edtMdlMat']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

   <div class="form-group">
  {!! Form::label('name', 'Materia:', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'editmdlMta']) !!}
   {!! Form::text('materia_id', null, ['class' => 'form-control', 'id' => 'editMtaId', 'Style' => 'display:none']) !!}
   </div>
  
  <div class="form-group">
  {!! Form::label('creditos', 'Clave: ', ['class' => 'form-group']) !!}
   {!! Form::text('creditos', null, ['class' => 'form-control', 'id' => 'editmdlCreditos']) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>

  <div class="form-group">
   {!! Form::text('semestre_id', null, ['id' => 'editidSemmodal', 'Style' => 'display:none']) !!}
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="mtaEdtCeprog">Editar</a>
      </div>
    </div>

  </div>
</div>