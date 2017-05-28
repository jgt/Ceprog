<div id="crearPrg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Preguntas</h4>
      </div>
      <div class="modal-body">
          
           {!! Form::open(['route' => 'crtPrediag', 'method' => 'POST', 'id' => 'stroPregunta'])!!}
        
   <div class="form-group">

  {!! Form::label('contador', 'Numero de pregunta', ['class' => 'form-group']) !!}

   {!! Form::text('contador', null, ['class' => 'form-control','id' => 'nmpEva', 'readonly' => 'readonly']) !!}
    </div>
  

  <div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'enuIcm']) !!}
    </div>

    <div class="form-group">

    {!! Form::label('area_id', 'Area', ['class' => 'form-group']) !!}
      <select name="area_id" id="crtArea" class="form-control"></select>
   
    </div>

     <div class="form-group">

    {!! Form::label('imagen', 'Imagen', ['class' => 'form-group']) !!}
    {!! Form::file('imagen', null, ['class' => 'form-control', 'id' => 'evaImg'])!!}
   
    </div>

    <div class="form-group">

  {!! Form::label('valor', 'Valor de la pregunta ', ['class' => 'form-group']) !!}

   {!! Form::text('valor', null, ['class' => 'form-control', 'id' => 'valEva', 'readonly' => 'readonly']) !!}
    </div>
  
   
     <div class="form-group">

    {!! Form::label('evaDid', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('evaDid', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'quizEva']) !!}
   
    </div>

   
{!! Form::close()!!}  

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="ctrP">Crear</a>
        <a href="#" class="btn btn-danger" id="endQuestion" data-dismiss="modal" Style="display:none">Salir</a>
      </div>
    </div>

  </div>
</div>