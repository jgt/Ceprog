<script>
	
	$(document).on('ready', function(){

		$('a#Rexamen').on('click', function(e){

			e.preventDefault();

			$('#listExamenDoc').show();
			var route = $(this).attr('href');
			var tablaExamen = $('#tablaExamenesDoc');

			$.get(route, function(resp){

				tablaExamen.html(" ");

				$(resp).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

		            if(now >= startDate &&  now <= endDate)
		            {
		            	tablaExamen.append("<tr><td>"+value.name+"</td><td><button class='btn btn-success' id='Exdocente' value="+value.id+" OnClick='examenDocente(this);' data-toggle='modal' data-target='#quizDocente'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
		            }else{

		            	tablaExamen.append("<tr><td>"+value.name+"</td><td><button class='btn btn-danger'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

		            }

					

				});

			});
			

		});

	});

	function examenDocente(btn)
	{
		var id = btn.value;
		var link = $('#listPregDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var pregunta = $('#pregQuizDocente');
		var respuesta = $('#quizRespDocente');

		$.get(route, function(resp){

			pregunta.html(" ");
          	respuesta.html(" ");

          	if(resp.length == 0)
          	{
          		alertify.alert("Ya has evaluado a tu docente.");
            	$('#quizDocente').modal('hide');
            	
          	}else{

	          		$(resp).each(function(key, value){

					preguntaId = $('#pregIdDocente').val(value.id);
					pregunta.append("<li>"+value.contador+"<p>"+value.contenido+"</p></li>");

					$(value.respuestas_docentes).each(function(key, respu){
						
						respuesta.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");
						
					});
				});
          	}

			
		});
	}

</script>