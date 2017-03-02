<div  Style="display:none" id="preguntaDocente">

  <a href="{{ route('examenDocente.index') }}" id="rangoPregunta" Style="display:none"></a>

  {!! Form::open(['route' => 'createPregDocente', 'method' => 'POST', 'id' => 'formPregDocente'])!!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
 <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">

        <div class="form-group">

  {!! Form::label('contador', 'Numero de pregunta', ['class' => 'form-group']) !!}

   {!! Form::text('contador', null, ['class' => 'form-control','id' => 'contadorDocente', 'readonly' => 'readonly']) !!}
    </div>

<div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'enunciadoDocente']) !!}
    </div>

  <div class="form-group">

    {!! Form::label('examen_docente_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('examen_docente_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'exaDoccenteId']) !!}
   
    </div>

    <div class="form-group">

    {!! Form::label('rango_id', 'Rango', ['class' => 'form-group']) !!}
      <select name="rango_id" id="rangoId" class="form-control"></select>
   
    </div>

    <div class="form-group">

     {!! Form::label('opciones', 'Numero de posibles Respuestas', ['class' => 'form-group']) !!}
    {!!Form::select('opciones', ['2', '3'], null, ['class' => 'form-control', 'id' => 'optp'])!!}
    </div>

   <div class="form-group">

   {!! Form::label('numeroP', 'Preguntas creadas', ['class' => 'form-group']) !!}

   {!! Form::text('NumeroP', null, [ 'class' => 'form-control', 'id' => 'npDocente', 'disabled']) !!}
   <hr>
    {!! Form::submit('Crear Pregunta', ['class' => 'btn btn-default', 'id' => 'pregDocente']) !!}
    <a href="#" class="btn btn-danger" id="endQuestionDocente" Style="display:none">Salir</a>
  
  </div>
   
            </div>
           </div>
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>