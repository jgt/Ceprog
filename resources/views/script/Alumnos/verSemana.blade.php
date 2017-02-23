<script>
	
	$(document).on('ready', function(){

		$('a#verSemana').on('click', function(e){

			e.preventDefault();

			$('#vizuaSemana').fadeIn();
			$('#vizAct').fadeOut();
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
			$('#vizuaNota').fadeOut();
			
			var route = $(this).attr('href');
			var paquete = $('#vizuaSemana');
			
			$.get(route, function(resp){

				paquete.html(" ");
				
				$(resp).each(function(key, value){

					paquete.append("<h3 style='text-transform: uppercase;'><strong>"+value.materia.name+"</strong></h3><h3 style='text-transform: uppercase;'><strong>"+value.materia.semestre.name+"</strong></h3><hr><p style='text-align: justify;'>"+value.objetivo+"</p><hr><p style='text-align: justify;'>"+value.actividadP+"</p><hr><h3 style='text-transform: uppercase;'><strong>"+value.unidad+"</strong></h3><h4 style='text-transform: uppercase;'><strong>"+value.tema+"</strong></h4><hr>");

					$(value.subtemas).each(function(key, sub){

						paquete.append("<ul><li><h4><strong>"+sub.subtemas+"</strong></h4><p style='text-align: justify;'>"+sub.descripcion+"</p></li></ul>");

						$(sub.imagenes).each(function(key, img){

							paquete.append("<li style='list-style:none;'><img class='img-responsive' alt='Responsive image' src='/uploads/"+img.original_filename+"'><p>("+img.filename+")</p><hr></li>");
						});


						$(value.videos).each(function(key, video){

							if(video.mime == 'video/mp4')
							{
								paquete.append("<li style='list-style:none;'><h3><strong>Videos de la Unidad</strong></h3><video width='600'  height='300' controls='controls'><source src='/uploads/"+video.original_filename+"' type='video/webm'/><source src='/uploads/"+video.original_filename+"' type='video/ogg'/><source src='/uploads/"+video.original_filename+"' type='video/mp4'/></video></li><hr>");
							}else{

								paquete.append("<li style='list-style:none;'><img class='img-responsive' alt='Responsive image' src='/uploads/"+video.original_filename+"' alt=''></li><hr>");
							}

								
						});

					});

				});

			});

		});

	});

</script>