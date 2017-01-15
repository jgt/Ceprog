<div id="plcModal" class="modal fade" role="dialog">
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

     {!! Form::open(['route' => 'plcStore', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'my-planeacion', 'files' => true]) !!}

   {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'plcMat']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Subir Planeacion: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'fileVideoDocente'])!!}
   <hr>
   {!! Form::submit('Subir', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'mtrPlc'])!!}
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>