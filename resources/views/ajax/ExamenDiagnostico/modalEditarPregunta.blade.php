<div id="edtPrgdiav" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Preguntas</h4>
      </div>
      <div class="modal-body">
          
           {!! Form::open(['route' => 'crtPrediag', 'method' => 'POST', 'id' => 'form-edtPregunta'])!!}
        
   <div class="form-group">

  {!! Form::label('contador', 'Numero de pregunta', ['class' => 'form-group']) !!}

   {!! Form::text('contador', null, ['class' => 'form-control','id' => 'editNmpEva', 'readonly' => 'readonly']) !!}
    </div>
  

  <div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control ckeditor', 'rows' => '3', 'id' => 'editEnuIcm']) !!}
    </div>

    <div class="form-group">

    {!! Form::text('area_id',null, [ 'id' => 'areaId', 'class' => 'form-group', 'Style' => 'display:none']) !!}
   
    </div>

     
    <div class="form-group">

  {!! Form::label('valor', 'Valor de la pregunta ', ['class' => 'form-group']) !!}

   {!! Form::text('valor', null, ['class' => 'form-control', 'id' => 'editValEva', 'readonly' => 'readonly']) !!}
    </div>
  
   
     <div class="form-group">

    {!! Form::label('evaDid', 'Examen id', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('evaDid', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'editQuizEva']) !!}
   
    </div>

     <div class="form-group">

   {!! Form::text('evaDid', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'editPregEva']) !!}
   
    </div>

   
{!! Form::close()!!}  

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-warning" id="ctrPregedit">Editar</a>
        <a href="#" class="btn btn-danger" id="endQuestion" data-dismiss="modal" Style="display:none">Salir</a>
      </div>
    </div>

  </div>
</div>