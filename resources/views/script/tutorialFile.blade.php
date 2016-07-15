<script>
	
	$('#tutUp').on('click', function(e){

		e.preventDefault();

		var form = $('#form-tuto');
		var route = form.attr('action');
		var metodo = form.attr('method');
		
		var formData = new FormData($('#form-tuto')[0]);

		$.ajax({

				url: route,
				type: metodo,
				headers: { 'X-CSFR-TOKEN': token},
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

		        beforeSend:function(){

		        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   

		        },
		       
		        success:function(resp){

		        	 alertify.alert("El tutorial ha sido guardado correctamente.");
		        	 $.unblockUI();


		        },

		        error:function(error, request){

		        	if(error)
		        	{
		        		alertify.alert("Error al procesar la solicitud.");
		        		$.unblockUI();
		        	}



		        }

		});

	});

</script>