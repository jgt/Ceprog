@extends('template.Maestro')

@section('content')

<div class="header"></div>

<h1 align="center" class="sans" id="principal-admin">Actualizar role</h1>

{!! Form::model($role, ['route' => ['role.update', $role->id ], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

@include('include.editrole', ['submitButtonText' => 'Editar Grupo'])


@include('errors.error')

@stop