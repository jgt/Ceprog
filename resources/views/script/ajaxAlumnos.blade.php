<script>
	
	$(document).on('ready', function(){

		$('a#almUni').on('click', function(e){

			e.preventDefault();

			$('#listPersonal').addClass('alert');
			$('div#act').addClass('alert');
			$('div#listAct').addClass('alert');
		    $('div#examen').addClass('alert');
		    $('div#listExamen').addClass('alert');
		    $('div#calAct').addClass('alert');
		    $('div#planeacionC').addClass('alert');
		    $('div#listSubtemas').addClass('alert');
		    $('#createVideos').addClass('alert');
			$('div#listAct').addClass('alert');
			$('#Almact').addClass('alert');
			$('div#vizuaUnidad').addClass('alert');
			$('div#AlmUni').removeClass('alert');
			$('div#VunidadE').addClass('alert');
			$('div#calAct').addClass('alert');
			$('div#notasRubricas').addClass('alert');
			$('#listRub').addClass('alert');
			$('#listTutAlm').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');
			$('#alumnosListUser').addClass('alert');
			$('#reportes').addClass('alert');

			var route = $(this).attr('href');
			var tablaAlm = $('#tablaAlm');

			$.get(route, function(resp){

				tablaAlm.html(" ");

				$(resp.data).each(function(key, value){

					tablaAlm.append("<tr><td>"+value.unidad+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='act(this);'</button><i class='fa fa-search'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='VideosAlm(this);' data-toggle='modal' data-target='#modalListVideos' </button><i class='fa fa-eye'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='calificacionAlm(this);' data-toggle='modal' data-target='#modalCalificacion' </button><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='pdfUnidad(this);' </button><i class='fa fa-eye'></i></td></tr>");

				});

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
			$('#AlmUni').addClass('alert');
			$('div#act').addClass('alert');
			$('div#listAct').addClass('alert');
		    $('div#examen').addClass('alert');
		    $('div#listExamen').addClass('alert');
		    $('div#calAct').addClass('alert');
		    $('div#planeacionC').addClass('alert');
		    $('div#listSubtemas').addClass('alert');
		    $('#createVideos').addClass('alert');
			$('#Almact').removeClass('alert');
			$('div#VunidadE').addClass('alert');
			$('div#vizuaUnidad').addClass('alert');
			$('div#calAct').addClass('alert');
			$('div#notasRubricas').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');
			$('#listPersonal').addClass('alert');
			

		$.get(route, function(resp){

			tablaAct.html(" ");

			if(resp.total >= 1)
			{
				
				$(resp.data).each(function(key, value){

				if(moment().format() >= value.fecha && moment().format() <= value.fechaF)
				{

					tablaAct.append("<tr><td>"+value.actividad+"</td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#respActalm' OnClick='Responder(this);'><i class='fa fa-file-pdf-o'></i></button></td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#MapoyoAlm'  OnClick='Mapoyo(this);'><i class='fa fa-folder'></i></button></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='verPdf(this);'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#modalFile' OnClick='archivosList(this);'><i class='fa fa-archive'></i></button></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
				}else{

					tablaAct.append("<tr><td>"+value.actividad+"</td><td>Fecha vencida</td><td><button class='btn btn-primary' value="+value.id+"  OnClick='MapoyoAlm(this);'><i class='fa fa-folder'></i></button></td><td>Fecha vencida</td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#modalFile' OnClick='archivosList(this);'><i class='fa fa-archive'></i></button></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
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
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split('%7Bid%7D').join(id);
		var user = $('#AuthUser').attr('href');
		var json = $.parseJSON(user);
		$('#userA').val(json.name);
		$('#act_id').val(id);

	}

	function verPdf(btn){

		var id = btn.value;
		var link = $('#actPdf').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}

	function archivosList(btn){

		var id = btn.value;
		var link = $('#fileentry').attr('href');
		var route = link.split('%7Bid%7D').join(id);
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
		var tablaCalificacion = $('#tablaCalificacion');
		var tablaCalificacion = $('#tablaCalificacion');
		
		$.get(route,function(resp){

			tablaCalificacion.html(" ");

			$(resp.actividades).each(function(key, value){

				tablaCalificacion.append("<tr><td>"+value.actividad+"</td></tr>");

			});

			$(resp.calificaciones).each(function(key, value){

				console.log(value);
				tablaCalificacion.append("<tr><td>"+value.promedio+"</td></tr>");

			});


			$(resp.promedio).each(function(key, value){

				tablaCalificacion.append("<tr><td><strong>Promedio de la unidad:</strong> "+value+"</td></tr>");

			});


		});

	}



</script>