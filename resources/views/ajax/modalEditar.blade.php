<div id="editarA" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          
          <a href="{{route('profesor.edit')}}" id="editarRoute" class="alert"></a>
          {!! Form::text('actividad_id', null, ['class' => 'alert', 'id' => 'actID'])!!}
          
  {!! Form::open(['route' => 'profesor.update', 'method' => 'PUT',  'id' => 'form-edit', 'class' => 'form-group']) !!}
    
    {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'id' => 'unID']) !!}

    <div class="form-group">
    {!! Form::label('cognoscitivo', 'Nivel Cognitivo ', ['class' => 'form-group']) !!}

    {!! Form::textarea('cognoscitivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'cogEdit']) !!}
    </div>
  
  <div class="form-group">
   {!! Form::label('actividad', 'Nombre de la actividad ', ['class' => 'form-group']) !!}
    
   {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'actEdit']) !!}
   </div>

   <div class="form-group">
   {!! Form::label('descripcion', 'Descripción de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'descEdit']) !!}
   </div>

   <div class="form-group">

   {!! Form::label('objetivo', 'Objetivo ', ['class' => 'form-group']) !!}
   {!! Form::textarea('estrategia', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'objEdit']) !!}

     </div>
     
   <div class="form-group">

    {!! Form::label('valoractividad', 'Valor Total de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::selectRange('valoractividad', 10, 40, null, ['class' => 'form-control', 'id' => 'valEdit']) !!}
    </div>
  
  <div class="form-group">

    {!! Form::label('evidencia', 'Evidencias ', ['class' => 'form-group']) !!}

   {!! Form::text('evidencia', null, ['class' => 'form-control', 'id' => 'evEdit']) !!}
   </div>
  
  <div class="form-group">

   {!! Form::label('caracteristicas', 'Caracteristicas de entrega ', ['class' => 'form-group']) !!}

   {!! Form::textarea('caracteristicas', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'carcEdit']) !!}
  </div>
  

    <div class="form-group">

  {!! Form::label('realizacion', 'Sugerencias de realización  ', ['class' => 'form-group']) !!}

   {!! Form::textarea('realizacion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'reaEdit']) !!}
    </div>
  <div class="form-group">

   {!! Form::label('codigoactividad', 'Código de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::text('codigoactividad', null, ['class' => 'form-control', 'id' => 'codiEdit']) !!}
  </div>

  <div class="form-group">

   {!! Form::label('fecha', 'Fecha Inicial :', ['class' => 'form-group']) !!}

   {!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'fechEdit']) !!}
    </div>

  <div class="form-group">

   {!! Form::label('fechaF', 'Fecha Limite:  ', ['class' => 'form-group']) !!}

   {!! Form::date('fechaF', null, ['class' => 'form-control', 'id' =>'fechfEdit']) !!}
    </div>

   <div class="form-group" >
    {!! Form::label('Rubricas', 'Rubricas de la Actividad: ', ['class' => 'form-group'])!!} 

    <ul class="examen" id="liR"></ul>
  </div>
  
 {!! Form::close()!!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="editActividad">Editar</a>
      </div>
    </div>

  </div>
</div>

