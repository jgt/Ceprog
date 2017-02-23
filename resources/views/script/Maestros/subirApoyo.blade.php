<script>
	
	$(document).on('ready', function(){

		$('a#udpApoyo').on('click', function(e){

			e.preventDefault();

			var name = $(this).attr('name');
			var actividad = $(this).attr('actividad');
			var id = $(this).attr('user');
			$('#udptactMta').modal('show');
			$('#AuthUserUdp').val(name);
			$('#authUser_id').val(id);
			$('#actapoyo_id').val(actividad);


		});


		$('#updMatApoy').on('click', function(e){

			e.preventDefault();

			e.preventDefault();
			var id = $('#actapoyo_id').val();
			var form = $('#apoyoUpd_id');
			var metodo = form.attr('method');
			var route = '/uploadsApoyo/'+id
			var formData = new FormData($('#apoyoUpd_id')[0]);

			$.ajax({

			 	url: route,
				type: metodo,
				data: formData,
				contentType: false,
			    processData: false,
			    cache: false,

			        beforeSend:function()
			        {
			        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   
			        },
			       
			        success:function(resp)
			        {
			        	 alertify.alert("El archivo  ha sido guardado correctamente.");
			        	 $.unblockUI();
			        },

			        error:function(error, request)
			        {
			        	alertify.alert("Error al procesar la solicitud.");
			        	$.unblockUI();	
			        }
			});

		});

	});

</script>