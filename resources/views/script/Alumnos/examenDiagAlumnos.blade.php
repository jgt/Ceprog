<script>
	
	$(document).on('ready', function(){

		$('#almEva').on('click', function(e){

			e.preventDefault();

			$('#evaListAlm').fadeIn();
			var route = $(this).attr('href');
			listar(route);

		});

		function listar(route)
		{	
			var tabla = $('#tablaEvaalm');

			$.get(route, function(resp){

				tabla.html(' ');

				$(resp).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

		            if(now >= startDate &&  now <= endDate)
		            {

		              tabla.append("<tr><td>"+value.name+"</td><td><strong>Activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='realizarEva(this)'><i class='fa fa-pencil-square-o'></i></td></tr>");

		            }else{
		              
		              tabla.append("<tr><td>"+value.name+"</td><td><strong>No activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><strong>No disponible</strong></td></tr>");

		            }


				});


			});
		}

	});

	function realizarEva(btn)
	{
		var id = btn.value;
		$('#quizEvalm').modal('show');
	}

</script>