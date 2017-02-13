<div id="mdlPlandos" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear Semestre</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'semestre.store', 'method' => 'POST', 'form' => 'form-group', 'id' => 'form-mdldos']) !!}

   <div class="form-group">
  {!! Form::label('name', 'Semestre:', ['class' => 'form-group']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
   </div>
  
  <div class="form-group">
  {!! Form::label('carrera', 'Carrera', ['class' => 'form-group']) !!}
   {!! Form::text('carrera', null, ['class' => 'form-control', 'id' => 'carrModaldos', 'disabled']) !!}
   {!! Form::text('carrera_id', null, ['id' => 'idCarrmodaldos', 'Style' => 'display:none']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('campus_carrera', 'Elige el Campus:', ['class' => 'form-group']) !!}
    {!! Form::select('campus_carrera', [], null, ['class' => 'form-control', 'id' => 'campusSelect',  'style' => 'width:570px', 'multiple']) !!}
   </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="mdlSemdos">Crear</a>
      </div>
    </div>

  </div>
</div>