@extends('template.Maestro')

@section('content')

<div class="header"></div>

<h1 align="center" class="sans" id="principal-admin">Actualizar usuario</h1>

{!! Form::model($user, ['route' => ['admin.update', $user->id ], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

@include('include.edit', ['submitButtonText' => 'Editar usuario'])


@include('errors.error')

{!! Form::close()!!}

@stop