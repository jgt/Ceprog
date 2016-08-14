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
        
        {!! Form::open()!!}
        {!! Form::text('posible_respuesta_id', null, ['Style' => 'display:none'])!!}
        {!! Form::text('pregunta_docente_id', null, ['Style' => 'display:none', 'id' => 'pregIdDocente'])!!}
        {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none'])!!}
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        
        <ol type="1" id="pregQuizDocente"></ol> 
        <hr> 
        <ol type="A" id="quizRespDocente"></ol>

      {!! Form::close()!!}
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="">Siguiente</a>
        <a href="#" class="btn btn-danger" Style="display:none" id="">Terminar examen</a>

        {!! Form::open(['route' => 'terminarExamen', 'method' => 'POST', 'id' => 'exForm'])!!}
              <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

              {!! Form::text('resultado', null, ['Style' => 'display:none'])!!}
              {!! Form::text('examen_id', null, ['Style' => 'display:none'])!!}
              {!! Form::text('user_id', Auth::user()->id, ['Style' => 'display:none'])!!}

              {!! Form::close()!!}
      </div>
    </div>

  </div>
</div>