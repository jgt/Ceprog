@extends('template.Master')


@section('content')

<div class="header-admin"></div>

	@include('include.menuadmin')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Carrera</div>

				<div class="panel-body">
				
<p>Este es el Permiso: {{ $permiso->name }}</p>
<p>la clave del permiso es: {{ $permiso->slug }}</p>


@unless ($permiso->users->isEmpty())
<h2>Usuarios</h2>

<ul>
	
	@foreach($permiso->users as $user)
	
		<li>{{ $user->name }}</li>

	@endforeach

</ul>
@endunless



				</div>
			</div>
		</div>
	</div>
</div>
@endsection