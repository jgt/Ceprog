<script>

	$('#Vimg').on('click', function(e){

		e.preventDefault();

		var form = $('#my-dropzone');
		var route = form.attr('action');
		var metodo = form.attr('method');

		var formData = new FormData($('#my-dropzone')[0]);

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

</script>