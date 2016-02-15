<div id="videoUnidad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="closeVideo">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <table class="table">
         <thead>
           <div class="form-group">

     {!! Form::open(['route' => 'storeSubir', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'my-dropzone', 'files' => true]) !!}

    {!! Form::label('unidad', 'Unidad: ', ['class' => 'form-group']) !!}

  {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'namUnidad']) !!}
   {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'id' => 'viduni']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'fileVideoDocente'])!!}
   <hr>
   <div class="progress progress-striped active">
     <div class="progress-bar" style="width:0%" id="barProgress"></div>
   </div>
   <hr>
   {!! Form::submit('Responder', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'submitId'])!!}
   <button type="button" class="btn btn-sm btn btn-danger cancel" id="cancelVideo">Cancelar</button>
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>