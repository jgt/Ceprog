<div Style="display:none" id="calAct">

  {!! Form::open(['route' => ['nota', ':id'], 'method' => 'POST', 'class' => 'form-group', 'id' => 'form-calificacion']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">
        
  <div class="form-group">

  {!! Form::label('user_id', 'Alumno: ', ['class' => 'form-group'])!!}
  {!! Form::text('usuario', null, ['class' => 'form-control', 'id' => 'nameAuth'])!!}
  {!! Form::text('user_id', null, ['id' => 'uid', 'Style' => 'display:none'])!!}

    </div>

    <div class="form-group">

  {!! Form::label('actividad_id', 'Actividad: ', ['class' => 'form-group'])!!}
  {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'nameAct'])!!}
  {!! Form::text('actividad_id', null, ['id' => 'aid', 'Style' => 'display:none'])!!}

    </div>
    
    <div class="form-group">

      {!! Form::label('rubrica', 'Rubricas', ['class' => 'form-group'])!!}
      <ol type="1" id="ulR"></ol>
    </div>
   
     <div class="form-group">

    {!! Form::label('promedio', 'Nota ', ['class' => 'form-group'])!!}
    {!! Form::text('promedio', null, ['class' => 'form-control', 'id' => 'ntoFinal'])!!}
    <hr>
    <a href="#" class="btn btn-success" id="sumar">Calcular</a>

    </div>

    <div class="modal-footer">
       {!! Form::submit('Guardar Nota', ['class' => 'btn btn-warning', 'id' => 'subCal'])!!}
       <a href="#" class="btn btn-danger" id="subEnd" Style="display:none">Salir</a>
      </div>

    </div>

        </div>

      </div>
    </div>
    </div>
    </div>
 

{!! Form::close()!!}  

</div>