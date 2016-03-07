<script>
	
$(document).on('ready', function(){

	$('a#planeacion').on('click', function(e){

		e.preventDefault();

		$('#planeacionC').removeClass('alert');
		var link = $('#plna').attr('href');
		var materia = $(this).parents('ul');
		var id = materia.data('id');
		var route = link.split('%7Bid%7D').join(id);
		$('div#planeacionC').removeClass('alert');
		$('div#act').addClass('alert');
        $('div#examen').addClass('alert');
        $('div#pregunta').addClass('alert');
        $('div#listExamen').addClass('alert');
        $('div#calAct').addClass('alert');
        $('div#listAct').addClass('alert');
        $('div#listUnidades').addClass('alert');
        $('div#listSubtemas').addClass('alert');
         $('#createVideos').addClass('alert');
         $('div#vizuaUnidad').addClass('alert');
         $('div#notasRubricas').addClass('alert');
         $('#listRub').addClass('alert');
         $('#prflistTuto').addClass('alert');
         $('#listTutAlm').addClass('alert');
         	$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');

		$.get(route, function(resp){

			$(resp.materia).each(function(key, value){

				$('#asignatura').val(value.name);
				$('#materia').val(value.id);
				$('#clave').val(value.creditos);


			});

			$(resp.users).each(function(key, value){

				$('#asesor').val(value.name);
				$('#Us').val(value.id);

			});


			$(resp.semestre).each(function(key, value){

				$('#Csemes').val(value.name);

			});


		});

		
	});	


$('#crunidad').on('click', function(e){

			e.preventDefault();
			var form = $('#plcuni');
			var route = form.attr('action');
			var metodo = form.attr('method');
	
			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					var objetivo = $('#objetivo').val();
					$('#seriacion').val(" ");
					$('#unidad').val(" ");
					$('#tema').val(" ");
					$('#actividadP').val(" ");
					$('#fechaU').val(" ");

					alertify.alert(" la unidad fue creada correctamente, a continuacion crea los subtemas de esa unidad.");

					$('#subUni').val(resp.unidad).prop('disabled', true);
					$('#subId').val(resp.id);
					$('#tem').val(resp.tema).prop('disabled', true);

				},

				error:function(resp){

					if(resp == "timeout")
					{

						alertify.alert(" Hay problemas con tu internet por favor intenta de nuevo.");
					}

					alertify.alert(" Por favor rellena todos los campos solicitados en el formulario de unidades para poder continuar.");

				}


			});

		});


$('#crearU').on('click', function(e){

			e.preventDefault();

			var form = $('#formT');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),


				success:function(resp){

					alertify.alert(" Finalizacion exitosa.");
					$('#subT').val(" ");
					$('#descSub').val(" ");

				},


				error:function(resp){

					if(resp == "timeout")
					{

						alertify.alert(" Hay problemas de conexion por favor intentalo de nuevo.");
					}

					alertify.alert(" Por favor rellena todos los campos para poder continuar.");

				}

			});

		});

	
});

</script>