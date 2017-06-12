<script>
	$(document).on('ready', function(){

		$('#rptDiag').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			$('#reporteDiag').show();
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
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteCarr').fadeOut();

			if (! $.fn.DataTable.isDataTable('#reporteAlm-table')){
					  listarUser(route)
				}else{

				var tabla = $('#reporteAlm-table').DataTable();
				tabla.ajax.reload();
					
			}

		});

		$('#crt-forceRpt').on('click', function(e){

			e.preventDefault();
			var form = $('#form-forceRpt');
			var metodo = form.attr('method');
			var user = $('#dltUser').val();
			var resul = $('#dltRpt').val();
			var route = 'borrarReporte/'+resul+'/'+user;
			$(this).attr('disabled', true);
			$.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{	
					if (! $.fn.DataTable.isDataTable('#reporteAlm-table')){
					  listarUser();
					}else{

					var tabla = $('#reporteAlm-table').DataTable();
					tabla.ajax.reload();
					
					}

					$('#forceReport').modal('hide');
					alertify.alert('El reporte ha sido eliminado');
					$('#crt-forceRpt').attr('disabled', false);
					$.unblockUI();

				},

				error:function()
				{	
					alertify.alert('Error al procesar la solicitud');
					$('#crt-forceRpt').attr('disabled', false);
					$.unblockUI();
				}

			});

		});

		function listarUser(route)
		{
			var tabla = $('#reporteAlm-table').DataTable({

				destroy:true,
				processing: true,
	        	serverSide: true,
	        	ajax: route,
	        	language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	        	columns: [

	        		{data: 'name'},
	        		{data: 'carr', name: 'carreras.name'},
	        		{defaultContent:"<button type='button' class='reporte btn btn-success'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button> <button type='button' class='borrarDiag btn btn-danger'><i class='fa fa-eraser' aria-hidden='true'	></i></button>"}
	        	]

			});

			reporte('#reporteAlm-table', tabla);
			borrarDiag('#reporteAlm-table', tabla);

		}

		function reporte(tbody, tabla)
		{
			$(tbody).on("click", "button.reporte", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = 'pdfUserdiag/'+data.id;
				$.blockUI();

				$.get(route, function(resp){

					window.open(route);
					$.unblockUI();

				}).fail(function(){

					alertify.alert('Error al procesar la solicitud');
					$.unblockUI();

				});

			});	
	
		}

		function borrarDiag(tbody, tabla)
		{
			$(tbody).on("click", "button.borrarDiag", function(){
				var data = tabla.row($(this).parents('tr')).data();
				$('#forceReport').modal('show');
				$('#dltUser').val(data.id);

				$(data.resultado_diag).each(function(key, resp){

					$('#dltRpt').val(resp.id);

				});
				
			});	
	
		}


	});
</script>