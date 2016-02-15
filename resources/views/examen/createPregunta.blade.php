@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h2 class="tamaños" id="color-letra" align="center">Preguntas de examen para la materia : {{$examen->materia->name}}</h2>
<h3 class="tamaños" id="color-letra" align="center">Evaluacion Ordinaria</h3>

<hr>

{!! Form::open(['route' => 'storePregunta', 'method' => 'POST'])!!}

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">
        
            @include('errors.error')


  <div class="form-group">

  {!! Form::label('contenido', 'Enunciado ', ['class' => 'form-group']) !!}

   {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => '3']) !!}
    </div>
  
   
     <div class="form-group alert">

    {!! Form::label('examen_id', 'Examen id', ['class' => 'form-group ']) !!}

   {!! Form::select('examen_id', [$examen->id => $examen->modalidad], null, ['class' => 'form-control']) !!}
   
    </div>

    <div class="form-group">

   {!! Form::label('numeroP', 'Preguntas creadas', ['class' => 'form-group']) !!}

   {!! Form::select('NumeroP', [$preguntas], null, [ 'class' => 'form-control', 'disabled']) !!}
   <hr>
    {!! Form::submit('Crear Pregunta', ['class' => 'btn btn-default']) !!}
    <a href="{{ route('menu')}}" class=" btn btn-warning">Ir al menu principal</a>
  
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