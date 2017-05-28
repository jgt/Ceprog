<script>
	
	$(document).on('ready', function(){

		$('a#verAct').on('click', function(e){

			e.preventDefault();

			$('#vizuaActividad').fadeIn();
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
			$('#vizAct').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			
			var tabla = $('#tdbAct');
			var tbdRub = $('#tbdRub');
			var tbdFile = $('#tbdArchivos');
			var route = $(this).attr('href');

			$.get(route, function(resp){

				tabla.html(" ");
				tbdRub.html(" ");
				tbdFile.html(" ");

				$(resp).each(function(key, act){

					tabla.append("<h2>"+act.actividad+"</h2><hr><h3>Descripción</h3><p style='text-align: justify;'>"+act.descripcion+"</p><hr><h3>Objetivos</h3><p style='text-align: justify;'>"+act.estrategia+"</p><hr><h3>Caracteristicas</h3><p style='text-align: justify;'>"+act.caracteristicas+"</p><hr><h3>Sugerencias de realización</h3><p style='text-align: justify;'>"+act.realizacion+"</p><hr>");

					$(act.rubricas).each(function(key, rub){

						tbdRub.append("<li><h3>"+rub.name+"</h3><p style='text-align: justify;'>"+rub.descripcion+"</p></li><hr>");

					});

					$(act.apoyos).each(function(key, apo){

						var filename = apo.original_filename;
                		var cadena = filename.split(' ').join('%20');
                		$('#tltFile').html("Archivos de la actividad");
						tbdFile.append("<ul><li><a href='material/"+cadena+"'>"+apo.original_filename+"</a></li></ul>");

					});

				});

			});

		});

	});

</script>