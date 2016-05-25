<div id="mdlEditcrt" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Carrera</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'carrera.update', 'method' => 'PUT', 'form' => 'form-control', 'id' => 'form-planEdit' ]) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
         {!! Form::label('name', 'Nombre de la carrera') !!}
         {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameMedit']) !!}
         {!! Form::text('carrera_id', null, ['id' => 'carreraIdEdit', 'Style' => 'display:none']) !!}
   </div>

    <div class="form-group">
        {!! Form::label('plan', 'Plan') !!}
        {!! Form::text('plan', null, ['class' => 'form-control', 'id' => 'planNameedit' ]) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>
  
  <div class="form-group">
        {!! Form::label('revoe', 'Clave') !!}
        {!! Form::text('revoe', null, ['class' => 'form-control', 'id' => 'revoeEdit', 'rows' => '3' ]) !!}
   <input name="actividad_id" type="hidden" id="subT">
  </div>

  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="salirCrt">Salir</button>
        <a href="#" class="btn btn-primary" id="editPlancrr">Editar</a>
      </div>
    </div>

  </div>
</div>