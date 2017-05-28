<div  Style="display:none" id="preguntaDiagnostico">

  {!! Form::open(['route' => 'crtPrediag', 'method' => 'POST', 'id' => 'form-evadigs', 'enctype' => 'multipart/form-data'])!!}


 <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">

        <div class="form-group">

  {!! Form::text('evaDid', null, ['id' => 'evaDid', 'style' => 'display:none']) !!}

  {!! Form::label('contador', 'Numero de pregunta', ['class' => 'form-group']) !!}

   {!! Form::text('contador', null, ['class' => 'form-control','id' => 'evaCont', 'readonly' => 'readonly']) !!}
    </div>

<div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'evaContenido']) !!}
    </div>

    <div class="form-group">

    {!! Form::label('area_id', 'Area', ['class' => 'form-group']) !!}
      <select name="area_id" id="areaId" class="form-control"></select>
   
    </div>

     <div class="form-group">

    {!! Form::label('imagen', 'Imagen', ['class' => 'form-group']) !!}
    {!! Form::file('imagen', null, ['class' => 'form-control', 'id' => 'evaImg'])!!}
   
    </div>

     <div class="form-group">

      {!! Form::label('valor', 'Valor de la pregunta ', ['class' => 'form-group']) !!}

      {!! Form::text('valor', null, ['class' => 'form-control', 'id' => 'evaValor', 'readonly' => 'readonly']) !!}
    </div>

   <div class="form-group">

    {!! Form::submit('Crear Pregunta', ['class' => 'btn btn-default', 'id' => 'pregDiag']) !!}
    <a href="#" class="btn btn-danger" id="endQuestionDocente" Style="display:none">Salir</a>
  
  </div>
   
            </div>
           </div>
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>