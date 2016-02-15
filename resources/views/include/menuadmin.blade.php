<nav class="navbar navbar-default">
		<div class="container-fluid optimal">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Menu Usuario</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{ url('/admin/create')}}">Crear Usuarios</a></li>
						<li><a href="{{	url('/admin')}}">Lista del Personal</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Menu Grupo</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{url('/role/create')}}">Crear Grupo</a></li>
						<li><a href="{{url('/role')}}">Lista de Grupos</a></li>
						</ul>
					</li>


					<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Nuevo Foro</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{url('/foro')}}">Crear Foro</a></li>
						<li><a href="{{url('/listForo')}}">Lista de Foros</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Plan de estudio</a>
						<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/carrera/create')}}">Crear Carrera (Plan)</a></li>	
						<li><a href="{{ url('/carrera')}}">Lista de carreras</a></li>
						<li><a href="{{ url('/materia')}}">Lista de materias</a></li>
						</ul>
					</li>

					<!--<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Menu Carreras</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{url('/permiso/create')}}">crear carrera</a></li>
						<li><a href="{{url('/permiso')}}">Asignar carrera</a></li>
						</ul>
					</li>-->

					
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user "></i>  {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('validation.attributes.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>

			</div>
		</div>
	</nav>