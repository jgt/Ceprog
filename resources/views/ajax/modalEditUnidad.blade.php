
<div id="editUnidad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        
        <a href="{{ route('updateplan')}}" Style="display:none" id="updatePlan"></a>
        <a href="{{ route('editplan')}}" Style="display:none" id='editplan'></a>

        {!! Form::open(['route' => 'updateplan', 'method' => 'POST', 'class' => 'form-group', 'id' => 'edit-formplan']) !!}
           <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
            @include('errors.error')


  <div class="form-group">
  {!! Form::label('materia', 'Nombre de la asignatura ', ['class' => 'form-group']) !!}

   {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'editasignatura']) !!}
   <strong class="validation" id="asig"></strong>
    </div>

     <div class="form-group">
   {!! Form::label('semestre', 'Semestre ', ['class' => 'form-group']) !!}
    
   {!! Form::text('semestre', null, ['class' => 'form-control', 'id' => 'editsemes']) !!}
   <strong class="validation" id="semes"></strong>
   </div>
  
  <div class="form-group">
   {!! Form::label('seriacion', 'Seriacion ', ['class' => 'form-group']) !!}
    
   {!! Form::text('seriacion', null, ['class' => 'form-control', 'id' => 'editseriacion']) !!}
   <strong class="validation" id="seri"></strong>
   </div>

   <div class="form-group">
   {!! Form::label('clave', 'Clave ', ['class' => 'form-group']) !!}

   {!! Form::text('clave', null, ['class' => 'form-control', 'id' => 'editclave']) !!}
   <strong class="validation" id="cla"></strong>
   </div>

   <div class="form-group">

   {!! Form::label('objetivo', 'Objetivo ', ['class' => 'form-group']) !!}
   {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'editobjetivo']) !!}
   <strong class="validation" id="obj"></strong>

     </div>
     
    <div class="form-group">

    {!! Form::label('asesor', 'Asesor ', ['class' => 'form-group']) !!}

   {!! Form::text('asesor', null, ['class' => 'form-control', 'id' => 'editasesor']) !!}
   <strong class="validation" id="ases"></strong>
    </div>

    <div class="form-group">

    {!! Form::label('unidad', 'Unidad ', ['class' => 'form-group']) !!}
   {!! Form::text('unidad', null, ['class' => 'form-control', 'id' => 'editunidad']) !!}
   <strong class="validation" id="uni"></strong>
   </div>
  
  <div class="form-group">

    {!! Form::label('tema', 'Tema ', ['class' => 'form-group']) !!}

   {!! Form::text('tema', null, ['class' => 'form-control', 'id' => 'edittema']) !!}
   <strong class="validation" id="tem"></strong>
   </div>
  
  <div class="form-group">

   {!! Form::label('actividadP', 'Actividades de Aprendizaje ', ['class' => 'form-group']) !!}

   {!! Form::textarea('actividadP', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'editactividadP']) !!}
   <strong class="validation" id="actP"></strong>
  </div>
  

    <div class="form-group">

  {!! Form::label('fecha', 'Fecha  ', ['class' => 'form-group']) !!}

   {!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'editfechaU']) !!}
   <strong class="validation" id="fechU"></strong>
    </div>

     <div class="form-group">
      
      {!! Form::label('materia_id', 'Materia id', ['class' => 'form-group', 'Style' => 'display:none'])!!}
      {!! Form::text('materia_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'editmateria'])!!}
      <strong class="validation" id="mat"></strong>

    </div>

    <div class="form-group">
      
      {!! Form::label('unidad_id', 'Unidad id', ['class' => 'form-group alert', 'Style' => 'display:none'])!!}
      {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'unidadId'])!!}
      <strong class="validation" id="mat"></strong>

    </div>

  <div class="form-group">

   {!! Form::label('user_id', 'User id ', ['class' => 'form-group', 'Style' => 'display:none']) !!}

   {!! Form::text('user_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'editUs']) !!}
   <strong class="validation" id="user"></strong>
  </div>
    
  
      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="editU">Editar</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>