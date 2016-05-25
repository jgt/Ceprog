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
  <div class="form-group">

  {!! Form::label('name', 'Respuesta', ['class' => 'form-group']) !!}

   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameResp']) !!}
   <strong class="validation" id="respName"></strong>
    </div>

     <div class="form-group">

  {!! Form::label('contador', 'Respuesta creadas', ['class' => 'form-group']) !!}

   {!! Form::text('contador', null, ['class' => 'form-control', 'id' => 'respC', 'disabled']) !!}
    </div>


    <div class="form-group">

  {!! Form::label('estado', 'Condicion de la respuesta', ['class' => 'form-group']) !!}

   {!! Form::select('estado', [true => 'correcta', false => 'incorrecta'], null, ['class' => 'form-control']) !!}
    </div>
  
   
     <div class="form-group alert">

    {!! Form::label('pregunta_id', 'Examen id', ['class' => 'form-group ']) !!}

   {!! Form::text('pregunta_id', null, ['class' => 'form-control', 'id' => 'prtId']) !!}
    </div>
   
{!! Form::close()!!}  

      </div>
      <div class="modal-footer">
        <button type="button" id="canResp" class="btn btn-default alert" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="createResp">Crear</a>
      </div>
    </div>

  </div>
</div>