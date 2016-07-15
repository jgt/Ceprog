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
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Menu Cordinador</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{ url('/cordinador/create')}}">Crear Maestro</a></li>
						<li><a href="{{ url('cordinador')}}">Lista de Maestro</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Materias</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{ url('/mtmCordinador')}}">Lista de materias</a></li>
						</ul>
					</li>
	
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