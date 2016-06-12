<div id="modalRespuestas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Respuestas</h4>
      </div>
      <div class="modal-body">
   {!! Form::open(['route' => 'storeRespuesta', 'method' => 'POST', 'id' => 'storeRespuesta'])!!}

   <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')
 
 @for($i = 0; $i <= 3; $i++)
        <div class="form-group">
            
            {!! Form::label('name', $i.')', ['class' => 'form-group']) !!}
            
            {!! Form::text('name[]', null, ['class' => 'form-control', 'id' => 'nameRespUno']) !!}
            
            {!! Form::label('estado', 'Si la respuesta es correcta selecciona esta opción', ['class' => 'form-group']) !!}
            {!! Form::radio('estado', $i,['class' => 'form-control']) !!}
        </div>
    @endfor
      
     <div class="form-group" Style="display:none">

    {!! Form::label('pregunta_id', 'Examen id', ['class' => 'form-group']) !!}

   {!! Form::text('pregunta_id', null, ['class' => 'form-control', 'id' => 'prtId']) !!}
    </div>
   
{!! Form::close()!!}  

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="createResp">Crear</a>
      </div>
    </div>

  </div>
</div>