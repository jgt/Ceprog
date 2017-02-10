<script>
	
	$(document).on('ready', function(){

		$('#listaP').on('click', function(e){

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
			$('#listPersonal').show();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
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
			var route = '{{route('admin.index')}}';
			if (! $.fn.DataTable.isDataTable('#users-table')){
				listarPersonal(route);
			}else{

				var tabla = $('#users-table').DataTable();
				tabla.ajax.reload();

			}
		
		});

		$('#admin').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
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
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#plcAlm').hide();
			$('div#examen').fadeOut();
			$('div#planeacionC').fadeOut();
			$('#act').fadeOut();
		  $('#crtSub').fadeOut();
		  $('#editUnidad').fadeOut();
		  $('#videoUnidad').fadeOut();
		  $('#listSubtemas').fadeOut();
		  $('#listAct').fadeOut();
		  $('#calAct').fadeOut();
		  $('#menUnidad').fadeOut();
		  $('div#preguntaExmamen').hide();

		});


		$('#listTutorial').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
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
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#plcAlm').hide();
			$('div#examen').fadeOut();
			$('div#planeacionC').fadeOut();
			$('#act').fadeOut();
		  $('#crtSub').fadeOut();
		  $('#editUnidad').fadeOut();
		  $('#videoUnidad').fadeOut();
		  $('#listSubtemas').fadeOut();
		  $('#listAct').fadeOut();
		  $('#calAct').fadeOut();
		  $('#menUnidad').fadeOut();
		  $('div#preguntaExmamen').hide();

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

	
	$('#usrEdi').on('click', function(e){

		e.preventDefault();

		var id = $('#udpUser').val();
		var form = $('#formUpdate-user');
		var metodo = form.attr('method');
		var route = '/admin/'+id;
		$(this).attr('disabled', true);
		$.blockUI();
		
		$.ajax({

			url: route,
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				if (! $.fn.DataTable.isDataTable('#users-table')){
					  listarPersonal(route);
					}else{

					var tabla = $('#users-table').DataTable();
					tabla.ajax.reload();

					}
				$('#usrEdi').attr('disabled', false);
				$.unblockUI();
				alertify.alert("El usuario <strong>"+resp.name+"</strong> ha sido editado correctamente.");
				console.log(resp);
			},

			error:function(error, request)
			{

				$('#usrEdi').attr('disabled', false);
				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			}

		});
		
	});

	$('#backListPersonal').on('click', function(e){

		e.preventDefault();
		$('#updateUser').fadeOut();
		$('#listPersonal').fadeIn();

	});

	$('#crt-forceUser').on('click', function(e){

		e.preventDefault();

		var id = $('#idForce').val();
		var form = $('#form-forceUser');
		var metodo = form.attr('method');
		var route = 'deleteU/'+id;
		$(this).attr('disabled', true);
		$.blockUI();

		$.ajax({

			url:route,
			type:metodo,
			data:form.serialize(),

			success:function(resp)
			{
				if (! $.fn.DataTable.isDataTable('#users-table')){
					  listarPersonal(route);
					}else{

					var tabla = $('#users-table').DataTable();
					tabla.ajax.reload();
				}
				$('#crt-forceUser').attr('disabled', false);
				$.unblockUI();
				$('#forceUser').modal('hide');
				alertify.alert("El usuario ha sido borrado correctamente.");
			},

			error:function(error, request)
			{
				$('#crt-forceUser').attr('disabled', false);
				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			}


		});

	});

	$('#crt-forceRole').on('click', function(e){

		e.preventDefault();

		var id = $('#udpUserRole').val();
		var form = $('#form-forceRole');
		var metodo = form.attr('method');
		var route = '/agregarRole/'+id;
		$(this).attr('disabled', true);
		$.blockUI();

		$.ajax({

			url:route,
			type:metodo,
			data:form.serialize(),

			success:function(resp)
			{	
				if (! $.fn.DataTable.isDataTable('#users-table')){
					  listarPersonal(route);
					}else{

					var tabla = $('#users-table').DataTable();
					tabla.ajax.reload();
				}
				$('#agreeRole').modal('hide');
				$('#crt-forceRole').attr('disabled', false);
				$('#role_list').select2("val", " ");
				$.unblockUI();
				alertify.alert("Se ha agregado correctamente el rol.");
				console.log(resp)
			},

			error:function(error, request)
			{
				$('#crt-forceRole').attr('disabled', false);
				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			}

		});

	});

	$('#crt-forcePrograma').on('click', function(e){

		e.preventDefault();

		var id = $('#udpUserPrograma').val();
		var form = $('#form-forcePrograma');
		var metodo = form.attr('method');
		var route = '/attachPrograma/'+id;
		$(this).attr('disabled', true);
		$.blockUI();

		$.ajax({

			url:route,
			type:metodo,
			data:form.serialize(),

			success:function(resp)
			{
				if (! $.fn.DataTable.isDataTable('#users-table')){
					  listarPersonal(route);
					}else{

					var tabla = $('#users-table').DataTable();
					tabla.ajax.reload();
				}

				$('#agreePrograma').modal('hide');
				$('#crt-forcePrograma').attr('disabled', false);
				$('#semProg').select2("val", " ");
				$.unblockUI();
				alertify.alert("<strong>"+resp.name+"</strong> se ha agregado un programa academico.");
			},

			error:function(error, request)
			{
				$('#crt-forcePrograma').attr('disabled', false);
				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			}

		});

	});

	$('#crt-forceMateria').on('click', function(e){

		e.preventDefault();

		var id = $('#udpUserMateria').val();
		var form = $('#form-forceMateria');
		var metodo = form.attr('method');
		var route = '/attachMaterias/'+id;
		$(this).attr('disabled', true);
		$.blockUI();

		$.ajax({

			url:route,
			type:metodo,
			data:form.serialize(),

			success:function(resp)
			{
				if (! $.fn.DataTable.isDataTable('#users-table')){
					  listarPersonal(route);
					}else{

					var tabla = $('#users-table').DataTable();
					tabla.ajax.reload();
				}
				$('#agreeMateria').modal('hide');
				$('#matProg').select2("val", " ");
				$('#crt-forceMateria').attr('disabled', false);
				$.unblockUI();
				alertify.alert("<strong>"+resp.name+"</strong> se le ha agregado materias.");
			},

			error:function(error, $request)
			{
				$('#crt-forceMateria').attr('disabled', false);
				$.unblockUI();
				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			}

		});


	});

	function listarPersonal(route)
	{
		var tabla = $('#users-table').DataTable({

			destroy:true,
			processing: true,
        	serverSide: true,
        	ajax: route,
        	language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
        	columns: [

        		{data: 'name'},
        		{data: 'cuenta'},
        		{data: 'img', name: 'imagenes.img'},
        		{defaultContent:"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> <button type='button' class='fotos btn btn-primary'><i class='fa fa-file-image-o' aria-hidden='true'></i></button> <button type='button' class='roles btn btn-success'><i class='fa fa-users' aria-hidden='true'></i></button> <button type='button' class='programa btn btn-default'><i class='fa fa-folder' aria-hidden='true'></i></button> <button type='button' class='materia btn btn-primary'><i class='fa fa-book' aria-hidden='true'></i></button> <button type='button' class='borrarUser btn btn-danger'><i class='fa fa-eraser' aria-hidden='true'></i></button>"}
        	]

		});

		editar('#users-table', tabla);
		fotos('#users-table', tabla);
		roles('#users-table', tabla);
		programa('#users-table', tabla);
		materia('#users-table', tabla);
		borrarUser('#users-table', tabla);

	}

	function editar(tbody, tabla)
	{
		$(tbody).on("click", "button.editar", function(){
			var data = tabla.row($(this).parents('tr')).data();
			$('#updateUser').fadeIn();
			$('#listPersonal').fadeOut();
			$('#nameUpdate').val(data.name);
			$('#cuentaUpdate').val(data.cuenta);
			$('#udpUser').val(data.id);
			var roles = $('#rolesUser');
			var semestre = $('#userSemestres');
			var materia = $('#userMaterias');
			roles.html(" ");
			semestre.html(" ")
			materia.html(" ");

			$(data.roles).each(function(key, rol){

				if(rol.slug == 'alm')
				{
				
					roles.append("<li><input type='checkbox' name='roles[]' checked='checked' value="+rol.id+">"+rol.name+"</input></li>");

					$(data.semestres).each(function(key, sem){

						semestre.append("<li><input type='checkbox' name='semes[]' checked='checked' value="+sem.id+">"+sem.name+"("+sem.carrera.name+")</input></li>");
					});

				}else if(rol.slug == 'prf')
				{	
					roles.append("<li><input type='checkbox' name='roles[]' checked='checked' value="+rol.id+"></input>"+rol.name+"</li>");	

					$(data.materias).each(function(key, mat){

						materia.append("<li><input type='checkbox' name='materias[]' checked='checked' value="+mat.id+"></input>"+mat.name+"</li>");

					});

				}else if(rol.slug == 'adm' || rol.slug == 'cdo')
				{
					roles.append("<li><input type='checkbox' name='roles[]' checked='checked' value="+rol.id+"></input>"+rol.name+"</li>");
				}

			});

		});
	}

	function fotos(tbody, tabla)
	{
		$(tbody).on("click", "button.fotos", function(){
			var data = tabla.row($(this).parents('tr')).data();
			var route = 'picturePerfil/'+data.id
			if(!data.imagenes.length == 0)
			{

				window.open(route);	

			}else{

				alertify.alert("<strong>"+data.name+"</strong> no tiene imagen de perfil.");
			}

		});
	}

	function roles(tbody, tabla)
	{
		$(tbody).on("click", "button.roles", function(){
			var data = tabla.row($(this).parents('tr')).data();
			var route = '{{ route('role.index') }}';
			var select = $('#role_list');
			$('#agreeNameRole').val(data.name);
			$('#agreeCuentaRole').val(data.cuenta);
			$('#udpUserRole').val(data.id);
			$('#agreeRole').modal('show');
			
			$.get(route, function(resp){

				select.html(" ");

				$(resp).each(function(key, rol){

					select.append("<option value="+rol.id+">"+rol.name+"</option>");

					$(data.roles).each(function(key, ro){

						if(rol.id == ro.id)
						{
							$("#role_list option[value="+rol.id+"]").remove();
						}
						
					});

				});


			});

		});
	}

	function programa(tbody, tabla)
	{
		$(tbody).on("click", "button.programa", function(){
			var data = tabla.row($(this).parents('tr')).data();
			var route = '/agregarPrograma';
			var carrera = $('#carr_list');
			var semestre = $('#semProg');
			$('#agreeNamePrograma').val(data.name);
			$('#agreeCuentaPrograma').val(data.cuenta);
			$('#udpUserPrograma').val(data.id);

			$('#carr_list').change(function(){

				semestre.html(" ");
			});

			$(data.roles).each(function(key, rol){

				if(rol.slug == "alm")
				{
					$('#agreePrograma').modal('show');
				}

			});

			$.get(route, function(resp){

				carrera.html(" ");
				semestre.html(" ");

				$(resp).each(function(key, carr){

					carrera.append("<option value="+carr.id+">"+carr.name+"</option>");

					$('#carr_list').change(function(){

						var carreraId = this.value;

						$(carr.semestres).each(function(key, sem){
					
							if(carreraId == sem.carrera_id)
							{	

								semestre.append("<option value="+sem.id+">"+sem.name+"</option>");

								$(data.semestres).each(function(key, set){

									if(set.id == sem.id)
									{
										$("#semProg option[value="+sem.id+"]").remove();
									}
								});
							}

						});
				
					});

				});

			});

		});
	}

	function materia(tbody, tabla)
	{
		$(tbody).on("click", "button.materia", function(){
			var data = tabla.row($(this).parents('tr')).data();
			var route = '{{ route('materia.index') }}';
			var materias = $('#matProg');
			$('#agreeNameMateria').val(data.name);
			$('#agreeCuentaMateria').val(data.cuenta);
			$('#udpUserMateria').val(data.id);

			$(data.roles).each(function(key, rol){

				if(rol.slug == 'prf')
				{
					$('#agreeMateria').modal('show');
				}

			});

			$.get(route, function(resp){

				materias.html(" ");

				$(resp).each(function(key, mat){

					materias.append("<option value="+mat.id+">"+mat.name+"</option>");

					$(data.materias).each(function(key, mate){

						if(mat.id == mate.id)
						{
							$("#matProg option[value="+mat.id+"]").remove();
						}

					});

				});

			});

		});
	}

	function borrarUser(tbody, tabla)
	{
		$(tbody).on("click", "button.borrarUser", function(){
			var data = tabla.row($(this).parents('tr')).data();
			$('#forceUser').modal('show');
			$('#idForce').val(data.id);

		});
	}


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

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
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
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#plcAlm').hide();
			$('div#examen').fadeOut();
			$('div#planeacionC').fadeOut();
			$('#act').fadeOut();
		  $('#crtSub').fadeOut();
		  $('#editUnidad').fadeOut();
		  $('#videoUnidad').fadeOut();
		  $('#listSubtemas').fadeOut();
		  $('#listAct').fadeOut();
		  $('#calAct').fadeOut();
		  $('#menUnidad').fadeOut();
		  $('div#preguntaExmamen').hide();


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

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
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
			$('div#examen').fadeOut();
			$('div#planeacionC').fadeOut();
			$('#listUnidades').hide();
			$('#prflistTuto').hide();
			$('#listRub').hide();
			$('#vizuaUnidad').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
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

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
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
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#plcAlm').hide();
			$('div#examen').fadeOut();
			$('div#planeacionC').fadeOut();
			$('#act').fadeOut();
		  $('#crtSub').fadeOut();
		  $('#editUnidad').fadeOut();
		  $('#videoUnidad').fadeOut();
		  $('#listSubtemas').fadeOut();
		  $('#listAct').fadeOut();
		  $('#calAct').fadeOut();
		  $('#menUnidad').fadeOut();
		  $('div#preguntaExmamen').hide();


		});

		$('#crePlan').on('click', function(e){


			e.preventDefault();

			var form = $('#form-plan');
			var metodo = form.attr('method');
			var route = form.attr('action');
			$('#crePlan').attr('disabled', true);
			$.blockUI();

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),


				success:function(resp){

					$('#crePlan').attr('disabled', false);
					$.unblockUI();
					alertify.alert(" El plan ha sido creado correctamente.");

					$('#carrModal').val(resp.name);
					$('#idCarrmodal').val(resp.id);

				},

				error:function(error, request){

					if(error == "timeout")

					{
						$.unblockUI();
						$('#crePlan').attr('disabled', false);
						alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
					}else{

						$.unblockUI();
						$('#crePlan').attr('disabled', false);
						alertify.alert('Tienes errores en el formulario.');
					}



				}



			});



					$('#mdlSem').on('click', function(e){

						e.preventDefault();

						var form = $('#form-mdl');
						var route = form.attr('action');
						var metodo = form.attr('method');
						$('#mdlSem').attr('disabled', true);
						$.blockUI();

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							data: form.serialize(),

							success:function(resp){

								$('#mdlSem').attr('disabled', false);
								$.unblockUI();
								alertify.alert('El semestre ha sido creado correctamente.');
								$('#nameSemmodal').val(resp.name);
								$('#idSemmodal').val(resp.id);

							},

							error:function(error, request){

								if(error == "timeout")

									{
										$('#mdlSem').attr('disabled', false);
										$.unblockUI();
										alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
									}else{

										$('#mdlSem').attr('disabled', false);
										$.unblockUI();
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
						$('#mdlMat').attr('disabled', true);
						$.blockUI();

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							data: form.serialize(),

							success:function(resp){

								$('#mdlMat').attr('disabled', false);
								$.unblockUI();
								alertify.alert('La materia ha sido creada correctamente.');
								$('#mdlMta').val(" ");
								$('#mdlCreditos').val(" ");

							},

							error:function(error, request){


								if(error == "timeout")

									{
										$('#mdlMat').attr('disabled', false);
										$.unblockUI();
										alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
									}else{

										$('#mdlMat').attr('disabled', false);
										$.unblockUI();
										alertify.alert('Tienes errores en el formulario.');
									}

							}

						});

					});

		});

</script>