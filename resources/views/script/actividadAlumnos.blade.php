<script>

		$(document).on('ready', function(){


			$('a#Fconsulta').attr('class', 'btn btn-warning');

			$('a#consulta').on('click', function(e){

				e.preventDefault();
				alertify.alert('Ya has respondido la actividad si quieres enviar otro archivo elimina el archivo existente.');

			});

			
			$('a#apoyo').on('click', function(e){

				e.preventDefault();
				alertify.alert('Esta actividad aun no tiene un material de apoyo.');

			});

		});

	</script>