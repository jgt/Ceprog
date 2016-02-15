<script>

		$(document).on('ready', function(){



			$('a#file').on('click', function(){

				$(this).attr('class', 'btn btn-danger');
				$(this).removeAttr('href');
				$(this).html('Sin archivos');
				alertify.alert('Esta actividad no tiene archivos.');
			});

			$('a#alumnos').on('click', function(){

				$(this).attr('class', 'btn btn-warning');
				$(this).removeAttr('href');
				$(this).html('Sin notas');
				alertify.alert('Esta actividad aun no tiene alumnos con notas.');


			});

			$('a#material').on('click', function(){

				$(this).attr('class', 'btn btn-warning');
				$(this).removeAttr('href');
				$(this).html('Sin material');
				alertify.alert('Esta actividad no tiene un matarial de apoyo.');

			});

		});

	</script>