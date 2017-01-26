<script>
	
	$(document).on('ready', function(){

		$('a#recursosMaestro').on('click', function(e){

			e.preventDefault();
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
			$('#listRecMa').show();
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

			listar();

		});

		function listar()
		{	
			var route = '/recIndex';
			var tabla = $('#maestros-recursos').DataTable({

				destroy:true,
				processing: true,
	        	serverSide: true,
	        	ajax:route,
	        	language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	        	columns:[

	        		{data: 'name'},
	        		{data: 'descripcion'},
	        		{defaultContent: "<button data-toggle='modal' data-target='#videoRecmaestro' type='button' class='video btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></i></button> <button type='button' class='descargar btn btn-success'><i class='fa fa-download' aria-hidden='true'></i></button> "}
	        	]

			});

			verOnline("#maestros-recursos tbody", tabla);
			descargar("#maestros-recursos tbody", tabla);
		}

		function verOnline(tbody, tabla)
		{
			$(tbody).on("click", "button.video", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '/recShow/'+data.id;
				var video = $('#vidRecmaestro');

				$.get(route, function(resp){

					video.html(" ");

						if(resp.mime == "video/mp4")
						{
							video.append("<video width='500'  height='300' controls='controls'><source src='/recurso/"+resp.original_filename+"' type='video/webm'/><source src='/recurso/"+resp.original_filename+"' type='video/ogg'/><source src='/recurso/"+resp.original_filename+"' type='video/mp4'/></video><hr>");

						}else{

							$('#videoRecmaestro').modal('hide');
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
				var route = '/downRecurso/'+data.original_filename;
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

	});

</script>