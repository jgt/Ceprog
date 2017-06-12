<script>
	
	$(document).on('ready', function(){

		$('#rptCarrdiag').on('click', function(e){

			e.preventDefault();

			$('#reporteCarr').fadeIn();
			$('#evaListAlm').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#preForo').hide();
			$('#chatForo').hide();
			$('#listPersonal').hide();
			$('#alumnosListUser').hide();
			$('#prflistTuto').hide();
			$('div#act').hide();
			$('div#listAct').hide();
			$('div#examen').fadeOut();
			$('div#listExamen').hide();
			$('div#calAct').hide();
			$('div#notasRubricas').hide();
			$('div#planeacionC').fadeOut();
			$('div#listSubtemas').hide();
			$('#createVideos').hide();
			$('#Almact').hide();
			$('#AlmUni').hide();
			$('div#vizuaUnidad').hide();
			$('div#VunidadE').hide();
			$('#listRub').hide();
			$('div#listUnidades').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#reportes').hide();
			$('#froadm').hide();
			$('#listRub').hide();
			$('#vizuaUnidad').hide();
			$('#LexamenMaestro').hide();
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
			$('#reporteDiag').hide();
			var route = $(this).attr('href');
			listarCarreras(route);

		});

		function listarCarreras(route)
		{
			var tabla = $('#reporteCarr-table').DataTable({

				destroy:true,
				processing: true,
	        	serverSide: true,
	        	ajax: route,
	        	language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	        	columns: [

	        		{data: 'name'},
	        		{defaultContent:"<button type='button' class='reporte btn btn-success'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>"}
	        	]

			});

			reporte('#reporteCarr-table', tabla);

		}

		function reporte(tbody, tabla)
		{
			$(tbody).on("click", "button.reporte", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = 'carrPdfdiag/'+data.id;
				$.blockUI();
				
				if(data.users.length >= 1)
				{
					$.get(route, function(resp){

						$.unblockUI();
						window.open(route);

					});

				}else{

					$.unblockUI();
					alert('Esta carrera no tiene ningun reporte');
				}
			});	
	
		}

	});

</script> 