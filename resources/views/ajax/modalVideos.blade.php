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
       <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    {!! Form::label('unidad', 'Unidad: ', ['class' => 'form-group']) !!}

  {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'namUnidad']) !!}
   {!! Form::text('unidad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'viduni']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'fileVideoDocente'])!!}
   <hr>
   {!! Form::submit('Responder', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'Vimg'])!!}
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>