<script>
	
	$(document).on('ready', function(){

		$('#crtDocente').on('click', function(e){

			e.preventDefault();

			$('#cdoCrTdoc').fadeIn();
			$('#cdoListdoc').fadeOut();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();

			var route = '/cdoMaterias/';
			var select = $('#cdoMta');

			$.get(route, function(resp){

				select.html(" ");

				$(resp).each(function(key, value){

					select.append("<option value="+value.id+">"+value.name+"</option>");

				});

			});

		});

		$('#cdoNewDoc').on('click', function(e){

			e.preventDefault();

			var form = $('#form-cdoDocente');
			var metodo = form.attr('method');
			var select = $('#sltCampus');
			var route = '/cdoStore';
			$(this).attr('disabled', true);
			$.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$('#form-cdoEnd').show();
					$('#cdoEnd').show();
					$('#cdoMta').attr('disabled', true);
					$('#cdoPass').attr('disabled', true)
					$('#cdoName').attr('disabled', true);
					$('#cdoCuenta').attr('disabled', true);
					$('#cdoNewDoc').attr('disabled', false).hide();
					$('#cdoErom').val(0);
					$('#cdoApa').val(0);
					$.unblockUI();
					
					$(resp.user).each(function(key, value){

						$('#cdoUserId').val(value.id);
						alertify.alert("El Docente <strong>"+value.name+"</strong> ha sido creado correctamente.");

					});

					$(resp.campus).each(function(key, value){

						select.append("<option value="+value.id+">"+value.nombre+"</option>");

					});
				},

				error:function(error, request)
				{
					$('#cdoNewDoc').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				}

			});

		});

		$('#cdoEnd').on('click', function(e){

			e.preventDefault();

			var form = $('#form-cdoEnd');
			var metodo = form.attr('method');
			var route = '/datosMaestro';
			var formData = new FormData($('#form-cdoEnd')[0]);
			$(this).attr('disabled', true);
			$.blockUI();

			$.ajax({

				url: route,
				type: metodo,
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

		        success:function(resp)
		        {	
		        	$('#form-cdoEnd').fadeOut();
		        	$('#cdoListdoc').fadeOut();
		        	$('#cdoEnd').attr('disabled', false).hide();
		        	$('#cdoNewDoc').attr('disabled', false).show();
		        	$('#cdoMta').attr('disabled', false);
					$('#cdoPass').attr('disabled', false).val(" ");
					$('#cdoName').attr('disabled', false).val(" ");
					$('#cdoCuenta').attr('disabled', false).val(" ");
		        	$.unblockUI();
		        	alertify.alert("El docente ha sido creado correctamente.");
		        },

		        error:function(error, request)
		        {
		        	$('#cdoEnd').attr('disabled', false);
		        	$.unblockUI();
		        	alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		        }
			});
			
		});

		$('#cdoListdocente').on('click', function(e){

			e.preventDefault();

			$('#cdoListdoc').fadeIn();
			$('#form-cdoEnd').fadeOut();
			$('#cdoCrTdoc').fadeOut();
			$('#showRpt').fadeOut();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#evaListAlm').fadeOut();
			var route = $(this).attr('href');
			listar(route);
			
		});

		$('#rptSemestral').on('click', function(e){

			e.preventDefault();
			$('#rptSem').fadeIn();
			

		});

		$('#crt-rptSemestral').on('click', function(e){

			e.preventDefault();
			var id = $('input:radio[id=vlaId]:checked').val();
			var materia = $('input:radio[id=vlaId]:checked').attr('materia');
			var semestre = $('input:radio[id=vlaId]:checked').attr('semestre');
			var carrera = $('input:radio[id=vlaId]:checked').attr('carrera');
			$('#prgSemestral').val(carrera);
			$('#semSemestral').val(semestre);
			$('#mtaNamesem').val(materia);
			$('#mtaIdsem').val(id);
			$('#showRpt').fadeIn();
			$('#reporteSem').modal('hide');
			$('#cdoListdoc').fadeOut();


		});

		$('#crt-rptSem').on('click', function(e){

			e.preventDefault();
			var form = $('#form-rptSemestral');
			var metodo = form.attr('method');
			var route = '/rptSemestral';
			$(this).attr('disabled', true);
			$.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),


				success:function(resp)
				{
					$('#crt-rptSem').attr('disabled', false);
					$.unblockUI();
					$('#cdoListdoc').fadeIn();
					$('#showRpt').fadeOut();
					var tabla = $('#cdoList-table').DataTable();
					tabla.ajax.reload();
					alertify.alert("El reporte ha sido creado correctamente.");


				},

				error:function(error, request)
				{
					$('#crt-rptSem').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				}


			});

		});

	
		function listar(route)
		{
			
			var tabla = $('#cdoList-table').DataTable({

				destroy:true,
				processing: true,
        		serverSide: true,
        		ajax:route,
        		language: { url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"},
        		columns:[

        			{data: 'user.name', name: 'user.name'},
        			{defaultContent: "<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i></button> <button type='button' class='curriculum btn btn-primary'><i class='fa fa-download' aria-hidden='true'></i></button> <button type='button' class='semestral btn btn-primary'><i class='fa fa-file-word-o' aria-hidden='true'></i></button> <button type='button' class='borrar btn btn-danger'><i class='fa fa-eraser' aria-hidden='true'></i></button>"}
        					
        		]

			});

			editar('#cdoList-table', tabla);
			curriculum('#cdoList-table', tabla);
			semestral('#cdoList-table', tabla);
			borrar('#cdoList-table', tabla);

		}

		function editar(tbody, tabla)
		{
			$(tbody).on("click", "button.editar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				console.log(data);

			});
		}

		function curriculum(tbody, tabla)
		{
			$(tbody).on("click", "button.curriculum", function(){
				var data = tabla.row($(this).parents('tr')).data();
				console.log(data);

			});
		}

		function semestral(tbody, tabla)
		{
			$(tbody).on("click", "button.semestral", function(){
				var data = tabla.row($(this).parents('tr')).data();
				var div = $('#opnReporte');
				$('#userSemid').val(data.id);	
				$('#docSemestral').val(data.user.name);
				$('#reporteSem').modal('show');
				div.html(" ");
				
				$(data.user.materias).each(function(key, value){

						if(value.seguimiento == null)
						{
							div.append("<br><input type='radio' id='vlaId' checked name='materias[]' materia="+value.name+" semestre="+value.semestre.name+" carrera="+value.semestre.carrera.name+" value="+value.id+"> "+value.name+"</input>");
						}
					
				});

			});
		}

		function borrar(tbody, tabla)
		{
			$(tbody).on("click", "button.borrar", function(){
				var data = tabla.row($(this).parents('tr')).data();
				console.log(data);

			});
		}

		
	});

</script>