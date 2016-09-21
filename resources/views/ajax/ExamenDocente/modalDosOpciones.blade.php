<div id="modalDosOpciones" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Respuestas</h4>
      </div>
      <div class="modal-body">
   {!! Form::open(['route' => 'createRespuestaDocente', 'method' => 'POST', 'id' => 'formDosOpciones'])!!}

   <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')
 
 @for($i = 0; $i <= 1; $i++)
        <div class="form-group">
            
            {!! Form::label('name', $i.')', ['class' => 'form-group']) !!}

            {!! Form::label('contenido', 'Contenido de la respuesta', ['class' => 'form-group']) !!}
            
            {!! Form::text('name[]', null, ['class' => 'form-control', 'id' => 'respDosOpciones']) !!}
            
            {!! Form::label('valor', 'Porcentaje de la respuesta', ['class' => 'form-group']) !!}

            {!! Form::text('valor[]', null, ['class' => 'form-control', 'id' => 'valorContenido', 'style' => 'width:40px'])!!}
        </div>
    @endfor
      
     <div class="form-group">

    {!! Form::label('pregunta_docente_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('pregunta_docente_id', null, ['class' => 'form-control', 'id' => 'prtDosOpciones', 'Style' => 'display:none']) !!}
   <hr>
   <div class="modal-footer">
      {!! Form::submit('Crear', ['class' => 'btn btn-primary', 'id' => 'createDosOpciones']) !!}
    </div>
  
    </div>
   
{!! Form::close()!!}  

      </div>
    </div>

  </div>
</div>