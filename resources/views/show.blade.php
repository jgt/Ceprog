@extends('template.Maestro')


@section('content')
<div class="header"></div>

<div class="container">
	<div class="row">

		<h1 align="center" class="sans" id="principal-home">Datos del Usuario</h1>
		<hr>
		<div class="col-md-2">

			<img src="/img/usuario.jpg" alt="">
			<hr>
			<img class="img-show" src="/img/roles.jpg" alt="">


		</div>
		<div class="col-md-8">
			
			<div class="parrafo-showadmin">
				
				<p id="parrafo-show">Nombre del usuario: {{ $users->name}}</p>
				<p id="parrafo-show">Correo del usuario: {{ $users->cuenta}}</p>

			</div>
		
		<hr>
				<h1 align="center" class="sans" id="principal-admin">Roles del usuario</h1>

		@unless ($users->roles->isEmpty())
	
					<ul class="lista-roles">
	
						@foreach($users->roles as $role)
	
							<li>{{ $role->name }}</li>

						@endforeach

					</ul>
				@endunless
		
		</div>
		<div class="col-md-2"></div>
	</div>
	<a href="{{route('admin.index')}}" class="btn btn-warning">Retroceder</a>
</div>

@endsection
