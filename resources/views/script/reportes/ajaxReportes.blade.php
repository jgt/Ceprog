<script>
	
	$(document).on('ready', function(){

		$('#reportesCarrera').on('click', function(e){

			e.preventDefault();
			
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
			$('#reportes').show();
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
		  $('#vizuaPaquete').fadeOut();
		  $('#calAct').fadeOut();
		  $('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			
			var route = $('#reportesCarrera').attr('href');
			var tablaReporte = $('#tablaReportes');

			$.get(route, function(resp){

				tablaReporte.html(" ");

				$(resp).each(function(key, value){

					tablaReporte.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='carrerasPdf(this);' value="+value.id+"><i class='fa fa-file-word-o' aria-hidden='true'></i></button></td></tr>");

				});
			});

		});

		$('a#campusReporte').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			$.blockUI();

			$.get(route, function(resp){

				$.unblockUI();
				window.open(route);

			}).fail(function(resp){

				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			});

		});

		$('a#almEncuesta').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			$.blockUI();

			$.get(route, function(resp){

				$.unblockUI();
				window.open(route);

			}).fail(function(resp){

				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");

			});

		});

	});

	function carrerasPdf(btn){

		var id = btn.value;
		var link = $('#pdfCar').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}

</script>