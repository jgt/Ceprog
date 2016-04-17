<!-- 

Las imagenes de esta vista se ingresan a travez de css, en el archivos styles.css

se utiliza el id del primer div

	*intro
	*second
	*third

-->



@extends('template.Login')

@section('content')

	<div id="intro">
		<div class="story">
	    	<div class="float-left">
			<h1 class="titulo-style">Inscripción Online</h1>
			<hr>
	        <p align="justify" class="parrafos-welcome">Si al momento de enviar tu solicitud no cuentas con todos los documentos oficiales,  como requisito para dar seguimiento a tu solicitud deberás enviar los siguientes documentos:</p>	
					
	        </div>
	    </div> <!--.story-->
	</div> <!--#intro-->
	
	<div id="second">
		<div class="story"><div class="bg">
	    	<div class="float-right">

	    		<h2  class="titulo-style">Opción 1. Formulario Online</h2>
	        	<hr>
	            <ul class="parrafos-welcome">
	            	<li>Llenar la <a class="link-welcome" href="{{ url('/admision') }}"><i class="fa fa-book"></i> Solicitud Online</a>	
	            		<li>Envía  tus documentos oficiales* <a class="link-welcome" href="http://uceprog.edu.mx/admisiones.html" target="_blank">(VER)</a>  al siguiente email <a class="link-welcome" href="#" target="_blank">inscripciones@uceprog.edu.mx</a></li>
							<li>Espera la confirmación de tu número de referencia, al email que nos proporcionaste.</li>
							<li>Realiza tus pagos eligiendo cualquiera de nuestras opciones  <a class="link-welcome" href="http://uceprog.edu.mx/servicio_general.html#tab3" target="_blank">(VER)</a></li>
							<li>Canjear el comprobante de pago por el recibo oficial directamente en caja.</li>
							<li>Presenta en admisiones o envía al email <a class="link-welcome" href="#" target="_blank">inscripciones@uceprog.edu.mx</a> tu recibo oficial.</li>
							<li>Espera la confirmación de tu inscripción como alumno CEPROG.</li>

	            </ul>
	            </div>
	        </div>
	    </div> <!--.story-->
	    
	</div> <!--#second-->
	
	<div id="third">
		<div class="story">
	    	<div class="float-left">
	    		<h2 class="titulo-style">Opción 2. Vía email</h2>
	            <hr>
	            <ul class="parrafos-welcome">
	            	<li>Descarga la solicitud de admisión dando clic <a class="link-welcome" target="_blank" href="/documentos/admision.pdf"><i class="fa fa-download"></i> Aquí</a></li>
							<li>Envía la solicitud de admisión debidamente requisitada y tus documentos oficiales*
								<a class="link-welcome" href="http://uceprog.edu.mx/admisiones.html" target="_blank">(VER)</a>  al siguiente email <a class="link-welcome" href="#" target="_blank">inscripcion@uceprog.edu.mx</a></li>
							<li>Espera la confirmación de tu número de referencia, al email que nos proporcionaste.</li>
							<li>Realiza tus pagos eligiendo cualquiera de nuestras opciones <a class="link-welcome" href="http://uceprog.edu.mx/servicio_general.html#tab3" target="_blank">(VER)</a></li>
							<li>Canjear el comprobante de pago por tu recibo oficial diectamente en caja.</li>
							<li>Presenta en admisiones o envía al email <a class="link-welcome" href="">inscripcion@uceprog.edu.mx</a> tu recibo oficial.</li>
							<li>Espera la confirmación de tu inscripción como alumno CEPROG.</li>
	            </ul>
				<hr>
	            <h3 class="titulo-style">Nota</h3>

	            <p align="justify" class="parrafos-welcome"> *Si al momento de enviar tu solicitud no cuentas con toda la documentación oficial como requisito para dar seguimiento a tu solicitud deberás enviar:</p>

	            <ul class="parrafos-welcome">
	            	<li>Acta de Nacimiento y CURP</li>
	            	<li>Certificado de estudios Bachiller o Licenciatura</li>
	            </ul>

	            <p align="justify" class="parrafos-welcome">Y tienes 30 días para complementar toda la documentación que deberás entregar en el departamento de Admisiones para completar  con tu proceso de ingreso.</p>
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

