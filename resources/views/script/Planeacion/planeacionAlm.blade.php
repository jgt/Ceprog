<script>
	
	$(document).on('ready', function(){

		$('a#listplcAlm').on('click', function(e){

			e.preventDefault();
			ocultar();
			var route = $(this).attr('href');
			listar(route);
			
		});

		function ocultar()
		{
			$('#plcAlm').show();
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
			$('#admPlc').hide();
			$('#plcList').hide();
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
		  $('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
		}

		function listar(route)
		{
			var tabla = $('#tablaPlaneacionAlm');

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp).each(function(key, value){


					var filename = value.original_filename;
					var cadena = filename.split(' ').join('%20');
					tabla.append("<tr><td>"+value.filename+"</td><td>"+value.mime+"</td><td><button type='button' class='btn btn-primary' value="+cadena+" OnClick='file(this)'><i class='fa fa-download' aria-hidden='true'></i></tr>");

				});

			});
		}

	});

	function file(btn)
	{
		var route = '/plcDescargar/'+btn.value;
		$.blockUI();

		$.get(route, function(resp){

			$.unblockUI();
			window.open(route);

		}).fail(function(resp){

			$.unblockUI();
			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");

		});
	}

</script>