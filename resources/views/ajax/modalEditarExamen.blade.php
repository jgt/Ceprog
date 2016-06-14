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

   {!! Form::label('fecha', 'Fecha de Activación :', ['class' => 'form-group']) !!}

   {!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'ini']) !!}
    </div>

  <div class="form-group">

   {!! Form::label('fechaF', 'Fecha Limite:  ', ['class' => 'form-group']) !!}

   {!! Form::date('fechaF', null, ['class' => 'form-control', 'id' =>'fin']) !!}
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