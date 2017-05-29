<script>
	
	$(document).on('ready', function(){

		$('a#exmList').on('click', function(e){

			e.preventDefault();

			$('#ltsMatexamen').fadeIn();
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
		    $('#calAct').fadeOut();
		    $('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();

			var route = $(this).attr('href');
			var tabla = $('#tablaLtsExm');

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp).each(function(key, value){

					$(value.examenes).each(function(key, exa){

						var now = new Date();
	            		var startDate = new Date(exa.fecha);
	            		var endDate = new Date(exa.fechaF);

						if(now >= startDate &&  now <= endDate)
						{
							tabla.append("<tr><td>"+exa.modulo+"</td><td><i class='fa fa-check' aria-hidden='true'></i> hasta("+exa.fechaF+")</td><td><button type='button' class='btn btn-primary' value="+exa.id+" Onclick='hojaResp(this)'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button></td><td><button type='button' class='btn btn-primary' value="+exa.id+" Onclick='exmPdf(this)'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button></td></tr>");

						}else{

							tabla.append("<tr><td>"+exa.modulo+"</td><td><i class='fa fa-times' aria-hidden='true'></i> hasta("+exa.fecha+")</td><td><button type='button' class='btn btn-primary' value="+exa.id+" Onclick='hojaResp(this)'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button></td><td><button type='button' class='btn btn-primary' value="+exa.id+" Onclick='exmPdf(this)'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button></td></tr>");

						}

					});

				});

			});

		});

	});

	function hojaResp(btn)
	{
		var id = btn.value;
		var route = '/hojaResp/'+id;
		$.blockUI();

		$.get(route, function(resp){

			window.open(route);
			$.unblockUI();

		}).fail(function(resp){

			$.unblockUI();
			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		});
	}

	function exmPdf(btn)
	{
		var id = btn.value;
		var route = '/impExamen/'+id;
		$.blockUI();

		$.get(route, function(resp){

			window.open(route);
			$.unblockUI();

		}).fail(function(resp){

			$.unblockUI();
			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		});
	}

</script>