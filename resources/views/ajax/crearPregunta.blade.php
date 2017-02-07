<div  Style="display:none" id="preguntaExmamen">

<h2 class="tamaños" id="color-letra" align="center"></h2>
<h3 class="tamaños" id="color-letra" align="center"></h3>

  {!! Form::open(['route' => 'storePregunta', 'method' => 'POST', 'id' => 'storePregunta'])!!}
     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
 <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">

<div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control ckeditor', 'rows' => '3', 'id' => 'enunciado']) !!}
    </div>

    <div class="form-group">

  {!! Form::label('valor', 'Valor de la pregunta ', ['class' => 'form-group']) !!}

   {!! Form::text('valor', null, ['class' => 'form-control', 'id' => 'valor']) !!}
    </div>

  <div class="form-group">

    {!! Form::label('examen_id', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('examen_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'examenId']) !!}
   
    </div>

  <div class="form-group">

    {!! Form::label('porcentaje', 'Valor total del examen ', ['class' => 'form-group']) !!}

   {!! Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'porcen', 'disabled']) !!}
   
    </div>


   <div class="form-group">

   {!! Form::label('numeroP', 'Preguntas creadas', ['class' => 'form-group']) !!}

   {!! Form::text('NumeroP', null, [ 'class' => 'form-control', 'id' => 'np', 'disabled']) !!}
   <hr>
    {!! Form::submit('Crear Pregunta', ['class' => 'btn btn-default', 'id' => 'createPreg']) !!}
    <a href="#" class="btn btn-danger" id="endQuestion" Style="display:none">Salir</a>
  
  </div>
   
            </div>
           </div>
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>