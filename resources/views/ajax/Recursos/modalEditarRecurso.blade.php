<div id="editarRecurso" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <table class="table">
         <thead>
         {!! Form::open(['route' => 'recursoUpdate', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form-recursoUpdate', 'files' => true]) !!}
         
    {!! Form::label('name', 'Nombre: ', ['class' => 'form-group']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'recursoEdit'])!!}
    {!! Form::text('id', null, ['class' => 'form-control', 'id' => 'idRecurso', 'style' => 'display:none'])!!}

    {!! Form::label('descripcion', 'Descripcion: ', ['class' => 'form-group']) !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '4', 'id' => 'descripcionEdit'])!!}
    <hr>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        {!! Form::submit('Editar', ['class' => 'btn btn-warning', 'id' => 'upRecursos'])!!}
      </div>

    </div>
     
   {!! Form::close() !!}
         </thead>
         <tbody id="videoRec"></tbody>
       </table>
      </div>
    </div>

  </div>
</div>