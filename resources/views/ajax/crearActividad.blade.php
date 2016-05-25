


<div class="col-md-10 col-md-offset-1" Style="display:none" id="act">
      {!! Form::open(['route' => 'profesor.store', 'method' => 'POST', 'class' => 'form-group', 'id' => 'prf']) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading" id="materiaN"></div>

        <div class="panel-body">
        
            @include('errors.error')


  <div class="form-group">
  {!! Form::label('cognoscitivo', 'Nivel Cognitivo ', ['class' => 'form-group']) !!}

   {!! Form::textarea('cognoscitivo', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'cognoscitivo']) !!}
   <strong class="validation" id="cog"></strong>
    </div>
  
  <div class="form-group">
   {!! Form::label('actividad', 'Nombre de la actividad ', ['class' => 'form-group']) !!}
    
   {!! Form::text('actividad', null, ['class' => 'form-control', 'id' => 'actividad']) !!}
   <strong class="validation" id="actdad"></strong>
   </div>

   <div class="form-group">
   {!! Form::label('descripcion', 'Descripción de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'descripAct']) !!}
   <strong class="validation" id="desc"></strong>
   </div>

   <div class="form-group">

   {!! Form::label('objetivo', 'Objetivo ', ['class' => 'form-group']) !!}
   {!! Form::textarea('estrategia', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'estrategia']) !!}
   <strong class="validation" id="est"></strong>

     </div>
     
    <div class="form-group">

    {!! Form::label('valoractividad', 'Valor Total de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::selectRange('valoractividad', 10, 40, null, ['class' => 'form-control', 'id' => 'valoractividad']) !!}
   <strong class="validation" id="valact"></strong>
    </div>
 
  <div class="form-group">

    {!! Form::label('evidencia', 'Evidencias ', ['class' => 'form-group']) !!}

   {!! Form::text('evidencia', null, ['class' => 'form-control', 'id' => 'evidencia']) !!}
   <strong class="validation" id="evi"></strong>
   </div>
  
  <div class="form-group">

   {!! Form::label('caracteristicas', 'Caracteristicas de entrega ', ['class' => 'form-group']) !!}

   {!! Form::textarea('caracteristicas', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'caracteristicas']) !!}
   <strong class="validation" id="carac"></strong>
  </div>
  

    <div class="form-group">

  {!! Form::label('realizacion', 'Sugerencias de realización  ', ['class' => 'form-group']) !!}

   {!! Form::textarea('realizacion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'realizacion']) !!}
   <strong class="validation" id="real"></strong>
    </div>

     <div class="form-group">
      
      {!! Form::label('unidad_id', 'unidad id', ['class' => 'form-group', 'Style' => 'display:none'])!!}
      {!! Form::text('unidad_id', null, ['class' => 'form-control alert', 'Style' => 'display:none', 'id' => 'unId'])!!}
      <strong class="validation" id="mat"></strong>

    </div>

  <div class="form-group">

   {!! Form::label('codigoactividad', 'Código de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::text('codigoactividad', null, ['class' => 'form-control', 'id' => 'codigoactividad']) !!}
   <strong class="validation" id="cdo"></strong>
   <hr>
    {!! Form::submit('Crear actividad', ['class' => 'btn btn-default', 'id' => 'crtAct', 'data-toggle' => 'modal', 'data-target' => '#modalRubricas']) !!}
  </div>
    
    </div>

  
        </div>

      </div>
    </div>
  </div>
</div>


      {!! Form::close() !!}

    </div>