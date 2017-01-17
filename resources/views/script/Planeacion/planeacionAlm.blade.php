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
		    $('div#examen').hide();
		    $('div#listExamen').hide();
		    $('div#calAct').hide();
		    $('div#planeacionC').hide();
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
		}

		function listar(route)
		{
			var tabla = $('#plcalm-table').DataTable({

				filter: false,
				paging: false,
				destroy:true,
				processing: true,
	       		serverSide: true,
	       		ajax:route,
	       		language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	       		columns:[

	        		{data: 'filename'},
	        		{data: 'mime'},
	        		{defaultContent: "<button type='button' class='descargar btn btn-primary'><i class='fa fa-cloud-download' aria-hidden='true'></i></button>"}
	        					
	        		]

				});

				descargar("#plcalm-table tbody", tabla);
		}

		function descargar(tbody, tabla)
		{
			$(tbody).on("click", "button.descargar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/plcDescargar/'+data.filename;
				window.open(route);

			});
		}

	});

</script>