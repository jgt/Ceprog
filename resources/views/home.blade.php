@extends('app')

@section('content')

<div class="header"></div>

@include('include.navbar')

<div class="row-fluid">
	
	<div class="container">
		
		<div class="col-md-2">
			
		<div>
											
			<a href="http://uceprog.edu.mx/Tuxtla_home_interno.html" target="_blank"><img class="foto" src="/img/tuxtla.png" alt=""></a>

		</div>

		</div>
		<div class="col-md-8">
					<div id='coin-slider'>
  					<img src='/img/carrusel/derecho.jpg' ><span>Licenciatura en Derecho</span>
 				 	<img src='/img/carrusel/doctorado_en_educacion.jpg' ><span>Doctorado en Educación</span>
 				 	<img src='/img/carrusel/ingenieria_telematica.jpg' ><span>Ingeniería en Telemática</span>
 				 	<img src='/img/carrusel/lic_adminempresasturist.jpg' ><span>Administración de Empresas Turísticas</span>
 				 	<img src='/img/carrusel/lic_arquitectura.jpg' ><span>Licenciatura en Arquitectura</span>
 				 	<img src='/img/carrusel/lic_contaduria.jpg' ><span>Licenciatura en Contaduría</span>
 				 	<img src='/img/carrusel/lic_enfermeria.jpg' ><span>Licenciatura en Enfermería</span>
 				 	<img src='/img/carrusel/lic_informatica.jpg' ><span>Licenciatura en Informática</span>
 				 	<img src='/img/carrusel/lic_mercadotecnia.jpg' ><span>Licenciatura en Mercadotecnia</span>
 				 	<img src='/img/carrusel/lic_psicologiagral.jpg' ><span>Licenciatura en Psicología</span>
 				 	<img src='/img/carrusel/mtria_derechoca.jpg' ><span>Maestria en Derecho</span>
 				 	<img src='/img/carrusel/preparatoria.jpg' ><span>Preparatoria</span>
				</div>

					<hr>
			<div class="panel panel-default">
				<div class="panel-heading">Importante!!</div>
					
				<div class="panel-body">
				
					<p class="parrafo-homes">Para consultar tu lista de actividades, haz clic en Menú Estudiante Lista de Actividades, en la parte superior. 
					</p>	

				</div>
			</div>
			
			<div align="center">
					
					<a href="http://uceprog.edu.mx/reforma_home_interno.html" target="_blank"><img class="foto-m8" src="/img/reforma.png" alt=""></a>
					<a href="http://uceprog.edu.mx/San_Cristobal_home_interno.html" target="_blank"><img class="foto-m8-dos" src="/img/sancristobal.png" alt=""></a>

				</div>

		</div>
		<div class="col-md-2">
			
			<a href="http://uceprog.edu.mx/palenque_home_interno.html" target="_blank"><img class="foto" src="/img/palenque.png" alt=""></a>

		</div>

	</div>

</div>

@stop



@section('footer')

	<footer>
		
<div class="row-fluid">

	<div class="container">
		
		<div class="col-md-6">
			<h1 class="text-center white-welcome">Universidad Ceprog <br>	
			
			</h1>

			<p class="text-center white">&copy; 2015 | Todos los derechos reservados.</p>

			<br><br>

			<p class="white text-center"><a class="link" target="_blank" href="https://www.pagalaescuela.santander.com.mx/pagalaescuela/jsp/inicio.jsp"><i class="fa fa-credit-card fa-1x"></i> Pagos en Línea</a></p>

		</div>
		<div class="col-md-6"></div>
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

	</footer>


	@stop


