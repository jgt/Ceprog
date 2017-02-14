<div id="editSemm" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Semestre</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'semestre.update', 'method' => 'PUT', 'form' => 'form-group', 'id' => 'form-semm']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
  {!! Form::label('name', 'Semestre:', ['class' => 'form-group']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameEditSem']) !!}
     {!! Form::text('semestre_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'semmId']) !!}
   </div>

   <div class="form-group">
   {!! Form::label('campus', 'Campus:', ['class' => 'form-group']) !!}
   <ul id="semEditCmp"></ul>
  </div>
  
  <div class="form-group">
   {!! Form::text('carrera_id', null, ['id' => 'editSem', 'Style' => 'display:none']) !!}
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="semmEditar">Editar</a>
      </div>
    </div>

  </div>
</div>