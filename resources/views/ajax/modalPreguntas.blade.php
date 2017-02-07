<div id="crearPreguntas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Preguntas</h4>
      </div>
      <div class="modal-body">
          
           {!! Form::open(['route' => 'storePregunta', 'method' => 'POST', 'id' => 'storePreguntaIcm'])!!}
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        
    @include('errors.error')


  <div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control ckeditor', 'rows' => '3', 'id' => 'enunciadoIcm']) !!}
    </div>

    <div class="form-group">

  {!! Form::label('valor', 'Valor de la pregunta ', ['class' => 'form-group']) !!}

   {!! Form::text('valor', null, ['class' => 'form-control', 'id' => 'valorIcm']) !!}
    </div>
  
   
     <div class="form-group">

    {!! Form::label('examen_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('examen_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'quizId']) !!}
   
    </div>

    <div class="form-group">

    {!! Form::label('porcentaje', 'Puntos del examen', ['class' => 'form-group']) !!}

   {!! Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'porcenIcm', 'disabled']) !!}
   {!! Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'icm', 'Style' => 'display:none']) !!}
   
    </div>

    <div class="form-group">

   {!! Form::label('numeroP', 'Preguntas creadas', ['class' => 'form-group']) !!}

   {!! Form::text('NumeroP', null, [ 'class' => 'form-control', 'id' => 'npIcm', 'disabled']) !!}
     
  </div>

{!! Form::close()!!}  

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="createP">Crear</a>
        <a href="#" class="btn btn-danger" id="endQuestion" data-dismiss="modal" Style="display:none">Salir</a>
      </div>
    </div>

  </div>
</div>