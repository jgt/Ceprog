<script>
	$(document).on('ready', function(){

		$('#planeacionAdm').on('click', function(e){

			e.preventDefault();
			ocultar();
			var route = $(this).attr('href');
			listar(route);

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
			$('#plcList').hide();
		}

		function listar(route)
		{
			var tabla = $('#plcadmin-table').DataTable({

				destroy:true,
				processing: true,
	       		serverSide: true,
	       		ajax:route,
	       		language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	       		columns:[

	        		{data: 'name'},
	        		{data: 'planeacion.filename', name: 'planeacion.filename'},
	        		{data: 'planeacion.user.name', name: 'planeacion.user.name'},
	        		{defaultContent: "<button type='button' class='descargar btn btn-primary'><i class='fa fa-cloud-download' aria-hidden='true'></i></button>"}
	        					
	        		]

				});

				descargar("#plcadmin-table tbody", tabla);
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