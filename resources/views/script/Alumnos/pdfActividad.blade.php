<script>
	
	$(document).on('ready', function(){

		$('a#actPdfAlm').on('click', function(e){

			e.preventDefault();
			
			var route = $(this).attr('href');
			$.blockUI();

			$.get(route, function(resp){

				$(resp).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

		            if(now >= startDate &&  now <= endDate)
		            {

		            	$.unblockUI();
		            	var ruta = '/pdfActMaestro/'+value.id;
		            	window.open(ruta);

		            }else{

		            	$.unblockUI();
		            	alertify.alert("Fecha de activacion <strong>"+value.fecha+"</strong> Fecha limite de entrega <strong>"+value.fechaF+"</strong>");
		            }

				});

			})

		});

	});

</script>