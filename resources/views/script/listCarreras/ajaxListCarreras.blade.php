<script>
	
	$(document).on('ready', function(){

		$('#lstCrra').on('click', function(e){


			e.preventDefault();

			$('#crr').show();
			$('#chatForo').hide();
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
			$('#froadm').hide();

			listCarrera();

		});

		$('#mdlSemdos').on('click', function(e){

			e.preventDefault();

			createSemestre();
		});

		$('#mdlMatdos').on('click', function(e){

			e.preventDefault();

			createMateria();

		});

		$('#editPlancrr').on('click', function(e){

			e.preventDefault();

			editPlan();

		});

		
	});
	
	function createSemestre(){

			var form = $('#form-mdldos');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert('El semestre ha sido creado correctamente.');
				$('#nameSemmodaldos').val(resp.name);
				$('#idSemmodaldos').val(resp.id);
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


	}

	function createMateria(){

						var form = $('#form-mdlMatdos');
						var route = form.attr('action');
						var metodo = form.attr('method');

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							data: form.serialize(),

							success:function(resp){

								alertify.alert('La materia ha sido creada correctamente.');
								$('#mdlMtados').val(" ");
								$('#mdlCreditosdos').val(" ");

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
	}

	
	function editPlan(){

			var id = $('#carreraIdEdit').val();
			var form = $('#form-planEdit');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bcarrera%7D').join(id);

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert('La carrera fue editada correctamente.');
					listCarrera();
					
				}

			});

	}

	function listCarrera(){

			var route = $('#craList').attr('href');
			var tabla = $('#tablaDataCarrera');

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp.data).each(function(key, value){

					tabla.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='asignarId(this);' id="+value.name+" data-toggle='modal' data-target='#mdlPlandos'</button><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='editCarrera(this);' data-toggle='modal' data-target='#mdlEditcrt'</button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='borrar(this);'</button><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

				});

			});
	}

	function asignarId(btn){

		var id = btn.value;
		var name = btn.id;
		$('#idCarrmodaldos').val(id);
		$('#carrModaldos').val(name);


	}

	function editCarrera(btn){

		var id = btn.value;
		var link = $('#editcrra').attr('href');
		var route = link.split('%7Bcarrera%7D').join(id);
		
		$.get(route, function(resp){

			$('#nameMedit').val(resp.name);
			$('#planNameedit').val(resp.plan);
			$('#revoeEdit').val(resp.revoe);
			$('#carreraIdEdit').val(resp.id);

		});

	}

	function borrar(btn){

		var id = btn.value;
		var link = $('#crrDelete').attr('href');
		var route = link.split('%7Bid%7D').join(id);	

		$.get(route, function(resp){

			alertify.alert("La carrera ha sido borrado.");
			listCarrera();

		});

	}




</script>