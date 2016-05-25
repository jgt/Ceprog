<div class="col-md-10 col-md-offset-1" style="display:none;" id="planeacionC">
      
      <a href="{{ route('planeacion')}}" style="display:none;" id="plna"></a>

      {!! Form::open(['route' => 'storePlan', 'method' => 'POST', 'class' => 'form-group', 'id' => 'plcuni']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading" id="materiaN"></div>

        <div class="panel-body">
        
            @include('errors.error')


  <div class="form-group">
  {!! Form::label('materia', 'Nombre de la asignatura ', ['class' => 'form-group']) !!}

   {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'asignatura']) !!}
    </div>

     <div class="form-group">
   {!! Form::label('semestre', 'Semestre ', ['class' => 'form-group']) !!}
    
   {!! Form::text('semestre', null, ['class' => 'form-control', 'id' => 'Csemes']) !!}
  
   </div>
  
  <div class="form-group">
   {!! Form::label('seriacion', 'Seriacion ', ['class' => 'form-group']) !!}
    
   {!! Form::text('seriacion', null, ['class' => 'form-control', 'id' => 'seriacion']) !!}
   <strong class="validation" id="seri"></strong>
   </div>

   <div class="form-group">
   {!! Form::label('clave', 'Clave ', ['class' => 'form-group']) !!}

   {!! Form::text('clave', null, ['class' => 'form-control', 'id' => 'clave']) !!}
   </div>

   <div class="form-group">

   {!! Form::label('objetivo', 'Objetivo de la materia', ['class' => 'form-group']) !!}
   {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'objetivo']) !!}

     </div>
     
    <div class="form-group">

    {!! Form::label('asesor', 'Asesor ', ['class' => 'form-group']) !!}

   {!! Form::text('asesor', null, ['class' => 'form-control', 'id' => 'asesor']) !!}
    </div>

    <div class="form-group">

    {!! Form::label('unidad', 'Unidad ', ['class' => 'form-group']) !!}
   {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'unidad']) !!}
   </div>
  
  <div class="form-group">

    {!! Form::label('tema', 'Tema ', ['class' => 'form-group']) !!}

   {!! Form::text('tema', null, ['class' => 'form-control', 'id' => 'tema']) !!}
   </div>
  
  <div class="form-group">

   {!! Form::label('actividadP', 'Actividades de Aprendizaje ', ['class' => 'form-group']) !!}

   {!! Form::textarea('actividadP', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'actividadP']) !!}
  </div>
  

    <div class="form-group">

  {!! Form::label('fecha', 'Fecha  ', ['class' => 'form-group']) !!}

   {!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'fechaU']) !!}
    </div>

     <div class="form-group">
      
      {!! Form::label('materia_id', 'Materia id', ['class' => 'form-group', 'Style' => 'display:none'])!!}
      {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'materia'])!!}

    </div>

  <div class="form-group">

   {!! Form::label('user_id', 'User id ', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('user_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'Us']) !!}
   <hr>
    {!! Form::submit('Crear unidad', ['class' => 'btn btn-default', 'id' => 'crunidad', 'data-toggle' => 'modal', 'data-target' => '#modalUnidad']) !!}
  </div>
    
    </div>

  
        </div>
      </div>
    </div>
  </div>
</div>


      {!! Form::close() !!}

    </div>