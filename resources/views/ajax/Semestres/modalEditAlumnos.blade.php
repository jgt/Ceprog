
<div id="udpAlmSem" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       
       {!! Form::open(['route' => 'downCarrera', 'method' => 'POST', 'class' => 'form-group', 'id' => 'studentForm-update']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
  {!! Form::label('name', 'Nombre:', ['class' => 'form-group']) !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'studentName','readonly' => 'readonly']) !!}
  {!! Form::text('id', null, ['class' => 'form-control', 'id' => 'studentId', 'style' => 'display:none']) !!}
   {!! Form::text('semId', null, ['class' => 'form-control', 'id' => 'studentSemId', 'style' => 'display:none']) !!}
   {!! Form::text('carrId', null, ['class' => 'form-control', 'id' => 'studentCarrId', 'style' => 'display:none']) !!}
   </div>

    <div class="form-group">
  {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'form-group']) !!}
  {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'studentCuenta', 'readonly' => 'readonly']) !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('password', 'Password:', ['class' => 'form-group']) !!}
  {!! Form::password('password', ['class' => 'form-control', 'id' => 'studentPassword', 'readonly' => 'readonly']) !!}
  </div>

  <div class="form-group">  
  {!! Form::label('crr_list', 'Lista de carreras:', ['class' => 'form-group']) !!}
  {!! Form::select('crr_list[]', [], null, ['class' => 'form-control', 'id' => 'studentCarrera', 'multiple']) !!}

  </div>

  <div class="form-group">
  {!! Form::label('sem_list', 'Lista de semestre:', ['class' => 'form-group']) !!}
  {!! Form::select('sem_list[]', [], null, ['class' => 'form-control', 'id' => 'studentSemestre','multiple']) !!}
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-danger" id="studentUpdate">Estas seguro?</a>
      </div>
    </div>
  </div>
</div>