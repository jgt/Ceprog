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
  

    {!! Form::label('subtema', 'Subtema: ', ['class' => 'form-group']) !!}

  {!! Form::text('subtema', null, ['class' => 'form-control', 'id' => 'namSubtema', 'readonly' => 'readonly']) !!}
   {!! Form::text('subtema_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'subimgId']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'fileImagen'])!!}
   <hr>
   {!! Form::submit('Subir Imagen', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'fimg'])!!}
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>