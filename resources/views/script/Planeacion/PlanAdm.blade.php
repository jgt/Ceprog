<script>
$.fn.dataTable.ext.search.push(
		    function( settings, data, dataIndex ) {
		        var dateStart = parseDateValue($("#dateStart").val());
				var dateEnd = parseDateValue($("#dateEnd").val());
		        var evalDate = parseDateValue(data[3]);
		 
		        if (evalDate >= dateStart && evalDate <= dateEnd) {
					return true;
				}
				else {
					return false;
				}
		    }
		);

		function parseDateValue(rawDate) {
			var dateArray= rawDate.split("/");
			var parsedDate= dateArray[1] + dateArray[2]+ dateArray[0];
			return parsedDate;
		}
		
	$(document).on('ready', function(){

		$('#planeacionAdm').on('click', function(e){

			e.preventDefault();
			ocultar();
			var route = $(this).attr('href');
			if (! $.fn.DataTable.isDataTable('#plcadmin-table')){
				listar(route);
			}else{

				var tabla = $('#plcadmin-table').DataTable();
				tabla.ajax.reload();
			}

		});

		function ocultar()
		{
			$('#admPlc').show();
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
		}

		function listar(route)
		{
			var tabla = $('#plcadmin-table').DataTable({

				filter: true,
				paging: true,
				destroy:true,
				processing: true,
	       		serverSide: true,
	       		ajax:route,
	       		language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	       		columns:[

	        		{data: 'name'},
	        		{data: 'planeacion.filename', name: 'planeacion.filename'},
	        		{data: 'planeacion.user.name', name: 'planeacion.user.name'},
	        		{data: 'planeacion.created_at', name: 'planeacion.created_at'},
	        		{defaultContent: "<button type='button' class='descargar btn btn-primary'><i class='fa fa-cloud-download' aria-hidden='true'></i></button>"}
	        					
	        		]

				});

				descargar("#plcadmin-table tbody", tabla);

				
				var dateControls= $("#baseDateControl").children("div").clone();
				$("#feedbackTable_filter").prepend(dateControls);

				$("#dateStart").keyup(function(){ 
					tabla.draw(); 
				});
				$("#dateStart").change(function(){ 
					tabla.draw(); 
				});
				$("#dateEnd").keyup(function() { 
					tabla.draw(); 
				});
				$("#dateEnd").change(function(){ 
					tabla.draw(); 
				});
		}

		function descargar(tbody, tabla)
		{
			$(tbody).on("click", "button.descargar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/plcDescargar/'+data.planeacion.filename;
				window.open(route);

			});
		}

	});
</script>