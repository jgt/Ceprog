<script>
	
	$(document).on('ready', function(){

		$('a#actMaestro').on('click', function(e){

			e.preventDefault();
			
			var route = $(this).attr('href');
			$.blockUI();

			$.get(route, function(resp){

				window.open(route);
				$.unblockUI();

			}).fail(function(resp){

				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				$.unblockUI();
			});

		});

	});

</script>