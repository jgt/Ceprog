<div id="quizDocente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

      <div align="center">
        <h1>Universidad Ceprog</h1>
      </div>
      <br><br>
       <h4 align=" left"><strong>Instrucción</strong></h4>
        <p align=" left">Selecciona el inciso que contenga la respuesta correcta.</p>
      <hr>
        
        {!! Form::open(['route' => 'respDocente', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formQuizDocente'])!!}
        {!! Form::text('examen_docente_id', null, ['Style' => 'display:none', 'id' => 'exaDocId'])!!}
        {!! Form::text('posible_respuesta_id', null, ['Style' => 'display:none'])!!}
        {!! Form::text('pregunta_docente_id', null, ['Style' => 'display:none', 'id' => 'pregIdDocente'])!!}
        {!! Form::text('materia_id', null, ['Style' => 'display:none', 'id' => 'respDocMateriaId'])!!}
        {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none'])!!}
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        
        <ol type="1" id="pregQuizDocente"></ol> 
        <hr> 
        <ol type="A" id="quizRespDocente"></ol>
        <hr>
        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'nextQuizDocente'])!!}

      {!! Form::close()!!}
      </div>
      <div class="modal-footer">
       
        {!! Form::open(['route' => 'endQuiz', 'method' => 'POST', 'id' => 'exFormDocente'])!!}
              <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

              {!! Form::text('resultado', null, ['Style' => 'display:none', 'id' => 'resulDocente'])!!}
              {!! Form::text('examen_docente_id', null, ['Style' => 'display:none', 'id' => 'quizDocId'])!!}
              {!! Form::text('materia_id', null, ['Style' => 'display:none', 'id' => 'quizMateriaId'])!!}
              {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none'])!!}
              <hr>
              {!! Form::submit('Terminar examen', ['class' => 'btn btn-danger', 'id' => 'endQuizDocente','Style' => 'display:none'])!!}

              {!! Form::close()!!}
      </div>
    </div>

  </div>
</div>