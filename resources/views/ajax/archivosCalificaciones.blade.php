  <div id="calAct" class="col-md-10 col-md-offset-1 alert">
 
        <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default" id="usuario">
        <div class="panel-heading"></div>

        <div class="panel-body">
          <div class="form-group">

            @include('errors.error')



   {!! Form::open(['route' => ['nota', ':id'], 'method' => 'POST',  'id' => 'form-calificacion']) !!}
  
   <div class="form-group">
 {!! Form::label('user_id', 'Alumno: ', ['class' => 'control-label col-xs-2'])!!}
 {!! Form::text('user_id', null, [ 'class' => 'alert', 'id' => 'uid'])!!}
</div>
    <div class="col-lg-10">
  {!! Form::text('usuario', null, ['class' => 'form-control', 'id' => 'nameAuth'])!!}
  </div>

  </div>
  <br>

  <div  class="form-group" id="calRbr"></div>

  <div class="form-group">
  
  {!! Form::label('actividad_id', 'Actividad: ', ['class' => 'control-label col-xs-2'])!!}
  {!! Form::text('actividad_id', null, ['class' => 'alert', 'id' => 'aid'])!!}
  <div class="col-lg-10">
  {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'nameAct'])!!}
  </div>
<br>
<br>
<br>
<div class="form-group" id="porcentaje">

    <a href="#" class="btn btn-primary" data-toggle='modal' data-target='#porcentaje'><i class='fa fa-book'></i> Valor de las rubricas</a>

</div>
  <div class="form-group" id="rubricasAct"></div>
    
  <div class="form-group">
    <a href="#"class="btn btn-success" id="sumar">Calcular</a>
    <br><br>
    {!! Form::label('promedio', 'Nota ', ['class' => 'control-label col-xs-2'])!!}
    <div class="col-lg-10">
    {!! Form::text('promedio', null, ['class' => 'form-control', 'id' => 'ntoFinal'])!!}
    <hr>
    {!! Form::submit('Guardar Nota', ['class' => 'btn btn-warning', 'id' => 'subCal'])!!}
  </div>
  </div>

{!! Form::close()!!}

  </div>
  
  

        </div>
      </div>
    </div>
     </div>