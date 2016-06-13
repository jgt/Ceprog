<div id="quiz" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <a href="{{ route('pdfExamen')}}" id="pdfExamen" Style="display:none"></a>

        {!! Form::open(['route' => 'resultadoExamen', 'method' => 'POST', 'id' => 'dpg'])!!}
        {!! Form::text('examen_id', null, ['Style' => 'display:none', 'id' => 'exaId'])!!}
        {!! Form::text('pregunta_id', null, ['Style' => 'display:none', 'id' => 'pregId'])!!}
        {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none', 'id' => 'preguntaId'])!!}
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

        <div id="pregQuiz"></div> 
        <hr> 
        <ul id="quizResp"></ul>

      {!! Form::close()!!}
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="nextQuiz">Siguiente</a>
        <a href="#" class="btn btn-danger" Style="display:none" id="endQuiz">Terminar examen</a>

        {!! Form::open(['route' => 'terminarExamen', 'method' => 'POST', 'id' => 'exForm'])!!}
              <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

              {!! Form::text('resultado', null, ['Style' => 'display:none', 'id' => 'ntEx'])!!}
              {!! Form::text('examen_id', null, ['Style' => 'display:none', 'id' => 'qexaId'])!!}
              {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none'])!!}

              {!! Form::close()!!}
      </div>
    </div>

  </div>
</div>