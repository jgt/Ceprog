<script>
	
	$(document).on('ready', function(){

		$('#Ralm').on('click', function(e){

			e.preventDefault();
			var id = $('#act_id').val();
			var form = $('#respAlm');
			var metodo = form.attr('method');
			var route = '/descarga/'+id;
			var formData = new FormData($('#respAlm')[0]);
			$(this).attr('disabled', true);
			$.blockUI();

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

		        	 $('#Ralm').attr('disabled', false);
		        	 $('#respActalm').modal('hide');
		        	 alertify.alert("El archivo ha sido enviado correctamente.");
		        	 $.unblockUI();


		        },

		        error:function(error, request){

		        	if(error)
		        	{
		        		$('#Ralm').attr('disabled', false);
		        		alertify.alert("Error al procesar la solicitud.");
		        		$.unblockUI();
		        	}



		        }

			});

		});


	});

</script>