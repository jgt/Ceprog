<script>
	
	$(document).on('ready', function(){

		$('a#ListUniSub').on('click', function(e){

			e.preventDefault();

			$('#listExamenDocente').hide();
			$('#prflistTuto').hide();
			$('#listTutAlm').hide();
			$('#preForo').hide();
			$('div#act').hide();
	        $('div#examen').hide();
	        $('div#pregunta').hide();
	        $('div#listExamen').hide();
	        $('div#calAct').hide();
	        $('div#listAct').hide();
	        $('div#listUnidades').hide();
	        $('div#listSubtemas').hide();
	        $('#createVideos').hide();
	        $('div#planeacionC').hide();
	        $('div#vizuaUnidad').show();
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
			var ul = $('ul#nameUni');
			var materia = $(this).parents('ul');
			var id = materia.data('id');
			var link = $('#idUnidad').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			
			$.get(route, function(resp){

				ul.html(" ");

				$(resp).each(function(key, value){

				ul.append("<li><a href="+value.id+" id='linkUnidad'>"+value.unidad+"</a></li>");


				});

				$('a#linkUnidad').on('click', function(e){

					e.preventDefault();

					$('#listExamenDocente').hide();
					$('#prflistTuto').hide();
					$('#listTutAlm').hide();
					$('#preForo').hide();
					$('div#act').hide();
			        $('div#examen').hide();
			        $('div#pregunta').hide();
			        $('div#listExamen').hide();
			        $('div#calAct').hide();
			        $('div#listAct').hide();
			        $('div#listUnidades').hide();
			        $('div#listSubtemas').hide();
			        $('#createVideos').hide();
			        $('div#planeacionC').hide();
			        $('div#AlmUni').hide();
			        $('#listRub').hide();
			        $('#adminPlan').hide();
					$('#admRole').hide();
					$('div#user').hide();
					$('#admForo').hide();
					$('#listTut').hide();
					$('#listPersonal').hide();
					$('#chatForo').hide();
					$('#reportes').hide();
					$('#crr').hide();
					$('#semm').hide();
					$('#mtaList').hide();
					$('#froadm').hide();
					$('#crtExamenDocente').hide();
					var id = $(this).attr('href');
					var link = $('#idSubtemas').attr('href');
					var route = link.split('%7Bid%7D').join(id);
					var ulSubtemas = $('#ulvizu');
					var video = $('#videolistUni');
					var imgSub = $('#imsub');
					
					$.get(route, function(resp){

							ulSubtemas.html(" ");
							video.html(" ");
							imgSub.html(" ");
			
						$(resp.unidad).each(function(key, value){

							$('#vizuaUnidad').show();
							$('#NaUnidad').html(value.unidad);
							$('#objUnidad').html(value.objetivo);
							$('#actpUnidad').html(value.actividadP);
							$('#temaUnidad').html(value.tema);
							$('#semestreU').html(value.semestre);
							$('#materiaU').html(value.materia);

							$(value.subtemas).each(function(key, sub){


									ulSubtemas.append("<li><h4><strong>"+sub.subtemas+"</strong></h4><p style='text-align: justify;'>"+sub.descripcion+"</p></li>");

										$(sub.imagenes).each(function(key, img){

											ulSubtemas.append("<img src='/uploads/"+img.original_filename+"'><hr>");
										});
		
							});


						});

						$(resp.videos).each(function(key, videos){


								if(videos.mime == 'video/mp4')
								{
									video.append("<li><video width='600'  height='300' controls='controls'><source src='/uploads/"+videos.original_filename+"' type='video/webm'/><source src='/uploads/"+videos.original_filename+"' type='video/ogg'/><source src='/uploads/"+videos.original_filename+"' type='video/mp4'/></video></li><hr>");
								}else{

									video.append("<li><img src='/uploads/"+videos.original_filename+"' alt=''></li><hr>");
								}

								
							});


					});

				});

			});
			

		});

		$('a#almUnidadList').on('click', function(e){

			e.preventDefault();

			$('#listExamenDocente').hide();
			$('#prflistTuto').hide();
			$('#listTutAlm').hide();
			$('#preForo').hide();
			$('div#act').hide();
	        $('div#examen').hide();
	        $('div#pregunta').hide();
	        $('div#listExamen').hide();
	        $('div#calAct').hide();
	        $('div#listAct').hide();
	        $('div#listUnidades').hide();
	        $('div#listSubtemas').hide();
	        $('#createVideos').hide();
	        $('div#planeacionC').hide();
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
			$('#crtExamenDocente').hide();
			
			var materia = $(this).parents('ul');
			var id = materia.data('id');
			var link = $('#idUnidadAlm').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			var alm = $('ul#AlmuniList');

			$.get(route, function(resp){

				alm.html(" ");
				$(resp).each(function(key, value){

					alm.append("<li><a href="+value.id+" id='Alunilist'>"+value.unidad+"</a></li>");

				});

				$('a#Alunilist').on('click', function(e){

					e.preventDefault();

					$('#listExamenDocente').hide();
					$('#prflistTuto').hide();
					$('#listTutAlm').hide();
					$('#preForo').hide();
					$('div#act').hide();
			        $('div#examen').hide();
			        $('div#pregunta').hide();
			        $('div#listExamen').hide();
			        $('div#calAct').hide();
			        $('div#listAct').hide();
			        $('div#listUnidades').hide();
			        $('div#listSubtemas').hide();
			        $('#createVideos').hide();
			        $('div#planeacionC').hide();
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
					$('#crtExamenDocente').hide();

					var id = $(this).attr('href');
					var link = $('#idSubtemasAlm').attr('href');
					var route = link.split('%7Bid%7D').join(id);
					var subtemaAlm = $('#ulalmV');
					var videosAlm = $('#ulvideoAlm');
					var imgAlm = $('#imsubAlm');

					$.get(route, function(resp){

						subtemaAlm.html(" ");
						videosAlm.html(" ");
						imgAlm.html(" ");

						$(resp.unidad).each(function(key, value){

							$('#VunidadE').show();
							$('#NaUnidadalm').html(value.unidad);
							$('#objUnidadalm').html(value.objetivo);
							$('#actpUnidadalm').html(value.actividadP);
							$('#temaUnidadalm').html(value.tema);
							$('#semestreUalm').html(value.semestre);
							$('#materiaUalm').html(value.materia);

							$(value.subtemas).each(function(key, sub){


									subtemaAlm.append("<li><h4><strong>"+sub.subtemas+"</strong></h4><p style='text-align: justify;'>"+sub.descripcion+"</p></li>");

										$(sub.imagenes).each(function(key, img){

											subtemaAlm.append("<img src='/uploads/"+img.original_filename+"'><hr>");
										});
		
							});
							

						});

						$(resp.videos).each(function(key, value){

								if(value.mime == 'video/mp4')
								{

									videosAlm.append("<li><video width='600'  height='300' controls='controls'><source src='/uploads/"+value.original_filename+"' type='video/webm'/><source src='/uploads/"+value.original_filename+"' type='video/ogg'/><source src='/uploads/"+value.original_filename+"' type='video/mp4'/></video></li><hr>");

								}else{

									videosAlm.append("<li><img src='/uploads/"+value.original_filename+"' alt=''></li><hr>");
								}

								
							});


					});

				});


			});

		});


	});

</script>