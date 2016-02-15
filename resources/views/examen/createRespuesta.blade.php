@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h2 class="tamaños" id="color-letra" align="center">Respuestas de examen para la materia : {{$pregunta->examen->materia->name}}</h2>
<h3 class="tamaños" id="color-letra" align="center">Evaluacion Ordinaria</h3>

<hr>

{!! Form::open(['route' => 'storeRespuesta', 'method' => 'POST'])!!}

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">
        
            @include('errors.error')


  <div class="form-group">

  {!! Form::label('name', 'Respuesta', ['class' => 'form-group']) !!}

   {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">

  {!! Form::label('estado', 'Condicion de la respuesta', ['class' => 'form-group']) !!}

   {!! Form::select('estado', [true => 'correcta', false => 'incorrecta'], null, ['class' => 'form-control']) !!}
    <hr>
   {!! Form::submit('Crear Respuestas', ['class' => 'btn btn-default']) !!}
    <a href="{{ route('examenP', $pregunta->examen)}}" class=" btn btn-warning">Retroceder</a>
    </div>
  
   
     <div class="form-group alert">

    {!! Form::label('pregunta_id', 'Examen id', ['class' => 'form-group ']) !!}

   {!! Form::select('pregunta_id', [$pregunta->id => $pregunta->contenido], null, ['class' => 'form-control']) !!}
    </div>
    </div>

        </div>

      </div>
      <div class="col-md-4 col-md-offset-1">

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

{!! Form::close()!!}	

@stop