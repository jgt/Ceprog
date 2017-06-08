<script>


		$(document).on('ready', function(){

			function crearUsuario()
			{
				var route = 'admin/create';
				var roles = $('#roleSelect');
				var carreras = $('#crrs');
				var semestres = $('#smes');
				var materias = $('#mtausr');

				$('#crrs').change(function(){

					semestres.html(" ");
				});

				$.get(route, function(resp){

					roles.html(" ");
					carreras.html(" ");
					materias.html(" ");
						
					$(resp).each(function(key, value){

						$(value.roles).each(function(key, role){

							roles.append("<option value="+role.id+">"+role.name+"</option>");

						});

						$(value.materias).each(function(key, mat){

							materias.append("<option value="+mat.id+">"+mat.name+"</option>");
						});

						$(value.carreras).each(function(key, carrera){

						carreras.append("<option value="+carrera.id+">"+carrera.name+"</option>");

						$('#crrs').change(function(){

									var carreraId = this.value;

								$(carrera.semestres).each(function(key, sem){
					
									if(carreraId == sem.carrera_id)
									{	
										
										semestres.append("<option value="+sem.id+">"+sem.name+"</option>");
										
									}

								});

							});
				
						});

				});

				
				$('#roleSelect').change(function(){

				var role =  $('#roleSelect').val();	
				
				if(role == 2)
				{
					
					$('#userCarr').show();
					$('#userSem').show();
					$('#userMat').hide();
				}else if(role == 3){

					$('#userCarr').hide();
					$('#userSem').hide();
					$('#userMat').show();

				}else{

					$('#userCarr').hide();
					$('#userSem').hide();
					$('#userMat').hide();

				}

			});

			});

			}

			$('a#Cusuario').on('click', function(e){

		        e.preventDefault();
		        crearUsuario();

		        $('#tbMateriaDoc').hide();
		        $('#preForo').hide();
		        $('#listPersonal').hide();
		       $('div#user').show();
		      $('div#listaP').hide();
		      $('div#act').hide();
		      $('div#examen').fadeOut();
		      $('div#listExamen').hide();
		      $('div#calAct').hide();
		      $('div#planeacionC').fadeOut();
		      $('div#editUnidad').hide();
		      $('div#listSubtemas').hide();
		       $('#createVideos').hide();
		       $('div#vizuaUnidad').hide();
		       $('#listRub').hide();
		       $('div#admRole').hide();
		       $('#listTut').hide();
			   $('#adminPlan').hide();
			   $('#tutoriales').hide();
			   $('#chatForo').hide();
			   $('#crr').hide();
			   $('#semm').hide();
			   $('#mtaList').hide();
			   $('#froadm').hide();
			   $('#listExamenDocente').hide();
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
			$('#reporteDiag').hide();

				
			      
	      }); 

			$('#submit').on('click', function(e){

				e.preventDefault();

				var form = $('#form-create');
				var metodo = form.attr('method');
				var action = form.attr('action');
				$('#submit').attr('disabled', true);
				$.blockUI();

				
				$.ajax({

					url: action,
					headers: { 'X-CSFR-TOKEN': token},
					type: metodo,
					data: form.serialize(),

					success: function(resp){

						$.unblockUI();
						$('#submit').attr('disabled', false);
						alertify.alert('Usuario creado correctamente');
						$('input#form').val("");	
						crearUsuario();
						datosDocente(resp);


					},

					error: function(request, error){

						if(error == "timeout"){

							$('#submit').attr('disabled', false);
							$.unblockUI();
							alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
							
						}else{

							$('#submit').attr('disabled', false);
							$.unblockUI();
							alertify.alert('Tienes errores en el formulario de usuario puede ser que te falte un campo o el usuario ya existe.');
							
						}
					}

				})

				
			});

			$('#admCdoEnd').on('click', function(e){

				e.preventDefault();

				var form = $('#form-admEnd');
				var metodo = form.attr('method');
				var route = '/datosMaestro';
				var formData = new FormData($('#form-admEnd')[0]);
				$(this).attr('disabled', true);
				$.blockUI();
				
					$.ajax({

						url:route,
						type:metodo,
						data:formData,
						contentType: false,
				        processData: false,
				        cache: false,

				        success:function(resp)
				        {
				        	$('#form-admEnd').fadeOut();
							$('#user').fadeIn();
				        	$('#admCdoEnd').attr('disabled', false);
				        	$('#admFormacion').val(" ");
				        	$('#admCelular').val(" ");
				        	$('#admAnti').val(" ");
				        	$('#admModelo').val(" ");
				        	$('#admCtn').val(" ");
				        	$('#admEtr').val(" ");
				        	$('#admInd').val(" ");
				        	$('#admPla').val(" ");
				        	$('#admErom').val(" ");
				        	$('#admApa').val(" ");
							$.unblockUI();
							alertify.alert("Se han agregado los datos al docente correctamente.");
				        },

				        error:function(error, request)
				        {
				        	$('#admCdoEnd').attr('disabled', false);
							$.unblockUI();
							alertify.alert("Error al procesar la solicitud por favor intentalo de nuevo.");
				        }


					});

				});

		});

		function datosDocente(resp)
		{
			$(resp).each(function(key, value){

				$('#admUserId').val(value.id);

				$(value.roles).each(function(key, rol){

					if(rol.slug == 'prf')
					{
						var route = '/admin/create';
						var select = $('#admSltCampus');
						$('#form-admEnd').fadeIn();
						$('#user').fadeOut();

						$.get(route, function(resp){

							$(resp).each(function(key, value){

								$(value.campus).each(function(key, cmp){

									select.append("<option value="+cmp.id+">"+cmp.nombre+"</option>");

								});

							});

						});
					}

				});

			});
		}

	</script>