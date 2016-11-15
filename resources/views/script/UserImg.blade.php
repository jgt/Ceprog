<script>
	
	$(document).on('ready', function(){

		$('#clickUpdate').on('click', function(){

			var id = $('#clickAuth').val();
			var form = $('#click-form');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bid%7D').join(id);

			var formData = new FormData($('#click-form')[0]);

			$.ajax({

				url: route,
				type: metodo,
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

		        success:function(resp){

		        	alertify.alert('Tu cuenta ha sido actulizada.');

		        	var img = $('.img-circle').attr('src', '/imagen/'+resp.original_img);    
		        	var imgUser = $('.user-image').attr('src', '/imagen/'+resp.original_img);  	


		        },

		        error:function(request, error){

				if(error)
				{

					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}else{

					alertify.alert('Tu cuenta ha sido actulizada.');
				}

			}


			});

		});

	});

	

</script>