<div id="edtExmDoc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
  
    {!! Form::open(['route' => 'examenDocente.update', 'method' => 'PUT',  'id' => 'form-exaDocente', 'class' => 'form-group']) !!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">

    {!! Form::text('examen_docente_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'editExamDoc']) !!}
   </div>

   <div class="form-group">
  {!! Form::label('name', 'Nombre del Examen ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'edtnamExamen']) !!}
   </div>

  <div class="form-group">
  {!! Form::label('ciudad', 'Ciudad ', ['class' => 'form-group']) !!}
   {!! Form::text('ciudad', null, ['class' => 'form-control', 'id' => 'ciueditExam']) !!}
   </div>
  
  <div class="form-group">
  {!! Form::label('carrera_list', 'Carrera ', ['class' => 'form-group']) !!}
  {!!Form::select('carrera_list[]', [], null, ['id' => 'selectMatdocenteEdit', 'multiple', 'style' => 'width:530px'])!!}
   </div>


  <div class="form-group">
  {!! Form::label('modalidad', 'Modalidad ', ['class' => 'form-group']) !!}
   {!! Form::text('modalidad', null, ['class' => 'form-control', 'id' => 'editmodalidadExa']) !!}
   </div>

   <div class="form-group">
  {!! Form::label('modulo', 'Modulo ', ['class' => 'form-group']) !!}
   {!! Form::text('modulo', null, ['class' => 'form-control', 'id' => 'editmoduloExa']) !!}
   </div>
<br>
   <div class="form-group">
                <div class='input-group date' id='datetimepicker7'>
                  {!! Form::label('fecha', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fecha', null, ['class' => 'form-control', 'id' => 'editfechaExa']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

    <div class="form-group">
                <div class='input-group date' id='datetimepicker8'>
                  {!! Form::label('fechaF', 'Fecha Limite', ['class' => 'form-control']) !!}
                  {!! Form::text('fechaF', null, ['class' => 'form-control', 'id' => 'editfechafExa']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

  
  
 {!! Form::close()!!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="updateExaDocente">Editar</a>
      </div>
    </div>

  </div>
</div>