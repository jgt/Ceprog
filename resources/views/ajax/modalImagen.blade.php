<div id="imagenSubtema" class="modal fade" role="dialog">
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

     {!! Form::open(['route' => 'imagenSubtema', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'imgSub', 'files' => true]) !!}
       <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    {!! Form::label('subtema', 'Subtema: ', ['class' => 'form-group']) !!}

  {!! Form::text('subtema', null, ['class' => 'form-control', 'id' => 'namSubtema']) !!}
   {!! Form::text('subtema_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'subimgId']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'fileImagen'])!!}
   <hr>
   <div class="progress progress-striped active">
     <div class="progress-bar" style="width:0%" id="barProgress"></div>
   </div>
   <hr>
   {!! Form::submit('Responder', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'fimg'])!!}
   <button type="button" class="btn btn-sm btn btn-danger cancel" id="cancelImg">Cancelar</button>
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>