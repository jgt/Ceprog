<script>
	
	$(document).on('ready', function(){

		$('a#recursosMaestro').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			var tabla = $('#tablaRecursoMa');
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
			$('#listRecMa').show();

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp).each(function(key, value){

					tabla.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='desmaestro(this);' value="+value.descripcion+" data-toggle='modal' data-target='#recursoDesmaestro'><i class='fa fa-pencil-square'></i></button></td><td><button class='btn btn-primary' OnClick='verVideoMaestro(this);' value="+value.id+" data-toggle='modal' data-target='#videoRecmaestro'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='descargarRecursoMaestro(this);' value="+value.original_filename+"><i class='fa fa-download' aria-hidden='true'></i></button></td></tr>");
				});

			});

		});

	});

	function desmaestro(btn)
	{
		var descripcion = btn.value;
		var tabla = $('#descripcionRecmaestro');
		tabla.append(descripcion);
	}

	function verVideoMaestro(btn)
	{
		var id = btn.value;
		var link = $('#showRecMaestro').attr('href');
		var route = link.split('%7Brecmaestro%7D').join(id);
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
	}

	function descargarRecursoMaestro(btn)
	{

			var link = $('#decMaestro').attr('href');
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

</script>