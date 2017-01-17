<script>

	$(document).on('ready', function(){
		
		$('#recursos').on('click', function(e){
			e.preventDefault();
			$('#recursoVideo').modal('show');
		});

		$('#createRecurso').on('click', function(e){

				e.preventDefault();

				var form = $('#form-recurso');
				var route = form.attr('action');
				var metodo = form.attr('method');

				var formData = new FormData($('#form-recurso')[0]);

				$.ajax({

					url: route,
					type: metodo,
					data: formData,
					contentType: false,
			        processData: false,
			        cache: false,

			         beforeSend:function(){

			         	$('#createRecurso').attr('disabled', true);
		        	 	$.blockUI();   

		        	},

			        success:function(resp){

			        	$('#createRecurso').attr('disabled', false);
			        	$('#recursoName').val(" ");
			        	$('#descripcionRecurso').val(" ");
		        	 	alertify.alert("El recurso ha sido creado correctamente.");
		        	 	$.unblockUI();
		        	 
		        	},

			        error:function(request, error){

						if(error == "timeout")
						{
							$.unblockUI();
							$('#createRecurso').attr('disabled', false);
							alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
						}else{

							$.unblockUI();
							$('#createRecurso').attr('disabled', false);
							alertify.alert('Error al procesar la solicitud.');
						}

					}

				});

			});


		$('#listRecurso').on('click', function(e){

			e.preventDefault();
			var tabla = $('#tablaRecurso');
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
			$('#listRec').show();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			listar();	

		});

		$('#upRecursos').on('click', function(e){

						e.preventDefault();
						var id = $('#idRecurso').val();
						var form = $('#form-recursoUpdate');
						var metodo = form.attr('method');
						var link = form.attr('action');
						var route = link.split('%7Bid%7D').join(id);

					$.ajax({

						url: route,
						type: metodo,
						data: form.serialize(),

						success:function(resp){

							alertify.alert('El recurso ha sido editado.');
							listar();
						},

						error:function(request, error)
						{
							alertify.alert('Error al procesar la solicitud.');
						}

					});

		});

		function listar()
		{
			var route = '/recursoIndex';
			var tabla = $('#recurso-tabla').DataTable({

						destroy:true,
						processing: true,
        				serverSide: true,
        				ajax:route,
        				language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
        				columns:[

        					{data: 'name'},
        					{data: 'descripcion'},
        					{defaultContent: "<button data-toggle='modal' data-target='#editarRecurso' type='button' class='editar btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i></button> <button type='button' data-toggle='modal' data-target='#videoRecurso' class='verVideo btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></i></button> <button type='button' class='descargar btn btn-success'><i class='fa fa-download' aria-hidden='true'></i></button> <button type='button' class='delete btn btn-danger'><i class='fa fa-eraser' aria-hidden='true'></i></button>"}
        				]

			});

			editar("#recurso-tabla tbody", tabla);
			verOnline("#recurso-tabla tbody", tabla);
			descargar("#recurso-tabla tbody", tabla);
			borrarRecurso("#recurso-tabla tbody", tabla);

		}

		function editar(tbody, tabla)
		{
			$(tbody).on("click", "button.editar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = "/recursoEdit/"+data.id;
			$.get(route, function(resp){
				
					$('#recursoEdit').val(resp.name);
					$('#descripcionEdit').val(resp.descripcion);
					$('#idRecurso').val(resp.id);
				})
				.fail(function(){
					alertify.alert('Error al procesar la solicitud.');
				})
				
			});
		}

		function verOnline(tbody, tabla)
		{
			$(tbody).on("click", "button.verVideo", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/recursoShow/'+data.id;
				var video = $('#videoRec');

				$.get(route, function(resp){

					video.html(" ");

					if(resp.mime == "video/mp4")
					{
						video.append("<li><video width='500'  height='300' controls='controls'><source src='/recurso/"+resp.original_filename+"' type='video/webm'/><source src='/recurso/"+resp.original_filename+"' type='video/ogg'/><source src='/recurso/"+resp.original_filename+"' type='video/mp4'/></video></li><hr>");

					}else{

						$('#videoRecurso').modal('hide');
						alertify.alert("Este recurso contiene archivos, para vizualizarlos por favor descargar  el archivo.");
					}

				})

					.fail(function(){

						alertify.alert("Error al procesar la solicitud.");

					})

			});
		}

		function descargar(tbody, tabla)
		{
			$(tbody).on("click", "button.descargar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/downloadRecursos/'+data.original_filename;
				$.blockUI();
			
			$.get(route,function(resp){
					window.open(route);
				})
				.fail(function(){
					$.unblockUI();
					alertify.alert("Error al descargar el archivo por favor intentalo de nuevo.");
				})
				.done(function(){
					alertify.alert("El archivo/video se ha descargado.");
					$.unblockUI();
				});
			});
		}

		function borrarRecurso(tbody, tabla)
		{
			$(tbody).on("click", "button.delete", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/deleteRecurso/'+data.id;
				$.blockUI();

				$.get(route, function(resp){
					$.unblockUI();
					alertify.alert("El recurso "+resp.name+" ha sido eliminado.");
				})
				.fail(function(){
					$.unblockUI();
					alertify.alert("Error al eliminar el recurso.");
				})
				.done(function(resp){
					$.unblockUI();
					listar();
				})

			});

		}

	});

</script>