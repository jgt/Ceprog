<script>
	
	$(document).on('ready', function(){

		$('a#plcMaestro').on('click', function(e){

			e.preventDefault();

			$('#plcModal').modal('show');
			$('#plcList').hide();
			var route = $(this).attr('href');

			$.get(route, function(resp){

				$('#plcMat').val(resp.id);

			});

		});


		$('#mtrPlc').on('click', function(e){

		e.preventDefault();

		var id = $('#plcMat').val();
		var form = $('#my-planeacion');
		var metodo = form.attr('method');
		var route = '/plcStore/'+id;
		$(this).attr('disabled', true);
		$.blockUI();

		var formData = new FormData($('#my-planeacion')[0]);

		$.ajax({

				url: route,
				type: metodo,
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

		       success:function(resp){

		       		$('#plcModal').modal('hide');
		       		$('#mtrPlc').attr('disabled', false);
		        	 alertify.alert("La planeacion se ha subido correctamente.");
		        	 $.unblockUI();


		        },

		        error:function(request, error)
		        {

					$('#mtrPlc').attr('disabled', false)
		       		$.unblockUI();
					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
	
				}

		});
		
	});

		$('a#mtaPlan').on('click', function(e){

			e.preventDefault();
			var route = $(this).attr('href');
			ocultar();
			listar(route);
			
		});

		function ocultar()
		{
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
			$('#plcList').show();
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
		  $('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();
		}

	});

	function listar(route)
	{
		var tabla = $('#tablaPlaneacion');

		$.get(route, function(resp){

			tabla.html(" ");

			$(resp).each(function(key, value){

				var filename = value.original_filename;
				var cadena = filename.split(' ').join('%20');
				tabla.append("<tr><td>"+value.filename+"</td><td>"+value.mime+"</td><td><button type='button' class='btn btn-primary' value="+cadena+" OnClick='file(this)'><i class='fa fa-download' aria-hidden='true'></i><td><button type='button' class='btn btn-danger' id='borrarFile' value="+value.id+" OnClick='borrarFile(this)'><i class='fa fa-eraser' aria-hidden='true'></i></button></td></button></td></tr>")

			});

		});
	}

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

	function borrarFile(btn)
	{
		var id = btn.value;
		var form = $('#form-deletePlc');
		var metodo = form.attr('method');
		var route = '/borrarPlc/'+id;
		$(this).attr('disabled', true);
		$.blockUI();

		$.ajax({

			url:route,
			type:metodo,
			data:form.serialize(),

			success:function(resp)
			{
				$('#borrarFile').attr('disabled', false);
				$.unblockUI();
				alertify.alert("El archivo ha sido borrado correctamente.");
				listar(route);
			},

			error:function(error, request)
			{
				if(error)
				{
					$('#borrarFile').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud.");
				}
			}
		});
	}

</script>