<script>
	
	$(document).on('ready', function(){


		$('#findUser').on('click', function(e){

			e.preventDefault();

			var form = $('#formFindUser');
			var route = form.attr('action');
			var personal = $('#tablaPersonal');
			var name = $('#nameUser').val();
			var cuenta = $('#modelo').val();

			$.get(route, function(resp){

				personal.html(" ");

				$(resp).each(function(key, value){

					if(name == value.name || cuenta == value.cuenta)
					{

						personal.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='verUser(this);' value="+value.id+" data-toggle='modal' data-target='#showUser'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#updateUser' OnClick='editarUser(this);' value="+value.id+"><i class='fa fa-user'></i></button></td><td><button class='btn btn-primary' OnClick='borrarUser(this);' value="+value.id+"><i class='fa fa-eraser'></i></button></td></tr>");
					}

				});
			});


		});

		$('#listaP').on('click', function(e){

				e.preventDefault();

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
			$('#listPersonal').show();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();

				var route = $('#admIndex').attr('href');
				var personal = $('#tablaPersonal');

				$.get(route, function(resp){

					personal.html(" ");
				
					$(resp.data).each(function(key, value){

						personal.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='verUser(this);' value="+value.id+" data-toggle='modal' data-target='#showUser'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#updateUser' OnClick='editarUser(this);' value="+value.id+"><i class='fa fa-user'></i></button></td><td><button class='btn btn-primary' OnClick='borrarUser(this);' value="+value.id+"><i class='fa fa-eraser'></i></button></td></tr>");

					});


				});


			});	


		$('.pagination a').on('click', function(e){

							e.preventDefault();

							var page = $(this).attr('href');
							var personal = $('#tablaPersonal');
							var id = page.split('page=')[1];
							var route = $('#admIndex').attr('href');

							$.ajax({

								url: route,
								headers: { 'X-CSFR-TOKEN': token},
								data: {page: id},
								type: 'GET',
								dataType: 'json',
								success:function(resp){

									personal.html(" ");

									$(resp.data).each(function(key, value){

										personal.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='verUser(this);' value="+value.id+" data-toggle='modal' data-target='#showUser'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#updateUser' OnClick='editarUser(this);' value="+value.id+"><i class='fa fa-user'></i></button></td><td><button class='btn btn-primary' OnClick='borrarUser(this);' value="+value.id+"><i class='fa fa-eraser'></i></button></td></tr>");
									});
								}

							});

						});

		$('#admin').on('click', function(e){

			e.preventDefault();

			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
			$('#listTut').hide();
			$('#tutoriales').show();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listPersonal').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#crr').hide();
			$('#froadm').hide();

		});


		$('#listTutorial').on('click', function(e){

			e.preventDefault();

			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
			$('#listPersonal').hide();
			$('#tutoriales').hide();
			$('#listTut').show();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#crr').hide();
			$('#froadm').hide();

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


	function verUser(btn){

		var id = btn.value;
		var link = $('#adminShow').attr('href');
		var route = link.split('%7Badmin%7D').join(id);
		var showUser = $('#ShowUser');
		
		$.get(route, function(resp){

			showUser.html(" ");

			$(resp).each(function(key, value){

				$(value.roles).each(function(key, role){

					showUser.append("<tr><td>"+value.name+"</td><td>"+value.cuenta+"</td><td>"+role.name+"</td></tr>");

				});

			});

		});

	}

	function borrarUser(btn){

		var id = btn.value;
		var link = $('#adminDelete').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		
		$.get(route, function(resp){

			$('#listPersonal').hide();
			alertify.alert("El usuario ha sido borrado correctamente.");

		});

	}

	function editarUser(btn){

		var id = btn.value;
		var link = $('#adminEdit').attr('href');
		var route = link.split('%7Badmin%7D').join(id);
		var userRoles = $('#rolesUser');
		var userCarreras = $('#userCarreras');
		var userSemestres = $('#userSemestres');
		var userMaterias = $('#userMaterias');
		var divCarreras = $('#carrera_list');
		var divSemestres = $('#semestre_list');
		var divRoles = $('#role_list');
		var divMaterias = $('#materia_list');
		
		$.get(route, function(resp){

			userRoles.html(" ");
			userCarreras.html(" ");
			userSemestres.html(" ");
			userMaterias.html(" ");
			divCarreras.html(" "); 
		 	divSemestres.html(" ");
			divRoles.html(" "); 
		 	divMaterias.html(" "); 

		 	$(resp.carreras).each(function(key, value){


					divCarreras.append("<option value="+value.id+">"+value.name+"</option>");

				});

		 	$(resp.semestres).each(function(key, value){

					divSemestres.append("<option value="+value.id+">"+value.name+"</option>");

				});

		 	$(resp.materias).each(function(key, value){

					divMaterias.append("<option value="+value.id+">"+value.name+"</option>");

				});


		 	$(resp.roles).each(function(key, value){

					divRoles.append("<option value="+value.id+">"+value.name+"</option>");

				});

			$(resp.user).each(function(key, value){

				$('#nameUpdate').val(value.name);
				$('#cuentaUpdate').val(value.cuenta);
				$('#udpUser').val(value.id);

				$(value.roles).each(function(key, role){

					userRoles.append("<li>"+role.name+"</li>");

					divRoles.find("option[value="+role.id+"]").remove();
					divRoles.append("<option selected value="+role.id+">"+role.name+"</option");


					if(role.name == "admin")
					{

						$('#mat_list').removeClass('alert');
						$('#car_list').removeClass('alert');
						$('#sem_list').removeClass('alert');

					}

					
					if(role.name == "alumno")
					{
						$('#mat_list').addClass('alert');
						$('#car_list').removeClass('alert');
						$('#sem_list').removeClass('alert');
					}

					if(role.name == "profesor")
					{
						$('#mat_list').removeClass('alert');
						$('#car_list').addClass('alert');
						$('#sem_list').addClass('alert');

					}

					if(role.name == "admin" || role.name == "alumno")
					{
						$('#mat_list').addClass('alert');
						$('#car_list').removeClass('alert');
						$('#sem_list').removeClass('alert');
					}

					if(role.name == "admin" || role.name == "profesor")
					{
						$('#mat_list').removeClass('alert');
						$('#car_list').addClass('alert');
						$('#sem_list').addClass('alert');
					}


					
				});

				$(value.carreras).each(function(key, carr){

					userCarreras.append("<li>"+carr.name+"</li>");

					divCarreras.find("option[value="+carr.id+"]").remove();
					divCarreras.append("<option selected value="+carr.id+">"+carr.name+"</option>");

					$(carr.semestres).each(function(key, sem){

						userSemestres.append("<li>"+sem.name+"</li>");
						
						divSemestres.find("option[value="+sem.id+"]").remove();
						divSemestres.append("<option selected value="+sem.id+">"+sem.name+"</option>");

						$(sem.materias).each(function(key, mat){

							userMaterias.append("<li>"+mat.name+"</li>");

							divMaterias.find("option[value="+mat.id+"]").remove();
							divMaterias.append("<option selected value="+mat.id+">"+mat.name+"</option>");

						});

					});

				});

			});

		});

	}

	$('#usrEdi').on('click', function(e){

		e.preventDefault();

		var id = $('#udpUser').val();
		var form = $('#formUpdate-user');
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split('%7Badmin%7D').join(id);
		
		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert(" el usuario esta editado");
				
				$("#carrera_list").select2("val", "");
				$("#semestre_list").select2("val", "");
				$("#materia_list").select2("val", "");
				$("#role_list").select2("val", "");


			}

		});
		
	});

	function borrarTuto(btn){

		var id = btn.value;
		var link = $('#deleteTuto').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var ruta = $('#allTutorial').attr('href');
		var tutorial = $('#tablaTutorial');

		$.get(route, function(resp){

			alertify.alert("El video ha sido borrado correctamente.");

			$.get(ruta, function(rep){

			tutorial.html(" ");

				$(rep).each(function(key, value){

				var filename = value.original_filename;
                var cadena = filename.split(' ').join('%20');
					tutorial.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' OnClick='descargarTuto(this);' value="+cadena+"><i class='fa fa-download'></i></button></td><td><button class='btn btn-primary' OnClick='tutorialOnline(this);' data-toggle='modal' data-target='#tutoV' value="+value.id+"><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='borrarTuto(this);' value="+value.id+"><i class='fa fa-download'></i></button></td><tr>");

				});

			});
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

			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#preForo').hide();
			$('#admRole').show();
			$('div#user').hide();
			$('#admForo').hide();
			$('#adminPlan').hide();
			$('#listTut').hide();
			$('#tutoriales').hide();
			$('#listPersonal').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#crr').hide();
			$('#froadm').hide();


		});

		$('#creRole').on('click', function(e){

			e.preventDefault();

			var form = $('#form-createRole');
			var route = form.attr('action');
			var metodo = form.attr('method');

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
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


		$('a#foroAdm').on('click', function(e){

			e.preventDefault();

			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#admForo').show();
			$('#admRole').hide();
			$('div#user').hide();
			$('#adminPlan').hide();
			$('#listTut').hide();
			$('#tutoriales').hide();
			$('#listPersonal').hide();
			$('#reportes').hide();
			$('#chatForo').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#alumnosListUser').hide();
			$('#examen').hide();
			$('#planeacionC').hide();
			$('#listUnidades').hide();
			$('#prflistTuto').hide();
			$('#listRub').hide();
			$('#vizuaUnidad').hide();

			var materia = $(this).parents('ul');
			var id = materia.data('id');
			$('#matForo').val(id);
			var tipo = $('#tipForo').val();

			 if(tipo === 'tematico')
			 {
			 	$('#preguntaForo').show();
			 }

			 $('#tipForo').change(function(){

			 	var tipodos = $('#tipForo').val();
			 	
			 	if(tipodos == 'tematico')
			 	{
			 		$('#preguntaForo').show();
			 	}else {
			 		
			 		$('#preguntaForo').hide();
			 	}

			 });

		});

		$('#admForoCrt').on('click', function(e){

			e.preventDefault();

			var form = $('#form-createForo');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
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

			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
			$('#adminPlan').show();
			$('#chatForo').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#tutoriales').hide();
			$('#listPersonal').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();


		});

		$('#crePlan').on('click', function(e){


			e.preventDefault();

			var form = $('#form-plan');
			var metodo = form.attr('method');
			var route = form.attr('action');

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),


				success:function(resp){

					alertify.alert(" El plan ha sido creado correctamente.");

					$('#carrModal').val(resp.name);
					$('#idCarrmodal').val(resp.id);

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



					$('#mdlSem').on('click', function(e){

						e.preventDefault();

						var form = $('#form-mdl');
						var route = form.attr('action');
						var metodo = form.attr('method');

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							data: form.serialize(),

							success:function(resp){

								alertify.alert('El semestre ha sido creado correctamente.');
								$('#nameSemmodal').val(resp.name);
								$('#idSemmodal').val(resp.id);

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

					$('#mdlMat').on('click', function(e){

						e.preventDefault();

						var form = $('#form-mdlMat');
						var route = form.attr('action');
						var metodo = form.attr('method');

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							data: form.serialize(),

							success:function(resp){

								alertify.alert('La materia ha sido creada correctamente.');
								$('#mdlMta').val(" ");
								$('#mdlCreditos').val(" ");

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


		});

</script>