<script>
	
	$(document).on('ready', function(){

		$('#exaDiag').on('click', function(e){

			e.preventDefault();

			$('#crtExaDiag').fadeIn();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();

		});

		$('#crtExadia').on('click', function(e){

			e.preventDefault();

			var route = $('#exaDiag').attr('href');
			var ruta = '{{ route('areas') }}';
			areas(ruta);
			crearExamen(route);
			$('#preguntaDiagnostico').fadeIn();
			$('#crtExaDiag').fadeOut();
			$('#listEva').fadeOut();
		});

		$('#pregDiag').on('click', function(e){

			e.preventDefault();
			crearPregunta();

		});

		$('#crtEvaresp').on('click', function(e){

			e.preventDefault();
			crearRespuesta();

		});

		$('#ctrPregedit').on('click', function(e){

			e.preventDefault();
			var id = $('#editPregEva').val();
			var form = $('#form-edtPregunta');
			var metodo = form.attr('method');
			var route = 'updatePreDiag/'+id;
			CKEDITOR.instances.editEnuIcm.updateElement();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					if (! $.fn.DataTable.isDataTable('#listevadiag-table')){
						listar(route);
					}else{

						var tabla = $('#listevadiag-table').DataTable();
						tabla.ajax.reload();

					}
				
					$('#edtPrgdiav').modal('hide');
					alertify.alert('La pregunta ha sido edita correctamente');
				},

				error:function()
				{
					alertify.alert('Error al procesar la solicitud');
				}

			});

		});

		//funciones para el examen diagnostico

		function crearExamen(route)
		{
			var form = $('#formExadig');
			var metodo = form.attr('method');
			$('#crtExadia').attr('disabled', true);
			$.blockUI();

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),

				success:function(resp)
				{
					$.unblockUI();
					alertify.alert('el examen ha sido creado.');
					$('#crtExadia').attr('disabled', false);
					$('#evaDid').val(resp.id);
					var cont = $('#evaCont').val(1);
					var valorP = $('#evaValor').val(2);
				},

				error:function()
				{
					$.unblockUI();
					$('#crtExadia').attr('disabled', false);
					alertify.alert('error al procesar la solicitud.');
				}


			});
		}

		function areas(ruta)
		{	
			var area = $('#areaId');
			
			$.get(ruta, function(resp){

				area.html(' ');

				$(resp).each(function(key, are){

					area.append("<option value="+are.id+">"+are.name+"</option>");

				});

			});
		}

		function crearPregunta()
		{
			var form = $('#form-evadigs');
			var metodo = form.attr('method');
			var route = form.attr('action')
			var numeracion = $('#evaCont').val();
			var formData = new FormData($('#form-evadigs')[0]);
			$('#pregDiag').attr('disabled', true);
			$.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

				success:function(resp)
				{
					$.unblockUI();
					alertify.alert('La pregunta ha sido creada correctamente');

					$('#prtEva').val(resp.id);
					$('#Evaresp').modal('show');
					$('#evaContenido').val(' ');
					$('input[type=file]').val('');
					$('#pregDiag').attr('disabled', false);

					//conteo de preguntas.
					var preguntas = [resp];
					var contador = preguntas.length;
					var num = parseFloat(numeracion) + parseFloat(contador);
					$('#evaCont').val(num);
		   
				},

				error:function()
				{
					$.unblockUI();
					$('#pregDiag').attr('disabled', false);
					alertify.alert('Error al procesar la solicitud');
				}


			});
		}

		function crearRespuesta()
		{
			var form = $('#crtRespdiag');
			var metodo = form.attr('method');
			var route = form.attr('action');
			$('#crtEvaresp').attr('disabled', true);
			$.blockUI();

			$.ajax({


				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$.unblockUI();
					$('#Evaresp').modal('hide');
					$('input#evaName').val(' ');
					$('#crtEvaresp').attr('disabled', false);
					alertify.alert('La respusta ha sido creada correctamente');

				},

				error:function()
				{
					$.unblockUI();
					$('#crtEvaresp').attr('disabled', false);
					alertify.alert('Error al procesar la solicitud');
				}


			});
		}

		function crearRespuestasIncompletas()
		{
			var form = $('#crtRespdiagIn');
			var metodo = form.attr('method');
			var route = form.attr('action');
			$('#crtEvarespIn').attr('disabled', true);
			$.blockUI();

			$.ajax({


				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$.unblockUI();
					$('#EvarespIn').modal('hide');
					$('input#evaNameIn').val(' ');
					$('#crtEvarespIn').attr('disabled', false);
					alertify.alert('La respusta ha sido creada correctamente');

				},

				error:function()
				{
					$.unblockUI();
					$('#crtEvarespIn').attr('disabled', false);
					alertify.alert('Error al procesar la solicitud');
				}


			});
		}


		//Lista de examenes para el rol cordinador

		$('#listEvadig').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			$('#evaList').fadeIn();
			$('#crtExaDiag').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	

			if (! $.fn.DataTable.isDataTable('#listevadiag-table')){
				listar(route);
			}else{

				var tabla = $('#listevadiag-table').DataTable();
				tabla.ajax.reload();

			}

		});

		$('#updateEva').on('click', function(e){

			e.preventDefault();

			var id = $('#editEvaid').val();
			editarExamen(id);

		});

		$('#crt-forceEva').on('click', function(e){

			e.preventDefault();
			var id = $('#dltEva').val();
			evaDelete(id)

		});

		$('#atrasEva').on('click', function(e){

			e.preventDefault();

			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeIn();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#reporteDiag').hide();
		});

		$('#crt-forcePregunta').on('click', function(e){

			e.preventDefault();
			var id = $('#dltPregunta').val();
			var form = $('#form-forcePregunta');
			var metodo = form.attr('method');
			var route = 'deletePeva/'+id;
			$(this).attr('disabled', true);
			$.blockUI();

			$.ajax({


				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					if (! $.fn.DataTable.isDataTable('#listevadiag-table')){
						listar(route);
					}else{

						var tabla = $('#listevadiag-table').DataTable();
						tabla.ajax.reload();

					}

					alertify.alert('La pregunta ha sido borrado correctamente');
					$('#crt-forcePregunta').attr('disabled', false);
					$.unblockUI();
					$('#evaList').fadeIn();
					$('#listEva').fadeOut();
					$('#forcePreg').modal('hide');
					
				},

				error:function()
				{
					alertify.alert('Error al procesar la solicitud, por favor intentalo de nuevo');
					$('#crt-forcePregunta').attr('disabled', false);
					$.unblockUI();
				}


			});

		});

		//crear preguntas incompletas.

		$('#ctrP').on('click', function(e){

			e.preventDefault();

			var form = $('#stroPregunta');
			var metodo = form.attr('method');
			var route = form.attr('action');
			var numeracion = $('#nmpEva').val();
			var formData = new FormData($('#stroPregunta')[0]);
			$('#pregDiag').attr('disabled', true);
			$.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

				success:function(resp)
				{
					if (! $.fn.DataTable.isDataTable('#listevadiag-table')){
						listar(route);
					}else{

						var tabla = $('#listevadiag-table').DataTable();
						tabla.ajax.reload();

					}

					$.unblockUI();
					alertify.alert('La pregunta ha sido creada correctamente');
					$('#EvarespIn').modal('show');
					$('#prtEvaIn').val(resp.id);

					$('#crearPrg').modal('show');
					$('#enuIcm').val(' ');
					$('input[type=file]').val('');
					$('#ctrP').attr('disabled', false);

					//conteo de preguntas.
					var preguntas = [resp];
					var contador = preguntas.length;
					var num = parseFloat(numeracion) + parseFloat(contador);
					$('#nmpEva').val(num);
		   
				},

				error:function()
				{
					$.unblockUI();
					$('#ctrP').attr('disabled', false);
					alertify.alert('Error al procesar la solicitud');
				}


			});

		});

		//respuestas incompletas
		$('#crtEvarespIn').on('click', function(e){

			e.preventDefault();
			crearRespuestasIncompletas();

		});


		function evaDelete(id)
		{
			var form = $('#form-forceEva');
			var metodo = form.attr('method');
			var route = 'deleteEva/'+id;

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					if (! $.fn.DataTable.isDataTable('#listevadiag-table')){
					listar(route);
					}else{

					var tabla = $('#listevadiag-table').DataTable();
					tabla.ajax.reload();

					}
					
					$('#forceEva').modal('hide');
					alertify.alert('El examen ha sido elimando correctamente');

				},

				error:function()
				{
					alertify.alert('Error al procesar la solicitud');
				}


			});			
		}


		function editarExamen(id)
		{
			var form = $('#form-evaDocente');
			var metodo = form.attr('method');
			var route = 'updateEva/'+id;
			$('#updateEva').attr('disabled', true);
			$.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function()
				{	
					if (! $.fn.DataTable.isDataTable('#listevadiag-table')){
						listar(route);
					}else{

						var tabla = $('#listevadiag-table').DataTable();
						tabla.ajax.reload();

					}
					$('#updateEva').attr('disabled', false);
					$.unblockUI();
					$('#edtEvadiag').modal('hide');
					alertify.alert('El examen ha sido editado correctamente.');
				},

				error:function()
				{
					$.unblockUI();
					$('#updateEva').attr('disabled', false);
					alertify.alert('Error al procesar la solicitud por favor intentalo de nuevo.');
				}


			});
		}

		function listar(route)
		{
			var tabla = $('#listevadiag-table').DataTable({

				destroy:true,
				processing: true,
	        	serverSide: true,
	        	ajax: route,
	        	language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
	        	columns: [

	        		{data: 'name'},
	        		{data: 'modalidad'},
	        		{data: 'modulo'},
	        		{data: 'fecha'},
	        		{data: 'fechaF'},

	        		{defaultContent:"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> <button type='button' class='crearEva btn btn-success'><i class='fa fa-plus-square' aria-hidden='true'></i></button> <button type='button' class='preguntas btn btn-primary'><i class='fa fa-book' aria-hidden='true'></i></button> <button type='button' class='reporte btn btn-success'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button> <button type='button' class='borrar btn btn-danger'><i class='fa fa-eraser' aria-hidden='true'></i></button>"}
	        	]


				});

			editar('#listevadiag-table', tabla);
			crearEva('#listevadiag-table', tabla);
			preguntas('#listevadiag-table', tabla);
			reporte('#listevadiag-table', tabla);
			borrar('#listevadiag-table', tabla);

		}

		function crearEva(tbody, tabla)
		{
			$(tbody).on("click", "button.crearEva", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var contador = data.preguntas.length;
				var numeroP = contador + 1;
				var route = '{{ route('areas') }}';
				var area = $('#crtArea');
				$('#nmpEva').val(numeroP);
				$('#valEva').val(2);
				$('#quizEva').val(data.id);
				$('#crearPrg').modal('show');

				$.get(route, function(resp){

					area.html(' ');

					$(resp).each(function(key, are){

						area.append("<option value="+are.id+">"+are.name+"</option>");

					});

				});

			});
		}

		function editar(tbody, tabla)
		{
			$(tbody).on("click", "button.editar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var route = '{{ route('carrEva') }}';
				var carreras = $('#selectMatdocenteEva');
				$('#edtEvadiag').modal('show');
				$('#editEvaid').val(data.id);
				$('#edtEvaname').val(data.name);
				$('#editEvamod').val(data.modalidad);
				$('#editEvamodulo').val(data.modulo);
				$('#editEvafecha').val(data.fecha);
				$('#editEvafechaF').val(data.fechaF);

				$.get(route, function(resp){

					carreras.html(' ');

					$(resp).each(function(key, carr){

						carreras.append("<option value="+carr.id+">"+carr.name+"</option>");

						$(data.carreras).each(function(key, prg){

							if(prg.id == carr.id)
							{
								carreras.find("option[value="+carr.id+"]").attr('selected', true);
							}

						});
						
					});

				});
				
			});
		}

		function preguntas(tbody, tabla)
		{
			$(tbody).on("click", "button.preguntas", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var preguntas = $('#tablaEva');
				$('#listEva').fadeIn();
				$('#crtExaDiag').fadeOut();
				$('#evaList').fadeOut();
				$('#preguntaDiagnostico').fadeOut();
				preguntas.html(' ');

				$(data.preguntas).each(function(key, resp){

					preguntas.append("<tr><td>"+resp.contenido+"</td><td><button id="+data.id+" value="+resp.id+" type='button' class='btn btn-warning' OnClick='editarEva(this)'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></td><td><button value="+resp.id+" type='button' class='btn btn-danger' OnClick='borrarEva(this)'><i class='fa fa-eraser' aria-hidden='true'></i></button></td></tr>");

				});
				
			});
		}

		function reporte(tbody, tabla)
		{
			$(tbody).on("click", "button.reporte", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var id = data.id;
				var route = 'evaPdf/'+id;
				$.blockUI();

				$.get(route, function(resp){
					$.unblockUI();
					window.open(route);

				}).fail(function(resp){

					alertify.alert('Error al procesar la solicitud');

				});
				
			});
		}

		function borrar(tbody, tabla)
		{
			$(tbody).on("click", "button.borrar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var id = $('#dltEva').val(data.id);
				$('#forceEva').modal('show');
				
			
			});
		}
		
	});
		
		//functiones para admistrar las preguntas de los examenes creados
		
		function borrarEva(btn)
		{
			var id = btn.value;
			$('#dltPregunta').val(id);
			$('#forcePreg').modal('show');
		}

		function editarEva(btn)
		{

			var id = btn.value;
			var exaId = btn.id;
			var route = 'pregEditdiag/'+id;
			var ruta = '{{ route('areas') }}';
			$('#edtPrgdiav').modal('show');
			$('#editQuizEva').val(exaId);
			$('#editValEva').val(2);

			$.get(route, function(resp){

				CKEDITOR.instances.editEnuIcm.setData(resp.contenido);
				$('#editPregEva').val(resp.id);
				$('#editNmpEva').val(resp.contador);
				$('#areaId').val(resp.area_id);
			});

		}


</script>