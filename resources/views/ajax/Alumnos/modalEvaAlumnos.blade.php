<div id="quizEvalm" class="modal fade" role="dialog">
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
       
        {!! Form::open(['route' => 'realizarEva', 'method' => 'POST', 'id' => 'almEvadiag'])!!}
        {!! Form::text('examen_id', null, ['Style' => 'display:none', 'id' => 'almEvaId'])!!}
        {!! Form::text('preg_id', null, ['Style' => 'display:none', 'id' => 'almPregId'])!!}
        {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none', 'id' => 'almEvaUser'])!!}
        
        <div id="divPregQuiz"></div>
        <hr> 
        <ol type="A" id="almQuizResp"></ol>

      {!! Form::close()!!}
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="almNextQuiz">Siguiente</a>
        <a href="#" class="btn btn-danger" Style="display:none" id="almEndQuiz">Terminar examen</a>

        {!! Form::open(['route' => 'resultadoEva', 'method' => 'POST', 'id' => 'endFormexa'])!!}
              <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

              {!! Form::text('resultado', null, ['Style' => 'display:none', 'id' => 'ntEx'])!!}
              {!! Form::text('evadig_id', null, ['Style' => 'display:none', 'id' => 'endExa'])!!}
              {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none'])!!}

              {!! Form::close()!!}
      </div>
    </div>

  </div>
</div>