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
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split('%7Bid%7D').join(id);
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

		        error:function(request, error){

				if(error == "timeout")
				{
					$('#mtrPlc').attr('disabled', false)
		       		$.unblockUI();
					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}else{

					$('#mtrPlc').attr('disabled', false)
		       		$.unblockUI();
					alertify.alert('Error al procesar la solicitud, esta materia ya tiene una planeacion.');
				}

			}

		});
		
	});

		$('a#mtaPlan').on('click', function(e){

			e.preventDefault();
			var route = $(this).attr('href');
			ocultar();
			if (! $.fn.DataTable.isDataTable('#planeacion-table')){
				listar(route);
			}else{

				var tabla = $('#planeacion-table').DataTable();
				tabla.ajax.reload();
			}
			
		});

		$('#crt-deletePlc').on('click', function(e){

			e.preventDefault();
			var id = $('#idDeletePlc').val();
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
					if (! $.fn.DataTable.isDataTable('#planeacion-table')){
						listar();
					}else{

						var tabla = $('#planeacion-table').DataTable();
						tabla.ajax.reload();
					}
					$('#crt-deletePlc').attr('disabled', false);
					$('#borrarPlc').modal('hide');
					$.unblockUI();
					alertify.alert("El archivo ha sido borrado correctamente.");
				},

				error:function(error, request)
				{
					if(error)
					{
						$('#crt-deletePlc').attr('disabled', false);
						$.unblockUI();
						alertify.alert("Error al procesar la solicitud.");
					}
				}

			});

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
			$('#plcList').show();
			$('#plcAlm').hide();
		}

		function listar(route)
		{
			var tabla = $('#planeacion-table').DataTable({

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
	        		{defaultContent: "<button type='button' class='descargar btn btn-primary'><i class='fa fa-cloud-download' aria-hidden='true'></i></button> <button type='button' class='borrar btn btn-danger'><i class='fa fa-eraser' aria-hidden='true'></i></button>"}
	        					
	        		]

				});

				descargar("#planeacion-table tbody", tabla);
				borrar("#planeacion-table tbody", tabla);
		}

		function descargar(tbody, tabla)
		{
			$(tbody).on("click", "button.descargar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/plcDescargar/'+data.filename;
				window.open(route);

			});

		}

		function borrar(tbody, tabla)
		{
			$(tbody).on("click", "button.borrar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				$('#borrarPlc').modal('show');
				$('#idDeletePlc').val(data.id);

			});
		}

	});

</script>