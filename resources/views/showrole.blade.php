@extends('template.Maestro')

@section('content')

<div class="header"></div>

<div class="container">
	<div class="row">
	
	<h1 align="center" class="sans" id="principal-home">Datos del role</h1>
	<hr>
	<div class="col-md-2">
		
		    <img src="/img/usuario.jpg" alt="">
			<hr>
			<img class="img-show" src="/img/roles.jpg" alt="">

	</div>
	<div class="col-md-8">
		
		<div class="parrafo-showadmin">
				
				<p id="parrafo-show">Nombre del role: {{ $role->name }}</p>
				<p id="parrafo-show">Slug del role : {{ $role->slug }}</p>

			</div>
			<hr>
			<h1 align="center" class="sans" id="principal-admin">Usuarios</h1>




<ul class="lista-roles">
	
	@foreach($role->users as $user)
	
		<p class="parrfo-show">Nombre : {{ $user->name }}</p>
		<p class="parrafo-show">Email: {{ $user->cuenta }}</p>
	@endforeach
</ul>


	</div>
	<div class="col-md-2"></div>
</div>
<a href="{{route('role.index')}}" class="btn btn-warning">Retroceder</a>	
@endsection
