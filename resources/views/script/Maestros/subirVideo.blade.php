<script>
	$(document).on('ready', function(){

		$('#upldVideo').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			var id = $(this).attr('unidad');
			var name = $(this).attr('name');
			$('#vdoUplMaestro').modal('show');
			$('#viduniMaestro').val(id);
			$('#namUnidadMaestro').val(name);
			
		});

		$('#vdoPrf').on('click', function(e){

			e.preventDefault();

			var form = $('#my-vdoUnidad');
			var route = $('#upldVideo').attr('href');
			var metodo = form.attr('method');
			var formData = new FormData($('#my-vdoUnidad')[0]);
			$(this).attr('disabled', true);

			$.ajax({

					url: route,
					type: metodo,
					data: formData,
					contentType: false,
			        processData: false,
			        cache: false,

			        beforeSend:function(){

			        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   

			        },

			       success:function(resp){

			        	 alertify.alert("El video ha sido guardado correctamente.");
			        	 $('#vdoPrf').attr('disabled', false);
			        	 $.unblockUI();


			        },

			        error:function(request, error){

						 $('#vdoPrf').attr('disabled', false);
			        	 $.unblockUI();
						alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
					
				}

			});


		});

	});
</script>