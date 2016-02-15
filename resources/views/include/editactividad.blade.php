<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">
        
            @include('errors.error')


  <div class="form-group">
  {!! Form::label('cognoscitivo', 'Nivel Cognitivo ', ['class' => 'form-group']) !!}

   {!! Form::textarea('cognoscitivo', null, ['class' => 'form-control', 'rows' => '3']) !!}
    </div>
  
  <div class="form-group">
   {!! Form::label('actividad', 'Nombre de la actividad ', ['class' => 'form-group']) !!}
    
   {!! Form::text('actividad', null, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
   {!! Form::label('descripcion', 'Descripción de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
   </div>

   <div class="form-group">

   {!! Form::label('objetivo', 'Objetivo ', ['class' => 'form-group']) !!}
   {!! Form::textarea('estrategia', null, ['class' => 'form-control', 'rows' => '3']) !!}

     </div>
     
   <div class="form-group">

    {!! Form::label('valoractividad', 'Valor Total de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::selectRange('valoractividad', 10, 30, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">

    {!! Form::label('unidad', 'Unidad ', ['class' => 'form-group']) !!}
   {!! Form::text('unidad', null, ['class' => 'form-control']) !!}
   </div>
  
  <div class="form-group">

    {!! Form::label('evidencia', 'Evidencias ', ['class' => 'form-group']) !!}

   {!! Form::text('evidencia', null, ['class' => 'form-control']) !!}
   </div>
  
  <div class="form-group">

   {!! Form::label('caracteristicas', 'Caracteristicas de entrega ', ['class' => 'form-group']) !!}

   {!! Form::textarea('caracteristicas', null, ['class' => 'form-control', 'rows' => '3']) !!}
  </div>
  

    <div class="form-group">

  {!! Form::label('realizacion', 'Sugerencias de realización  ', ['class' => 'form-group']) !!}

   {!! Form::textarea('realizacion', null, ['class' => 'form-control', 'rows' => '3']) !!}
    </div>
  <div class="form-group">

   {!! Form::label('codigoactividad', 'Código de la actividad ', ['class' => 'form-group']) !!}

   {!! Form::text('codigoactividad', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">

   {!! Form::label('fecha', 'Fecha Inicial :', ['class' => 'form-group']) !!}

   {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
    </div>

  <div class="form-group">

   {!! Form::label('fechaF', 'Fecha Limite:  ', ['class' => 'form-group']) !!}

   {!! Form::date('fechaF', null, ['class' => 'form-control']) !!}
    </div>

   <div class="form-group">
   {!! Form::label('rubricas_list', 'Rubricas: ', ['class' => 'form-group']) !!}

   {!! Form::select('rubricas_list', $rubricas, null, ['id' => 'rubrica_list', 'class' => 'form-control', 'multiple', 'disabled']) !!}
  </div>
  
  <div class="form-group">

   {!! Form::label('materia_id', 'Materia ', ['class' => 'form-group']) !!}

   {!! Form::select('materia_id', [$actividad->materia->id => $actividad->materia->name], null, [ 'id' => 'tag_list', 'class' => 'form-control']) !!}
   <hr>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    <a href="{{ route('portafolio', $actividad->materia )}}" class=" btn btn-warning">Retroceder</a>
  </div>

    </div>

  
        </div>

      </div>
      <div class="col-md-4 col-md-offset-1">

          <h2 class="tamaños" id="color-letra" align="center">Recomendaciones!!</h2>
          <hr>
          <ul>
            <li><p id="color-letra">Puedes activar una actividad eligiendo una fecha inicial y una fecha limite segun tus planeaciones.</p></li>
            <li><p id="color-letra">Puedes editar cualquier campo de la actividad creada menos las rubricas que tiene y la materia a la que pertenece.</p></li>
          </ul>
        </div>
    </div>
  </div>
</div>

    @section('footer')
  
  @include('script.select')
  
    @stop