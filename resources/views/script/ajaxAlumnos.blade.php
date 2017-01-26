<script>
	
	$(document).on('ready', function(){


		$('a#almUni').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#froadm').hide();
			$('#chatForo').hide();
			$('#listPersonal').hide();
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
			$('div#AlmUni').show();
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
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#listUnidades').hide();
			$('#crr').hide();
			$('#preForo').hide();
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

			var route = $(this).attr('href');
			var tablaAlm = $('#tablaAlm');

			$.get(route, function(resp){

				tablaAlm.html(" ");

				$(resp.data).each(function(key, value){

					tablaAlm.append("<tr><td>"+value.unidad+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='act(this);'</button><i class='fa fa-search'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='VideosAlm(this);' data-toggle='modal' data-target='#modalListVideos' </button><i class='fa fa-eye'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='calificacionAlm(this);'</button><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='pdfUnidad(this);' </button><i class='fa fa-eye'></i></td></tr>");

				});

			});

		});
		
		$('#clickEdit').on('click', function(e){

			e.preventDefault();
			var route = $('#edtAlm').attr('href');
		
			$.get(route, function(resp){

				$('#nameUpdateAlm').val(resp.name);
				$('#cuentaUpdateAlm').val(resp.cuenta);
				$('#clickAuth').val(resp.id);

			});


		});

		//formulario para responder una actividad al maestro.

		$('#Ralm').on('click', function(e){

			e.preventDefault();
			var id = $('#act_id').val();
			var form = $('#respAlm');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split("%7Bid%7D").join(id);
			$('#respActalm').modal('hide');

			var formData = new FormData($('#respAlm')[0]);

			$.ajax({

				url: route,
				type: metodo,
				headers: { 'X-CSFR-TOKEN': token},
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

		         beforeSend:function(){

		        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   

		        },
		       
		        success:function(resp){

		        	 alertify.alert("El archivo ha sido enviado correctamente.");
		        	 $.unblockUI();


		        },

		        error:function(error, request){

		        	if(error)
		        	{
		        		alertify.alert("Error al procesar la solicitud.");
		        		$.unblockUI();
		        	}



		        }

			});

		});

	});


	function pdfUnidad(btn){

		var id = btn.value;
		var link = $('#planpdf').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}

	function act(btn){

			
			var id = btn.value;
			var link = $('#verAct').attr('href');
			var tablaAct = $('#tablaAlmact');
			var route = link.split('%7Bid%7D').join(id);
			$('#tbMateriaDoc').hide();
			$('#AlmUni').hide();
			$('div#act').hide();
			$('div#listAct').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#calAct').hide();
		    $('div#planeacionC').fadeOut();
		    $('div#listSubtemas').hide();
		    $('#createVideos').hide();
			$('#Almact').show();
			$('div#VunidadE').hide();
			$('div#vizuaUnidad').hide();
			$('div#calAct').hide();
			$('div#notasRubricas').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#preForo').hide();
			$('#listExamenDocente').hide();
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

			//retroceso a unidades de estudiantes.
			$('#backActalm').on('click', function(){

				$('#Almact').hide();
				$('#AlmUni').show();
			});
			

		$.get(route, function(resp){

			tablaAct.html(" ");

			if(resp.total >= 1)
			{
				
				$(resp.data).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

				if(now >= startDate &&  now <= endDate)
				{

					tablaAct.append("<tr><td>"+value.actividad+"</td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#respActalm' OnClick='Responder(this);'><i class='fa fa-file-pdf-o'></i></button></td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#MapoyoAlm'  OnClick='Mapoyo(this);'><i class='fa fa-folder'></i></button></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='verPdf(this);'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#modalFile' OnClick='archivosList(this);'><i class='fa fa-archive'></i></button></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
				}else{

					tablaAct.append("<tr><td>"+value.actividad+"</td><td>Fecha vencida</td><td><button class='btn btn-primary' value="+value.id+"  OnClick='Mapoyo(this);'><i class='fa fa-folder'></i></button></td><td>Fecha vencida</td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#modalFile' OnClick='archivosList(this);'><i class='fa fa-archive'></i></button></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
				}

				

			});
			}else{

				tablaAct.html(" ");
	            $('div#Almact').addClass('alert');
	            $('div#AlmUni').removeClass('alert');
	            alertify.alert("Esta unidad no tiene actividades");
			}

		});

	}

	function Mapoyo(btn){

		var id = btn.value;
		var link = $('#materialAlm').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var tablaAlm = $('#tablaApoyoAlm');

		$.get(route, function(resp){

            if(!resp.length == 0)
            {

              tablaAlm.html(" ");
              $(resp).each(function(key, value){

                var filename = value.filename;
                var cadena = filename.split(' ').join('%20');
                tablaAlm.append("<tr><td>"+value.filename+"</td><td><button class='btn btn-primary' value="+cadena+"  OnClick='descargar(this);'><i class='fa fa-download'></i></button></td></tr>")

            });

            }else{

                tablaAlm.html(" ");
                alertify.alert('Esta actividad no tiene un Material de apoyo');
            }

        });
	}

	function Responder(btn){

		var id = btn.value;
		var form = $('#respAlm');
		var user = $('#AuthUser').attr('href');
		var json = $.parseJSON(user);
		$('#userA').val(json.name);
		$('#act_id').val(id);

	}

	function verPdf(btn){

		var id = btn.value;
		var route = '/planpdf/'+id;
		
		$.get(route, function(resp){

			window.open(route);

		}).fail(function(resp){

			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		});
	}

	function archivosList(btn){

		var id = btn.value;
		var route = '/fileSend/'+id;
		var tablaFile = $('#tablaFile');
		
		$.get(route, function(resp){

			tablaFile.html(" ");

			$(resp).each(function(key, value){

				var filename = value.filename;
				var cadena = filename.split(' ').join('%20');
				tablaFile.append("<tr><td>"+value.filename+"</td><td><button class='btn btn-primary' value="+cadena+" OnClick='fileDelete(this);'><i class='fa fa-eraser'></i></button></td></tr>");

			});
		})

	}


	function fileDelete(btn){

		var filename = btn.value;
		var link = $('#borrarA').attr('href');
		var route = link.split('%7Bfilename%7D').join(filename);
		var tablaFile = $('#tablaFile');
		
		$.get(route, function(resp){

			tablaFile.html(" ");
			alertify.alert(' El archivo se ha borrado.');

		});

	}


	function VideosAlm(btn){

		var id = btn.value;
		var link = $('#showVideos').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var tablaVideos = $('#tablaVideosList');

		$.get(route, function(resp){

			tablaVideos.html(" ");

			$(resp).each(function(key, value){

				var filename = value.original_filename;
				var cadena = filename.split(' ').join('%20');
				tablaVideos.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' value="+cadena+" OnClick='descargarVideos(this);'><i class='fa fa-download'></i></button></td></tr>");

			});

		});

	}


	function descargarVideos(btn){

		var filename = btn.value;
		var link = $('#downloadV').attr('href');
		var route = link.split('%7Bfilename%7D').join(filename);
		window.open(route);

	}

	function calificacionAlm(btn){

		var id = btn.value;
		var link = $('#promedio').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		
		$.get(route, function(resp){

			window.open(route);
		});

	}



</script>