<div id="editPregunta" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Pregunta</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'updatePregunta', 'method' => 'POST', 'class' => 'form-group', 'id' => 'edPreg-form']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'edenunciado']) !!}
    </div>

    <div class="form-group">

  {!! Form::label('valor', 'Porcentaje de la pregunta ', ['class' => 'form-group']) !!}

   {!! Form::text('valor', null, ['class' => 'form-control', 'id' => 'edvalor']) !!}
    </div>
  
   
     <div class="form-group alert ">

    {!! Form::label('examen_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('examen_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'edexamenId']) !!}
   {!! Form::text('pregunta_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'edpreguntaId']) !!} 
    </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="updatePreg">Editar</a>
      </div>
    </div>

  </div>
</div>