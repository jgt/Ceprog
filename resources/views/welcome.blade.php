@extends('template.Login')
@section('title'){{'Portal UC'}}@endsection
@section('content')

@include('include.menuLogin')


<div class="container-fluid">
	<div class="row" id="menulogin">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-sign-in"></i> Virtual UC</a></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Lo siento tienes erroes!</strong> Hay algunos errores en los campos.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Numero de cuenta</label>
							<div class="col-md-6">
								<input type="cuenta" class="form-control" name="cuenta" value="{{ old('cuenta') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recordar
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('footer')
		
<div class="row-fluid">

	<div class="container">
		
		<div class="col-md-6">
			<h1 class="text-center white-welcome">Universidad Ceprog <br>	
			
			</h1>

			<p class="text-center white">&copy; 2015 | Todos los derechos reservados.</p>

			<br><br>

			<p class="white text-center"><a class="link" target="_blank" href="https://www.pagalaescuela.santander.com.mx/pagalaescuela/jsp/inicio.jsp"><i class="fa fa-credit-card fa-1x"></i> Pagos en Línea</a></p>

		</div>
		<div class="col-md-6" id="contacto"></div>
			<div class="col-md-6">
				
				<legend class="text-center white">Contacto</legend>
				<p class="white text-center"><a class="tomato" target="_blank" href="http://uceprog.edu.mx/" ><i class="fa fa-external-link"></i> www.uceprog.edu.mx</a></p>
				<p class="white text-center"><i class="fa fa-envelope"></i> contacto@uceprog.edu.mx</p>
				<p class="white text-center"><i class="fa fa-facebook-official"></i> uceprog.com</p>
				<p class="white text-center"><i class="fa fa-twitter"></i> ceproguc</p>

			</div>

		</div>

	</div>

</div>


@stop




