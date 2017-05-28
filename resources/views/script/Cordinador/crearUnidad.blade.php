<script>
	
$(document).on('ready', function(){

	$('a#planeacion').on('click', function(e){

		e.preventDefault();

		var link = $('#plna').attr('href');
		var materia = $(this).parents('ul');
		var id = materia.data('id');
		var route = link.split('%7Bid%7D').join(id);
	
		$('#tbMateriaDoc').hide();
		$('div#planeacionC').fadeIn();
		$('div#examen').fadeOut();
		$('div#act').hide();
        $('div#pregunta').hide();
        $('div#listExamen').hide();
        $('div#calAct').hide();
        $('div#listAct').hide();
        $('div#listUnidades').hide();
        $('div#listSubtemas').hide();
         $('#createVideos').hide();
         $('div#vizuaUnidad').hide();
         $('div#notasRubricas').hide();
         $('#listRub').hide();
         $('#prflistTuto').hide();
         $('#listTutAlm').hide();
         	$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#alumnosListUser').hide();
			$('#listPersonal').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#froadm').hide();
			$('#preForo').hide();
			$('#listExamenDocente').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#mtaList').hide();
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

		$.get(route, function(resp){

			$(resp.materia).each(function(key, value){
				$('#asignatura').val(value.name);
				$('#materia').val(value.id);
				$('#clave').val(value.creditos);
			});

			$(resp.users).each(function(key, value){
				$('#asesor').val(value.name);
				$('#Us').val(value.id);
			});

			$(resp.semestre).each(function(key, value){
				$('#Csemes').val(value.name);
			});

		});
		
	});	
$('#crunidad').on('click', function(e){

			e.preventDefault();

			var form = $('#plcuni');
			var route = form.attr('action');
			var metodo = form.attr('method');
			CKEDITOR.instances.objetivo.updateElement();
			CKEDITOR.instances.actividadP.updateElement();
	
			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),

				success:function(resp){
					var objetivo = $('#objetivo').val();
					$('#seriacion').val(" ");
					$('#unidad').val(" ");
					$('#tema').val(" ");
					$('#actividadP').val(" ");
					$('#fechaU').val(" ");
					alertify.alert(" la unidad fue creada correctamente, a continuacion crea los subtemas de esa unidad.");
					$('#subUni').val(resp.unidad).prop('disabled', true);
					$('#subId').val(resp.id);
					$('#tem').val(resp.tema).prop('disabled', true);
				},

				error:function(resp){
					if(resp == "timeout")
					{
						alertify.alert(" Hay problemas con tu internet por favor intenta de nuevo.");
					}
					alertify.alert(" Por favor rellena todos los campos solicitados en el formulario de unidades para poder continuar.");
				}
			});
		});

$('#crearU').on('click', function(e){

			e.preventDefault();

			var form = $('#formT');
			var route = form.attr('action');
			var metodo = form.attr('method');
			CKEDITOR.instances.descSub.updateElement();

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),

				success:function(resp){
					alertify.alert(" Finalizacion exitosa.");
					$('#subT').val(" ");
					$('#descSub').val(" ");
				},
				
				error:function(resp){
					if(resp == "timeout")
					{
						alertify.alert(" Hay problemas de conexion por favor intentalo de nuevo.");
					}
					alertify.alert(" Por favor rellena todos los campos para poder continuar.");
				}
			});
		});
	
});
</script>