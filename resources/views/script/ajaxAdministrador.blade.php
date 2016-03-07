<script>
	
	$(document).on('ready', function(){


		$('#admin').on('click', function(e){

			e.preventDefault();

			$('#listTut').addClass('alert');
			$('#tutoriales').removeClass('alert');
			$('#adminPlan').addClass('alert');

		});


		$('#listTutorial').on('click', function(e){

			e.preventDefault();

			$('#tutoriales').addClass('alert');
			$('#listTut').removeClass('alert');
			$('#adminPlan').addClass('alert');

			var route = $('#allTutorial').attr('href');
			var tutorial = $('#tablaTutorial');

			$.get(route, function(resp){

				tutorial.html(" ");

				$(resp).each(function(key, value){


				var filename = value.original_filename;
                var cadena = filename.split(' ').join('%20');
					tutorial.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' OnClick='descargarTuto(this);' value="+cadena+"><i class='fa fa-download'></i></button></td><td><button class='btn btn-primary' OnClick='tutorialOnline(this);' data-toggle='modal' data-target='#tutoV' value="+value.id+"><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='borrarTuto(this);' value="+value.id+"><i class='fa fa-download'></i></button></td><tr>");

				});

			});

		});

	});

	function borrarTuto(btn){

		var id = btn.value;
		var link = $('#deleteTuto').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			$('#listTut').addClass('alert');
			alertify.alert("El video ha sido borrado correctamente.");
		});
	}

	function descargarTuto(btn){

		var filename = btn.value;
		var link = $('#dwTutorial').attr('href');
		var route = link.split('%7BfileName%7D').join(filename);
		window.open(route);
	}

	function tutorialOnline(btn){

		var id = btn.value;
		var link = $('#allVideos').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var div = $('#divTuto');

		$.get(route, function(resp){

			div.html(" ");

			div.append("<video width='530'  height='300' id='fgt'  controls='controls'><source src='/tutoriales/"+resp.original_filename+"' type='video/webm'/><source src='/tutoriales/"+resp.original_filename+"' type='video/ogg'/><source src='/tutoriales/"+resp.original_filename+"' type='video/mp4'/></video>");

		});
		

	}

	$('#outVideo').on('click', function(e){

		var div = $('#divTuto');

		div.html(" ");

	});


		$('#Croles').on('click', function(e){

			e.preventDefault();

			$('#admRole').removeClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#listTut').addClass('alert');


		});

		$('#creRole').on('click', function(e){

			e.preventDefault();

			var form = $('#form-createRole');
			var route = form.attr('action');
			var metodo = form.attr('method');

		$.ajax({

			url: route,
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert(" El role ha sido creado correctamente");

			},

			error:function(request, error){

				if(error == "timeout")
				{

					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}

			}


		});

		});


		$('#foroAdm').on('click', function(e){

			e.preventDefault();

			$('#admForo').removeClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#listTut').addClass('alert');

		});

		$('#admForoCrt').on('click', function(e){

			e.preventDefault();

			var form = $('#form-createForo');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert(" El foro se ha creado correctamente");
				},

				error:function(request, error){

				if(error == "timeout")

					{

						alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
					}else{

						alertify.alert('Tienes errores en el formulario.');

					}
				}

			});

		});


		$('#planAdm').on('click', function(e){

			e.preventDefault();

			$('#adminPlan').removeClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');


		});

		$('#crePlan').on('click', function(e){


			e.preventDefault();

			var form = $('#form-plan');
			var metodo = form.attr('method');
			var route = form.attr('action');

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),


				success:function(resp){

					alertify.alert(" El plan ha sido creado correctamente.");

				},

				error:function(error, request){

					if(error == "timeout")

					{

						alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
					}else{


						alertify.alert('Tienes errores en el formulario.');
					}



				}



			});

		});

</script>