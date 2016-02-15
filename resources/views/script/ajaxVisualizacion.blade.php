<script>
	
	$(document).on('ready', function(){

		$('a#ListUniSub').on('click', function(e){

			e.preventDefault();

			$('div#act').addClass('alert');
	        $('div#examen').addClass('alert');
	        $('div#pregunta').addClass('alert');
	        $('div#listExamen').addClass('alert');
	        $('div#calAct').addClass('alert');
	        $('div#listAct').addClass('alert');
	        $('div#listUnidades').addClass('alert');
	        $('div#listSubtemas').addClass('alert');
	        $('#createVideos').addClass('alert');
	        $('div#planeacionC').addClass('alert');
	        $('div#vizuaUnidad').removeClass('alert');
	        $('div#AlmUni').addClass('alert');
	        $('#listRub').addClass('alert');
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

					$('div#act').addClass('alert');
			        $('div#examen').addClass('alert');
			        $('div#pregunta').addClass('alert');
			        $('div#listExamen').addClass('alert');
			        $('div#calAct').addClass('alert');
			        $('div#listAct').addClass('alert');
			        $('div#listUnidades').addClass('alert');
			        $('div#listSubtemas').addClass('alert');
			        $('#createVideos').addClass('alert');
			        $('div#planeacionC').addClass('alert');
			        $('div#AlmUni').addClass('alert');
			        $('#listRub').addClass('alert');
					var id = $(this).attr('href');
					var link = $('#idSubtemas').attr('href');
					var route = link.split('%7Bid%7D').join(id);
					var ulSubtemas = $('#ulvizu');
					var video = $('#videolistUni');

					$.get(route, function(resp){


						$(resp.unidad).each(function(key, value){

							$('#vizuaUnidad').removeClass('alert');
							$('#NaUnidad').html(value.unidad);
							$('#objUnidad').html(value.objetivo);
							$('#actpUnidad').html(value.actividadP);
							$('#temaUnidad').html(value.tema);
							$('#semestreU').html(value.semestre);
							$('#materiaU').html(value.materia);

						});

							ulSubtemas.html(" ");
							video.html(" ");

							$(resp.subtemas).each(function(key, value){

								ulSubtemas.append("<li><h4><strong>"+value.subtemas+"</strong></h4><p style='text-align: justify;'>"+value.descripcion+"</p></li>");
							});

							$(resp.videos).each(function(key, value){

								video.append("<li><video width='600'  height='300' controls='controls'><source src='/uploads/"+value.original_filename+"' type='video/webm'/><source src='/uploads/"+value.original_filename+"' type='video/ogg'/><source src='/uploads/"+value.original_filename+"' type='video/mp4'/></video></li>");
							});

					});

				});

			});


		});

		$('a#almUnidadList').on('click', function(e){

			e.preventDefault();
			$('div#act').addClass('alert');
	        $('div#examen').addClass('alert');
	        $('div#pregunta').addClass('alert');
	        $('div#listExamen').addClass('alert');
	        $('div#calAct').addClass('alert');
	        $('div#listAct').addClass('alert');
	        $('div#listUnidades').addClass('alert');
	        $('div#listSubtemas').addClass('alert');
	        $('#createVideos').addClass('alert');
	        $('div#planeacionC').addClass('alert');
	        $('div#vizuaUnidad').addClass('alert');
	        $('div#AlmUni').addClass('alert');
	        $('#listRub').addClass('alert');
			var materia = $(this).parents('ul');
			var id = materia.data('id');
			var link = $('#idUnidad').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			var alm = $('ul#AlmuniList');

			$.get(route, function(resp){

				alm.html(" ");

				$(resp).each(function(key, value){

					alm.append("<li><a href="+value.id+" id='Alunilist'>"+value.unidad+"</a></li>");

				});

				$('a#Alunilist').on('click', function(e){

					e.preventDefault();
					$('div#act').addClass('alert');
			        $('div#examen').addClass('alert');
			        $('div#pregunta').addClass('alert');
			        $('div#listExamen').addClass('alert');
			        $('div#calAct').addClass('alert');
			        $('div#listAct').addClass('alert');
			        $('div#listUnidades').addClass('alert');
			        $('div#listSubtemas').addClass('alert');
			        $('#createVideos').addClass('alert');
			        $('div#planeacionC').addClass('alert');
			        $('div#AlmUni').addClass('alert');
			        $('#listRub').addClass('alert');

					var id = $(this).attr('href');
					var link = $('#idSubtemas').attr('href');
					var route = link.split('%7Bid%7D').join(id);
					var subtemaAlm = $('#ulalmV');
					var videosAlm = $('#ulvideoAlm');

					$.get(route, function(resp){

						$(resp.unidad).each(function(key, value){

							$('#VunidadE').removeClass('alert');
							$('#NaUnidadalm').html(value.unidad);
							$('#objUnidadalm').html(value.objetivo);
							$('#actpUnidadalm').html(value.actividadP);
							$('#temaUnidadalm').html(value.tema);
							$('#semestreUalm').html(value.semestre);
							$('#materiaUalm').html(value.materia);

						});

						subtemaAlm.html(" ");
						videosAlm.html(" ");

						$(resp.subtemas).each(function(key, value){

								subtemaAlm.append("<li><h4><strong>"+value.subtemas+"</strong></h4><p style='text-align: justify;'>"+value.descripcion+"</p></li>");
							});


						$(resp.videos).each(function(key, value){

								videosAlm.append("<li><video width='600'  height='300' controls='controls'><source src='/uploads/"+value.original_filename+"' type='video/webm'/><source src='/uploads/"+value.original_filename+"' type='video/ogg'/><source src='/uploads/"+value.original_filename+"' type='video/mp4'/></video></li>");
							});

					});

				});


			});

		});


	});

</script>