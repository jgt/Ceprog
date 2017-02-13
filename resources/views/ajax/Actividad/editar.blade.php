<div id="editarA" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          
          {!! Form::text('actividad_id', null, ['Style' => 'display:none', 'id' => 'actID'])!!}
            
  {!! Form::open(['route' => 'updateActividad', 'method' => 'POST',  'id' => 'form-edit', 'class' => 'form-group']) !!}
       
    {!! Form::text('unidad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'unID']) !!}

    <div class="form-group">
    {!! Form::label('cognoscitivo', 'Nivel Cognitivo ', ['class' => 'form-group']) !!}

    {!! Form::text('cognoscitivo', null, ['class' => 'form-control', 'id' => 'cogEdit']) !!}
    </div>
  
  <div class="form-group">
   {!! Form::label('actividad', 'Nombre de la actividad ', ['class' => 'form-group']) !!}
    
   {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'actEdit']) !!}
   </div>

   <div class="form-group">
   {!! Form::label('descripcion', 'Descripción de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::textarea('descripcion', null, ['class' => 'form-control ckeditor', 'rows' => '3', 'id' => 'descEdit']) !!}
   </div>

   <div class="form-group">

   {!! Form::label('objetivo', 'Objetivo ', ['class' => 'form-group']) !!}
   {!! Form::textarea('estrategia', null, ['class' => 'form-control ckeditor', 'rows' => '3', 'id' => 'objEdit']) !!}

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

   {!! Form::text('caracteristicas', null, ['class' => 'form-control', 'id' => 'carcEdit']) !!}
  </div>
  

    <div class="form-group">

  {!! Form::label('realizacion', 'Sugerencias de realización  ', ['class' => 'form-group']) !!}

   {!! Form::text('realizacion', null, ['class' => 'form-control', 'id' => 'reaEdit']) !!}
    </div>
  <div class="form-group">

   {!! Form::label('codigoactividad', 'Código de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::text('codigoactividad', null, ['class' => 'form-control', 'id' => 'codiEdit']) !!}
  </div>

  <div class="form-group">
                <div class='input-group date' id='datetimepicker9'>
                  {!! Form::label('fecha', 'Fecha de activación', ['class' => 'form-control']) !!}
                  {!! Form::text('fecha', null, ['class' => 'form-control', 'id' => 'fechEdit']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div>

    <div class="form-group">
                <div class='input-group date' id='datetimepicker10'>
                  {!! Form::label('fechaF', 'Fecha Limite', ['class' => 'form-control']) !!}
                  {!! Form::text('fechaF', null, ['class' => 'form-control', 'id' => 'fechfEdit']) !!}
                    
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
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