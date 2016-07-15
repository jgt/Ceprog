@extends('template.Maestro')



@section('content')

<div class="header"></div>

<h1 align="center" class="sans" id="principal-admin">Actualizar maestro {{$maestro->name}}</h1>
<hr>
{!! Form::model($maestro, ['route' => ['cordinador.update', $maestro ], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

@include('cordinador.editmaestro', ['submitButtonText' => 'Editar usuario'])


@include('errors.error')

@stop