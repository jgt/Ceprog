<div id="editarExamen" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
  
    {!! Form::open(['route' => 'updateExamen', 'method' => 'POST',  'id' => 'form-exa', 'class' => 'form-group']) !!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">

   {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'editExmat']) !!}
   {!! Form::text('examen_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'exa_id']) !!}
   </div>

  <div class="form-group">
  {!! Form::label('catedratico', 'Catedratico ', ['class' => 'form-group']) !!}
   {!! Form::text('catedratico', null, ['class' => 'form-control', 'id' => 'authExam']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('modalidad', 'Modalidad ', ['class' => 'form-group']) !!}
   {!! Form::text('modalidad', null, ['class' => 'form-control', 'id' => 'modExam']) !!}
   <strong id="mod" class="validation"></strong>
   </div>

   <div class="form-group">
  {!! Form::label('modulo', 'Modulo ', ['class' => 'form-group']) !!}
   {!! Form::text('modulo', null, ['class' => 'form-control', 'id' => 'mdExamen']) !!}
   <strong id="modl" class="validation"></strong>
   </div>
  
  <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                  {!! Form::label('fecha', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fecha', null, ['class' => 'form-control', 'id' => 'ini']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

              <div class="form-group">
                <div class='input-group date' id='datetimepicker4'>
                  {!! Form::label('fechaF', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fechaF', null, ['class' => 'form-control', 'id' => 'fin']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

  
  
 {!! Form::close()!!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="updateExa">Editar</a>
      </div>
    </div>

  </div>
</div>