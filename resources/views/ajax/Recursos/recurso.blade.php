<div id="recursoVideo" class="modal fade" role="dialog">
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

     {!! Form::open(['route' => 'recursoStore', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form-recurso', 'files' => true]) !!}
       <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

    {!! Form::label('name', 'Nombre: ', ['class' => 'form-group']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'recursoName'])!!}

    {!! Form::label('descripcion', 'Descripcion: ', ['class' => 'form-group']) !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '4', 'id' => 'descripcionRecurso'])!!}

    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo/Video: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'recursoVideo'])!!}
   <hr>
   {!! Form::submit('Crear', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'createRecurso'])!!}
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>