<script>
	
	$(document).on('ready', function(){

		$('a#Rexamen').on('click', function(e){

			e.preventDefault();

		$('#crtExamenDocente').hide();
        $('#mtaList').hide();
        $('#crr').hide();
        $('#semm').hide();
        $('#listTutAlm').hide();
        $('#preForo').hide();
        $('#froadm').hide();
        $('#chatForo').hide();
        $('div#act').hide();
        $('div#listAct').hide();
        $('div#examen').hide();
        $('div#listExamen').hide();
        $('div#calAct').hide();
        $('div#planeacionC').hide();
        $('div#listSubtemas').hide();
        $('#createVideos').hide();
        $('div#listAct').hide();
        $('#Almact').hide();
        $('div#vizuaUnidad').hide();
        $('div#AlmUni').hide();
        $('div#VunidadE').hide();
        $('div#calAct').hide();
        $('div#notasRubricas').hide();
        $('#listRub').hide();
        $('#listTutAlm').hide();
        $('#adminPlan').hide();
        $('#admRole').hide();
        $('div#user').hide();
        $('#admForo').hide();
        $('#listTut').hide();
        $('div#listUnidades').hide();
        $('#listPersonal').hide();
        $('#prflistTuto').hide();
        $('#crr').hide();
        $('#alumnosListUser').hide();
        $('#listExamenDocente').hide();
        $('#listPreg').hide();
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
		            	tablaExamen.append("<tr><td>"+value.name+"</td><td><button class='btn btn-success' id='Exdoc' value="+value.id+" OnClick='examenDocente(this);' data-toggle='modal' data-target='#quizDocente'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
		            }else{

		            	tablaExamen.append("<tr><td>"+value.name+"</td><td><button class='btn btn-danger'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

		            }

					

				});

			});
			

		});

		$('#nextQuizDocente').on('click', function(e){

			e.preventDefault();

			var id = $('#exaDocId').val();
			var form = $('#formQuizDocente');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bid%7D').join(id);

			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp){

	            	var link = $('#listPregDocente').attr('href');
	            	var route = link.split('%7Bid%7D').join(id);
	            	var pregunta = $('#pregQuizDocente');
					var respuesta = $('#quizRespDocente');

					$.get(route, function(resp){

						pregunta.html(" ");
          				respuesta.html(" ");

          				var resultado = $('#resulDocente').val(resp.nota);
						
						if(resp.pregunta.length == 0)
			          	{
			          		alertify.alert("Gracias por tu opinión.");
			            	$('#nextQuizDocente').hide();
                  			$('#endQuizDocente').show();
			            	
			          	}else{

				          		$(resp).each(function(key, value){

								$(value.pregunta).each(function(key, preg){

									preguntaId = $('#pregIdDocente').val(preg.id);
									pregunta.append("<li>"+preg.contador+"<p>"+preg.contenido+"</p></li>");

									$(preg.respuestas_docentes).each(function(key, respu){
									
										respuesta.append("<li><input type='radio' name='posible_respuesta_id' value="+respu.id+">"+respu.name+"</li>");
									
									});
								});

							});
			          	}
					});


	            },

	            error:function(error, $request){

	            	 if(error)
              		{
                		alertify.alert("Recuerda que tienes que responder la pregunta.");
              		}

	            }

			});


		});

		$('#endQuizDocente').on('click', function(e){

			e.preventDefault();

			var form = $('#exFormDocente');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp){

	            	alertify.alert('El quiz ha terminado gracias por tu tiempo.');
	            	$('#quizDocente').modal('hide');

	            },

	            error:function(error, request){

	            	if(error)
              		{
                		alertify.alert("Error al procesar la solicitud.");
              		}
	            }

			});

		});

	});

	function examenDocente(btn)
	{
		var id = btn.value;
		var examenId = $('#exaDocId').val(id);
		var link = $('#listPregDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var pregunta = $('#pregQuizDocente');
		var respuesta = $('#quizRespDocente');
		var examenId = $('#quizDocId').val(id);

		$.get(route, function(resp){
	
			pregunta.html(" ");
          	respuesta.html(" ");

          	if(resp.pregunta.length == 0)
          	{
          		alertify.alert("Ya has evaluado a tu docente.");
            	$('#quizDocente').modal('hide');
            	
          	}else{

	          		$(resp).each(function(key, value){

					$(value.pregunta).each(function(key, preg){

						preguntaId = $('#pregIdDocente').val(preg.id);
						pregunta.append("<li>"+preg.contador+"<p>"+preg.contenido+"</p></li>");

						$(preg.respuestas_docentes).each(function(key, respu){
						
							respuesta.append("<li><input type='radio' name='posible_respuesta_id' value="+respu.id+">"+respu.name+"</li>");
						
						});
					});

				});
          	}

			
		});
	}

</script>