<script>
	
	$(document).on('ready', function(){

		$('a#activarAct').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			var name = $(this).attr('name');
			var idUser = $(this).attr('idUser');
			var actividadId = $(this).attr('actividadId')
			$('#userA').val(name);
			$('#almIdsemana').val(idUser);
			$('#act_id').val(actividadId);
			$.blockUI();

			$.get(route, function(resp){

				$(resp).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

		            if(now >= startDate &&  now <= endDate)
		            {
		            	$.unblockUI();
		            	$('#respActalm').modal('show');

		            }else{

		            	$.unblockUI();
		            	alertify.alert("Fecha de activacion <strong>"+value.fecha+"</strong> Fecha limite de entrega <strong>"+value.fechaF+"</strong>");
		            }

				});

			});

		});

	});

</script>