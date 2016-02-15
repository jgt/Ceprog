<div id="Mapoyo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <table class="table">
         <thead>
           <div class="form-group">

     {!! Form::open(['route' => 'material', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'apoyoM_id', 'files' => true]) !!}
      
      {!! Form::label('Docente', 'Docente: ',['class' => 'form-group']) !!}
     {!! Form::text('Authuser', null, ['class' => 'form-control', 'id' => 'AuthUserApoyo']) !!}
   {!! Form::text('actividad_id', null, ['class' => 'form-control alert', 'id' => 'apoyo_id']) !!}
   {!! Form::text('user_id', null, ['class' => 'form-control alert ', 'id' => 'userApoyo_id']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control'])!!}
   <hr>
   <div class="progress progress-striped active">
     <div class="progress-bar" style="width:0%" id="prog"></div>
   </div>
   <hr>
  {!! Form::submit('Responder', ['class' => 'btn btn-sm btn btn-info upload'])!!}
   <button type="button" class="btn btn-sm btn btn-danger cancel">Cancelar</button>
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>