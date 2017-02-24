<script>
	
	$(document).on('ready', function(){

		$('a#verPaquete').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').hide();
			$('#listExamenDocente').hide();
			$('#prflistTuto').hide();
			$('#listTutAlm').hide();
			$('#preForo').hide();
			$('div#act').hide();
	        $('div#examen').fadeOut();
	        $('div#pregunta').hide();
	        $('div#listExamen').hide();
	        $('div#calAct').hide();
	        $('div#listAct').hide();
	        $('div#listUnidades').hide();
	        $('div#listSubtemas').hide();
	        $('#createVideos').hide();
	        $('div#planeacionC').fadeOut();
	        $('div#vizuaUnidad').hide();
	        $('div#AlmUni').hide();
	        $('#listRub').hide();
	        $('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#mtaList').hide();
			$('#froadm').hide();
			$('#alumnosListUser').hide();
			$('#crtExamenDocente').hide();
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
			$('div#preguntaExmamen').hide();
			$('#vizuaPaquete').fadeIn();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#vizuaSemana').fadeOut();
			$('#vizAct').fadeOut();
			
			var route = $(this).attr('href');
			var paquete = $('#paquete');
			var subT = $('#subtPqt');
			var vdo = $('#videoPaquete');
			var subPaquete = $('#subPaquete');
			
			$.get(route, function(resp){

				subPaquete.html(" ");
				paquete.html(" ");
				subT.html(" ");
				
				$(resp).each(function(key, value){

					paquete.append("<h3 style='text-transform: uppercase;'><strong>"+value.materia.name+"</strong></h3><h3 style='text-transform: uppercase;'><strong>"+value.materia.semestre.name+"</strong></h3><hr><p style='text-align: justify;'>"+value.objetivo+"</p><hr><p style='text-align: justify;'>"+value.actividadP+"</p><hr><h3 style='text-transform: uppercase;'><strong>"+value.unidad+"</strong></h3><h4 style='text-transform: uppercase;'><strong>"+value.tema+"</strong></h4><hr>");

					$(value.subtemas).each(function(key, sub){

						if(sub.imagenes.length > 0)
						{
							$(sub.imagenes).each(function(key, img){
				
								subPaquete.append("<li style='list-style:none;'><h4><strong>"+sub.subtemas+"</strong></h4><p style='text-align: justify;'>"+sub.descripcion+"</p><img class='img-responsive' alt='Responsive image' src='/uploads/"+img.original_filename+"'><p>("+img.filename+")</p><hr></li>");
							});

						}else{

							subPaquete.append("<li style='list-style:none;'><h4><strong>"+sub.subtemas+"</strong></h4><p style='text-align: justify;'>"+sub.descripcion+"</p><hr></li>");

						}


						$(value.videos).each(function(key, video){

							if(video.mime == 'video/mp4')
							{
								vdo.append("<li style='list-style:none;'><h3><strong>Videos de la Unidad</strong></h3><video width='600'  height='300' controls='controls'><source src='/uploads/"+video.original_filename+"' type='video/webm'/><source src='/uploads/"+video.original_filename+"' type='video/ogg'/><source src='/uploads/"+video.original_filename+"' type='video/mp4'/></video></li><hr>");
							}else{

								vdo.append("<li style='list-style:none;'><img class='img-responsive' alt='Responsive image' src='/uploads/"+video.original_filename+"' alt=''></li><hr>");
							}

								
						});

					});

				});

			});

		});

	});

</script>