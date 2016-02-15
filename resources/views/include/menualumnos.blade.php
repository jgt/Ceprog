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
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i> Menu Estudiante</a>
						<ul class="dropdown-menu" role="menu">	
						<li><a href="{{url('/mat')}}">Carreras disponibles</a></li>
						</ul>
					</li>
	
					 <!--<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-archive"></i> Archivos</a>
						<ul class="dropdown-menu" role="menu">	
							<li><a href="{{url('/descarga')}}"><i class="fa fa-archive"></i> Archivos adjuntos</a></li>
						<li><a href="{{url('/arenviados')}}"><i class="fa fa-archive"></i> Archivos recibidos</a></li>
						</ul>
					</li>-->
					<li><a href="{{url('/archivos')}}"><i class="fa fa-archive"></i> Archivos adjuntos</a></li>

					
					<li class="dropdown">
						<a  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file-pdf-o"></i> Información</a>

						<ul class="dropdown-menu" role="menu">	
							<li><a href="/documentos/presentacion.jpg">Secuencia de curso</a></li>
						</ul>
					</li>

				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user "></i> {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i>  {{ trans('validation.attributes.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>