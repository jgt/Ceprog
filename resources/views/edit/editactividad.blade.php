@extends('template.Maestro')

@section('content')

<div class="header"></div>

<h1 align="center"  id="principal-maestro">Actividad de la materia {{$actividad->materia->name}}</h1>
<hr>

{!! Form::model($actividad, ['route' => ['profesor.update', $actividad], 'method' => 'PUT', 'class' => 'form-group']) !!}


@include('include.editactividad', ['submitButtonText' => 'Editar Actividad'])


{!! Form::close()!!}

@stop
