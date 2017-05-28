<div id="EvarespIn" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Respuestas</h4>
      </div>
      <div class="modal-body">
   {!! Form::open(['route' => 'crtRespdiag', 'method' => 'POST', 'id' => 'crtRespdiagIn'])!!}
 
 @for($i = 0; $i <= 3; $i++)
        <div class="form-group">
            
            {!! Form::label('name', $i.')', ['class' => 'form-group']) !!}
            
            {!! Form::text('name[]', null, ['class' => 'form-control', 'id' => 'evaNameIn']) !!}
            
            {!! Form::label('estado', 'Si la respuesta es correcta selecciona esta opción', ['class' => 'form-group']) !!}
            {!! Form::radio('estado', $i,['class' => 'form-control']) !!}

        </div>
@endfor

 {!! Form::text('pregunta_id', null, ['id' => 'prtEvaIn', 'style' => 'display:none']) !!}
      
{!! Form::close()!!}  

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="crtEvarespIn">Crear</a>
      </div>
    </div>

  </div>
</div>