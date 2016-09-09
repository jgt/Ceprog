<div id="udpPregDocente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
  
    {!! Form::open(['route' => 'actualizarPregunta', 'method' => 'POST', 'id' => 'act-form-Preg'])!!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">

  {!! Form::label('contador', 'Numero de pregunta', ['class' => 'form-group']) !!}

   {!! Form::text('contador', null, ['class' => 'form-control','id' => 'edtC', 'readonly' => 'readonly']) !!}
    </div>

   <div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'edtCont']) !!}
    </div>

    <div class="form-group">

    {!! Form::label('pregunta_id', 'pregunta_id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('pregunta_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'actIdpreg']) !!}
   
    </div>

  <div class="form-group">

    {!! Form::label('examen_docente_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('examen_docente_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'edtExaID']) !!}
   
    </div>
  
  <div class="form-group">

    {!! Form::label('rango_id', 'Rango', ['class' => 'form-group']) !!}
      <select name="rango_id" id="edtRango" class="form-control"></select>
      <hr>
    {!! Form::submit('Editar Pregunta', ['class' => 'btn btn-default', 'id' => 'edtPrgDoc']) !!}
    <a href="#" class="btn btn-danger" id="endQuestionDocente" Style="display:none">Salir</a>
   
    </div>


 {!! Form::close()!!}

      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>