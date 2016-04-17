<!-- 
	
	Esta vista extiende del template.login 

		las imagenes que se insertan se hacen atraez de css en el archivo styles.css

		

-->


@extends('template.Login')

@section('content')

	<div id="intro">
		<div class="story">
	    	<div class="float-left">
			<h1 class="titulo-style">Reinscripción Online</h1>
			<hr>
	        <p align="justify" class="parrafos-welcome">A continuación te presentamos dos opciones, para que realices tu proceso de Reinscripción Online.</p>	
					
	        </div>
	    </div> <!--.story-->
	</div> <!--#intro-->
	
	<div id="segundo">
		<div class="story"><div class="bg">
	    	<div class="float-right">

	    		<h2  class="titulo-style">Opción 1. Formulario Online</h2>
	        	<hr>
	            <ul class="parrafos-welcome">
	            	<li>Llenar el formulario Online <br> <a class="link-welcome" href="{{ url('/reinscripcion') }}"><i class="fa fa-book"></i> Reinscripción Online</a>	
							<li>Esperar notificación del departamento de Tutorías.</li>
							<li>Realiza tus pagos eligiendo cualquiera de nuestras opciones <a class="link-welcome" href="http://uceprog.edu.mx/servicio_general.html#tab3" target="_blank">(VER)</a></li>
	            </ul>
	            </div>
	        </div>
	    </div> <!--.story-->
	    
	</div> <!--#second-->
	
	<div id="tercero">
		<div class="story">
	    	<div class="float-left">
	    		<h2 class="titulo-style">Opción 2. Vía email</h2>
	            <hr>
	            <ul class="parrafos-welcome">
	            	<li>Descarga formato de Reinscripción haciendo clic   <a class="link-welcome" target="_blank" href="/documentos/ReInscripción.pdf"><i class="fa fa-download"></i> Aquí</a></li>
							<li>Envíar formato debidamente llenado al siguiente email  <a class="link-welcome" href="#" target="_blank">inscripcion@uceprog.edu.mx</a></li>
							<li>Esperar notificación del departamento de Tutorías.</li>
							<li>Realiza tus pagos eligiendo cualquiera de nuestras opciones <a class="link-welcome" href="http://uceprog.edu.mx/servicio_general.html#tab3" target="_blank">(VER)</a></li>
	            </ul>
	        </div>
	    </div> 
	</div> 
@endsection

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


@stop