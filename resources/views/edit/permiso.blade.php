@extends('template.Master')



@section('content')


<div class="header-admin"></div>

	@include('include.menuadmin')


{!! Form::model($permiso, ['route' => ['permiso.update', $permiso->id ], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

@include('include.editpermiso', ['submitButtonText' => 'Editar permiso'])


@include('errors.error')

@stop