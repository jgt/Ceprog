<div id="modalCreateRespuestasDocente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Respuestas</h4>
      </div>
      <div class="modal-body">
   {!! Form::open(['route' => 'createRespuestaDocente', 'method' => 'POST', 'id' => 'form-resp-create'])!!}

   <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')
 
 @for($i = 0; $i <= 2; $i++)
        <div class="form-group">
            
            {!! Form::label('name', $i.')', ['class' => 'form-group']) !!}

            {!! Form::label('contenido', 'Contenido de la respuesta', ['class' => 'form-group']) !!}
            
            {!! Form::text('name[]', null, ['class' => 'form-control', 'id' => 'respContenido']) !!}
            
            {!! Form::label('valor', 'Porcentaje de la respuesta', ['class' => 'form-group']) !!}

            {!! Form::text('valor[]', null, ['class' => 'form-control', 'id' => 'valorContenido', 'style' => 'width:40px'])!!}
            
            {!! Form::label('estado', 'Si la respuesta es correcta selecciona esta opción', ['class' => 'form-group']) !!}
            {!! Form::radio('estado', $i,['class' => 'form-control']) !!}
        </div>
    @endfor
      
     <div class="form-group">

    {!! Form::label('pregunta_docente_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('pregunta_docente_id', null, ['class' => 'form-control', 'id' => 'docentePreguntaOut', 'Style' => 'display:none']) !!}
   <hr>
   <div class="modal-footer">
      {!! Form::submit('Crear', ['class' => 'btn btn-primary', 'id' => 'createRespdocenteOut']) !!}
    </div>
  
    </div>
   
{!! Form::close()!!}  

      </div>
    </div>

  </div>
</div>