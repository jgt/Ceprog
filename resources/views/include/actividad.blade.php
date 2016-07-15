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

   {!! Form::label('materia_id', 'Materia ', ['class' => 'form-group']) !!}

   {!! Form::select('materia_id', [$materia->id => $materia->name], null, [ 'id' => 'tag_list', 'class' => 'form-control']) !!}
   <hr>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-default', 'id' => 'crtAct']) !!}
    <a href="{{ route('menu')}}" class=" btn btn-warning">Ir al menu principal</a>
  </div>

    </div>

  
        </div>

      </div>
      <div class="col-md-4 col-md-offset-1" id="recomendaciones">

          <h2 class="tamaños" id="color-letra" align="center">Recomendaciones!!</h2>
          <hr>
          <ul>
            <li><p id="color-letra">Una vez creada la actividad rellenaras los datos de la rubricas que aparece en pantalla.</p></li>
            <li><p id="color-letra">Las actividades solo puden tener un maximo de 5 rubricas y un minimo de 3 rubricas.</p></li>
            <li><p id="color-letra">Si la actividad no tiene rubricas solo podras ver un boton con nombre <span>Crear Rubricas</span>, cuando creas un minimo de 3 rubricas apecera el boton Finalizar ese boton te retorna al menu principal.</p></li>
          </ul>
        </div>
    </div>
  </div>
</div>

<div class="col-xs-offset-2 col-xs-10">


    </div>


    @section('footer')
  
  @include('script.select')
  
    @stop