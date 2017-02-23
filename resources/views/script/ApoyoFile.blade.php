<script>
		
		$(document).on('ready', function(){

			$('#apoy').on('click', function(e){

				e.preventDefault();

				var form = $('#apoyoM_id');
				var route = form.attr('action');
				var metodo = form.attr('method');
				console.log(route);

				var formData = new FormData($('apoyoM_id')[0]);

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

		        	 alertify.alert("El archivo ha sido guardado correctamente.");
		        	 $.unblockUI();


		        },

		        error:function(request, error){

				if(error == "timeout")
				{

					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}else{

					alertify.alert('Error al procesar la solicitud.');
				}

			}


				});

			});

		});

		
</script>