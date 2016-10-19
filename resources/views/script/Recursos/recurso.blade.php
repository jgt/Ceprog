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

			var route = $(this).attr('href');
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

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp).each(function(key, value){

					tabla.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='editarRecurso(this);' value="+value.id+" data-toggle='modal' data-target='#editarRecurso'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='descripcion(this);' value="+value.descripcion+" data-toggle='modal' data-target='#recursoDescripcion'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='verVideo(this);' value="+value.id+" data-toggle='modal' data-target='#videoRecurso'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='descargarRecurso(this);' value="+value.original_filename+"><i class='fa fa-download' aria-hidden='true'></i></button></td><td><button class='btn btn-danger' OnClick='borrarRecurso(this);' value="+value.id+"><i class='fa fa-eraser' aria-hidden='true'></i></button></td></tr>");
				});

			});

		});

		$('#upRecursos').on('click', function(e){

			e.preventDefault();

			var id = $('#idRecurso').val();
			var form = $('#form-recursoUpdate');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Brecursos%7D').join(id);

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert('El recurso ha sido editado.');
					var route = $('#allRecursos').attr('href');
					var tabla = $('#tablaRecurso');

					$.get(route, function(resp){

						tabla.html(" ");

						$(resp).each(function(key, value){

							tabla.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='editarRecurso(this);' value="+value.id+" data-toggle='modal' data-target='#editarRecurso'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='descripcion(this);' value="+value.descripcion+" data-toggle='modal' data-target='#recursoDescripcion'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='verVideo(this);' value="+value.id+" data-toggle='modal' data-target='#videoRecurso'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='descargarRecurso(this);' value="+value.original_filename+"><i class='fa fa-download' aria-hidden='true'></i></button></td><td><button class='btn btn-danger' OnClick='borrarRecurso(this);' value="+value.id+"><i class='fa fa-eraser' aria-hidden='true'></i></button></td></tr>");

						});

					});

				},

				error:function(request, error)
				{
					alertify.alert('Error al procesar la solicitud.');
				}

			});

		});

	});

	function verVideo(btn)
		{
			var id = btn.value;
			var link = $('#recursoShow').attr('href');
			var route = link.split('%7Brecursos%7D').join(id);
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

		}

		function descargarRecurso(btn)
		{
			var link = $('#downloadRecursos').attr('href');
			var route = link.split('%7Bfilename%7D').join(btn.value);
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
		}

		function borrarRecurso(btn)
		{	
			var id = btn.value;
			var link = $('#deleteRecurso').attr('href');
			var route = link.split('%7Bid%7D').join(id);
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
				var route = $('#allRecursos').attr('href');
				var tabla = $('#tablaRecurso');

				$.get(route, function(resp){

					tabla.html(" ");

					$(resp).each(function(key, value){

						tabla.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='editarRecurso(this);' value="+value.id+" data-toggle='modal' data-target='#editarRecurso'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='descripcion(this);' value="+value.descripcion+" data-toggle='modal' data-target='#recursoDescripcion'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='verVideo(this);' value="+value.id+" data-toggle='modal' data-target='#videoRecurso'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='descargarRecurso(this);' value="+value.original_filename+"><i class='fa fa-download' aria-hidden='true'></i></button></td><td><button class='btn btn-danger' OnClick='borrarRecurso(this);' value="+value.id+"><i class='fa fa-eraser' aria-hidden='true'></i></button></td></tr>");

					});

				});

			})
		}


		function descripcion(btn)
		{

			var descripcion = btn.value;
			var tabla = $('#descripcionRec');
			tabla.append(descripcion);
		}

		function editarRecurso(btn)
		{
			var id = btn.value;
			var link = $('#updateRecursos').attr('href');
			var route = link.split('%7Brecursos%7D').join(id);

			$.get(route, function(resp){

				console.log(resp);
				$('#recursoEdit').val(resp.name);
				$('#descripcionEdit').val(resp.descripcion);
				$('#idRecurso').val(resp.id);

			})

			.fail(function(){

				alertify.alert('Error al procesar la solicitud.');

			})

		}

</script>