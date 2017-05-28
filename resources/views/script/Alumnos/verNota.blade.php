<script>
	
	$(document).on('ready', function(){

		$('a#verNtoAlm').on('click', function(e){

			e.preventDefault();

			$('#vizuaNota').fadeIn();
			$('#vizAct').fadeOut();
			$('#vizuaSemana').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
			$('div#act').hide();
			$('div#listAct').hide();
			$('div#examen').fadeOut();
			$('div#listExamen').hide();
			$('div#calAct').hide();
			$('div#planeacionC').fadeOut();
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
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('#act').fadeOut();
			$('#crtSub').fadeOut();
			$('#editUnidad').fadeOut();
			$('#videoUnidad').fadeOut();
			$('#listSubtemas').fadeOut();
			$('#listAct').fadeOut();
			$('#calAct').fadeOut();
			$('#menUnidad').fadeOut();
			$('#vizuaPaquete').fadeOut();
			$('div#preguntaExmamen').hide();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			
			var route = $(this).attr('href');
			var tabla = $('#vizuaNota');
			$.blockUI();

			$.get(route, function(resp){

				tabla.html(" ");

				if(resp.calificaciones.length > 0)
				{	
					$.unblockUI();

					$(resp.calificaciones).each(function(key, value){

						tabla.append("<h4>Comentarios</h4><p><strong>"+value.comentario+"</strong></p><hr><h4>Promedio</h4><p><strong>"+value.promedio+"</strong></p>");

							$(value.rubricas).each(function(key, rub){

								tabla.append("<hr><ul><li>"+rub.name+"("+rub.total+")</li></ul>")

							});

					});

				}else{
					
					$.unblockUI();
					alertify.alert("Aun no tienes calificacion en esta actividad.");
				}

			});

		});

	});

</script>