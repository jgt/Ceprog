<script>
	
	$(document).on('ready', function(){

		
		$('a#menuListUser').on('click', function(e){

			e.preventDefault();

			$('#mtaList').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#listTutAlm').hide();
			$('#preForo').hide();
			$('#froadm').hide();
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
			$('#crr').hide();
			$('#alumnosListUser').show();
			var route = $(this).attr('href');
			var tablaAlumnos = $('#tablaAlumnosList');

			
			$.get(route, function(resp){

				tablaAlumnos.html(" ");

				$(resp).each(function(key, value){
					$('#prbPrueba').val(value.id);
					$(value.semestre).each(function(key, sem){

						$(sem.carrera).each(function(key, carrera){

						$(sem.users).each(function(key, user){

							if(sem.users.length > 0){

							$(user.roles).each(function(key, role){

								if(role.name == "alumno")
										{

											$('#almSearch').on('click', function(e){

												e.preventDefault();
												var alumno = $('#mierda').val();

												if(user.name == alumno)
												{	
													tablaAlumnos.html(" ");

													tablaAlumnos.append("<tr><td>"+user.name+"</td><td>"+carrera.name+"</td><td><button class='btn btn-primary' value="+value.id+" id="+user.id+" OnClick='listUserAct(this);' data-toggle='modal' data-target='#prbUser'</button><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+user.id+" OnClick='resportePdf(this);' </button><i class='fa fa-pencil-square-o'></i></td></tr>");
												}
												
										});

											tablaAlumnos.append("<tr><td>"+user.name+"</td><td>"+carrera.name+"</td><td><button class='btn btn-primary' value="+value.id+" id="+user.id+" OnClick='listUserAct(this);' data-toggle='modal' data-target='#prbUser'</button><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+user.id+" OnClick='resportePdf(this);' </button><i class='fa fa-pencil-square-o'></i></td></tr>");
										}

							});

						}else{

							alertify.alert("Esta materia no tiene alumnos inscritos.");
						}

							});

						});
					});

				});	

			});

		});


		$('a#listUni').on('click', function(e){

			e.preventDefault()

			$('#mtaList').hide();
			$('#listExamenDocente').hide();
			$('#listTutAlm').hide();
			$('#preForo').hide();
			$('#froadm').hide();
			$('#chatForo').hide();
			$('div#act').hide();
			$('div#listAct').hide();
		    $('div#examen').hide();
		    $('div#listExamen').hide();
		    $('div#calAct').hide();
		    $('div#notasRubricas').hide();
		    $('div#planeacionC').hide();
		    $('div#listSubtemas').hide();
		    $('#createVideos').hide();
		    $('#Almact').hide();
		    $('#AlmUni').hide();
		    $('div#vizuaUnidad').hide();
		    $('div#VunidadE').hide();
		    $('#listRub').hide();
		    $('#prflistTuto').hide();	
		    $('#listTutAlm').hide();
		    $('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#reportes').hide();
			$('#alumnosListUser').hide();
			$('#listPersonal').hide();
			$('#crr').hide();
			$('#semm').hide();
			var link = $('#uniList').attr('href');
			var materia = $(this).parents('ul');
			var id = materia.data('id');
			var route = link.split('%7Bid%7D').join(id);
			var tablaUnidad = $('#tablaUnidad');
			$('div#listUnidades').show();
	
			$.get(route, function(resp){

				tablaUnidad.html(" ");
	
				$(resp).each(function(key, value){

						tablaUnidad.append("<tr><td>"+value.unidad+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editUnidad(this);' data-toggle='modal' data-target='#editUnidad' </button><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='subTemas(this);'</button><i class='fa fa-search'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='createSubt(this);' data-toggle='modal' data-target='#crtSub'</button><i class='fa fa-plus'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='crearAct(this);'</button><i class='fa fa-plus'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='listAct(this);'</button><i class='fa fa-search'></i></td><td><button  class='btn btn-primary' value="+value.id+"  data-toggle='modal' data-target='#videoUnidad'  OnClick='Videos(this);'</button><i class='fa fa-film'></i></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#videoListDocente' OnClick='videoDocente(this);' value="+value.id+"><i class='fa fa-file-excel-o'></i></button></td><td><button class='btn btn-primary' OnClick='unidadPdf(this);' value="+value.id+"><i class='fa fa-file-word-o'></i></button></td></tr>");

				});

			});

		});

		$('#apoy').on('click', function(e){

			e.preventDefault();

			var id = $('#apoyo_id').val();
		    var form = $('#apoyoM_id');
		    var link = form.attr('action');
		    var metodo = form.attr('method');
		    var route = link.split('%7Bid%7D').join(id);
		    $('#Mapoyo').modal('hide');

		    var formData = new FormData($('#apoyoM_id')[0]);

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

		        	 alertify.alert("El archivo  ha sido guardado correctamente.");
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

		//subir una imagen a un subtema.

		$('#fimg').on('click', function(e){

			e.preventDefault();

			var id = $('#subimgId').val();
			var form = $('#imgSub');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split("%7Bid%7D").join(id);
			$('#imagenSubtema').modal('hide');

			var formData = new FormData($('#imgSub')[0]);

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

		        	 alertify.alert("La imagen  ha sido guardado correctamente.");
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

		//subir un video a una unidad

		$('#Vimg').on('click', function(e){

			e.preventDefault();
			var id = $('#viduni').val();
			var form = $('#my-dropzone');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split("%7Bid%7D").join(id);
			$('#videoUnidad').modal('hide');

			var formData = new FormData($('#my-dropzone')[0]);

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

		        	 alertify.alert("El video ha sido guardado correctamente.");
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

	
	function resportePdf(btn){

		var id = btn.value;
		var idMateria = $('#prbPrueba').val() 
		var link = $('#reportePdf').attr('href');
		var route = link.split('%7Bid%7D').join(id).split('%7Bmateria%7D').join(idMateria);
		
		$.get(route, function(resp){

			window.open(route);

		})

		.fail(function(){

			alertify.alert("Esta materia no tiene actividades en sus unidades.");

		});

	}



	function listUserAct(btn){

			var id = btn.value;
			var userId = btn.id;
			var link = $('#prb').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			var tablaAct = $('#tablaPrbUser');

			$.get(route, function(resp){

				tablaAct.html(" ");	

				$(resp).each(function(key, value){

					$(value.unidades).each(function(key, uni){

						$(uni.actividades).each(function(key, act){

							$(act.fileentries).each(function(key, file){

								$(file.user).each(function(key, user){

									if(userId == user.id && user.calificaciones.length == 0)
									{
											 var filename = file.filename;
		              						 var cadena = filename.split(' ').join('%20');
		              						
											tablaAct.append("<tr><td>"+file.filename+"</td><td>"+act.actividad+"</td><td>"+uni.unidad+"</td><td>"+value.name+"</td><td>"+user.name+"</td><td><button class='btn btn-primary' OnClick='descActUser(this);' value="+cadena+"><i class='fa fa-download' aria-hidden='true'></i></button></td><td><button class='btn btn-primary' OnClick='calificacionUser(this);' value="+file.id+"><i class='fa fa-book' aria-hidden='true'></i></button></td></tr>");
									}else if(userId == user.id && user.calificaciones.length >=1){

										tablaAct.append("<tr><td>"+file.filename+"</td><td>"+act.actividad+"</td><td>"+uni.unidad+"</td><td>"+value.name+"</td><td>"+user.name+"</td><td><button class='btn btn-primary' OnClick='descActUser(this);' value="+cadena+"><i class='fa fa-download' aria-hidden='true'></i></button></td><td>Calificado</td></tr>");
									}
								});
								
							});
						});

					});

				});			
			});

		}

		function calificacionUser(btn)
		{
			var id = btn.value;
	        var calificacion = $('#calificacionRoute').attr('href');
	        var route = calificacion.split('%7Bid%7D').join(id);
	        var ul = $('#ulR');
			$('#prbUser').modal('hide');
			$('#calAct').show();
			$('#subCal').show();
		    $('#subEnd').hide();
			$('#alumnosListUser').hide();

			$.get(route, function(resp){

				ul.html(" ");
				$(resp.archivo).each(function(key, value){

					$('#nameAuth').val(value.usuario);
					$('#uid').val(value.user_id);
					$('#nameAct').val(value.actividad.actividad);
					$('#aid').val(value.actividad_id);

				});

				$(resp.rubricas).each(function(key, value){


		            ul.append("<li><strong>"+value.name+"</strong>("+value.total+")<input type='text' name='rubrica_"+value.id+"' id='rubInp' class='rubrica form-control'></li>");
		          });

		          $('#sumar').on('click', function(e){

		            e.preventDefault();
		            var total = 0;

		        $('.rubrica').each(function(index){

		           total += parseFloat($(this).val());

		         });

		         $("#ntoFinal").val(total);

		          });

		      });

			$('#subCal').on('click', function(e){

		      e.preventDefault();

		    var id = btn.value;
		    var form = $('#form-calificacion');
		    var ruta = form.attr('action').replace(':id', id);
		    var metodo = form.attr('method');
		  
		    $.ajax({

		      url: ruta,
		      headers: { 'X-CSFR-TOKEN': token},
		      type: metodo,
		      data: form.serialize(),

		      success:function(resp){

		          if(resp)
		          {

		            alertify.alert('La nota se ha guardo correctamente');
		            $('#nameAuth').prop('disabled', true);
		            $('#nameAct').prop('disabled', true);
		            $('input#rubInp').prop('disabled', true);
		            $('#ntoFinal').val(" ");
		            $('#subCal').hide();
		            $('#subEnd').show();

		          }
		          

		      },

		      error:function(request, resp){

		        if(resp == 'timeout'){

		            alertify.alert('Tienes problemas de conexion por favor intentalo de nuevo!!.');

		        }else{

		            alertify.alert('Recuerda que la nota de cada rubrica no puede ser mayor a el valor que se le asigno a la rubrica.');
		        }


		      }


		    });

		    });

		    $('#subEnd').on('click', function(e){

		    	e.preventDefault();
		    	$('#calAct').hide();

		    });
	
		}

		function descActUser(btn){

			var name = btn.value;
			var link = $('#download').attr('href');
			var route = link.split('%7Bfilename%7D').join(name);
			window.open(route);

		}

	function createSubt(btn){

		var id = btn.value;
		$('#createSubt').val(id);
	}

	$('#crsubt').on('click', function(e){

		e.preventDefault();
		var form = $('#create-formSubt');
		var route = form.attr('action');
		var metodo = form.attr('method');

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alert("El subtema ha sido creado.");
				$('#subtemaCreate').val(" ");
				$('#createDesc').val(" ");

			},

			error:function(resp){

				if(resp == 'timeout')
				{
					alertify.alert(" Tienes problemas con el internet por favor intentelo de nuevo.");
				}	

			}

		});
	});


	function unidadPdf(btn){

		var id = btn.value;
		var link = $('#pdfunidad').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}


	function videoDocente(btn){

		var id = btn.value;
		var link = $('#showVideosDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var tablaDocente = $('#tablaVideosListDocente');

		$.get(route, function(resp){

			tablaDocente.html(" ");

			$(resp).each(function(key, value){

				tablaDocente.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='borrarVideos(this);' data-dismiss='modal'</button><i class='fa fa-pencil-square-o'></i></td></tr>")

			});

		});

	}

	function borrarVideos(btn){

		var id = btn.value;
		var link = $('#deleteVideos').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var tablaDocente = $('#tablaVideosListDocente');

		$.get(route, function(resp){

			tablaDocente.html(" ");
			alertify.alert("El video ha sido borrado correctamente.");

		});

	}


	function Videos(btn){

		var id = btn.value;
		$('#viduni').val(id);
		var link = $('#idSubtemas').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			$(resp.unidad).each(function(key, value){

				$('#namUnidad').val(value.unidad);
				$('#namUnidad').prop('disabled', true);

			});

		});


	}


	function subTemas(btn){

		var id = btn.value;
		var link = $('#editSubtemas').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var tablaSubtemas = $('#tablaSubtemas');
		
		$.get(route, function(resp){

			$('div#listUnidades').hide();
			$('div#listSubtemas').show();

			tablaSubtemas.html(" ");

			var array = resp.length;
		
			if(array > 0)
			{

				$(resp).each(function(key, value){

				$('#editsubId').val(id);
				
					tablaSubtemas.append("<tr><td>"+value.subtemas+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editSubtemas(this);' data-toggle='modal' data-target='#editST'</button><i class='fa fa-pencil'></i></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='imagenSubtema(this);' data-toggle='modal' data-target='#imagenSubtema'><i class='fa fa-file-image-o'></i></button></td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#listImagenes'  OnClick='listImagenes(this);'><i class='fa fa-folder'></i></button></td><td><button class='btn btn-danger' value="+value.id+"  OnClick='borrarSubtema(this);'><i class='fa fa-eraser'></i></button></td></tr>");
				

			});

			}else{

				$('div#listSubtemas').hide();
					$('div#listUnidades').show();
					alertify.alert("no hay subtemas en esta unidad.");
				
			}

		});

	}


	function listImagenes(btn){

		var id = btn.value;
		var link = $('#imgList').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var img = $('#tablaImagenes');

		$.get(route, function(resp){

			img.html(" ");

			var array = resp.length;

			if(array > 0)
			{

				$(resp).each(function(key, value){

				img.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' value="+value.id+"  OnClick='borrarImg(this);' data-dismiss='modal'><i class='fa fa-eraser'></i></button></td></tr>");

				});

			}else{

				alertify.alert("no hay imagenes en este subtema.");

			}

		});

	}


	function borrarImg(btn){

		var id = btn.value;
		var link = $('#imgBorrar').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			alertify.alert("La imagen ha sido borrada.");

		});

	}


	function imagenSubtema(btn){

		var id = btn.value;
		var link = $('#showSubtema').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		
		$.get(route, function(resp){

			$('#namSubtema').val(resp.subtemas);
			$('#subimgId').val(resp.id);
			$('#namSubtema').prop('disabled', true);

		});
	}

	function borrarSubtema(btn){

		var id = btn.value;
		var link = $('#deleteSub').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			$('div#listSubtemas').hide();
			$('div#listUnidades').show('alert');
			alertify.alert(" El subtema ha sido borrado.");


		});

	}


	function editSubtemas(btn){

		var id = btn.value;
		$('#Idsubtemas').val(id);
		var link = $('#showSubtema').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			$('#editsubT').val(resp.subtemas);
			$('#descSubedit').val(resp.descripcion);

		});
			
	}

	$('#editS').on('click', function(e){

		e.preventDefault();

		var id = $('#Idsubtemas').val();
		var form = $('#edit-formSubt');
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split('%7Bid%7D').join(id);
		
		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert(" El subtema ha sido editado correctamente.");

			},

			error:function(resp){

				if(resp == 'timeout')
				{
					alertify.alert(" Tienes problemas con el internet por favor intentelo de nuevo.");
				}	

			}

		});

	});

	function editUnidad(btn){

			var id = btn.value;
			var link = $('#editplan').attr('href');
			var route = link.split('%7Bid%7D').join(id);
		
			$.get(route, function(resp){

				$('#editasignatura').val(resp.materia);
				$('#editsemes').val(resp.semestre);
				$('#editseriacion').val(resp.seriacion);
				$('#editclave').val(resp.clave);
				$('#editobjetivo').val(resp.objetivo);
				$('#editasesor').val(resp.asesor);
				$('#editunidad').val(resp.unidad);
				$('#edittema').val(resp.tema);
				$('#editactividadP').val(resp.actividadP);
				$('#editfechaU').val(resp.fecha);
				$('#editmateria').val(resp.materia_id);
				$('#editUs').val(resp.user_id);
				$('#unidadId').val(resp.id);

				
			});
			
		}

		$('#editU').on('click', function(e){

					e.preventDefault();

					var id = $('#unidadId').val();
					var form = $('#edit-formplan');
					var link = form.attr('action');
					var metodo = form.attr('method');
					var route = link.split('%7Bid%7D').join(id);

					$.ajax({

						url: route,
						headers: { 'X-CSFR-TOKEN': token},
						type: metodo,
						data: form.serialize(),

						success:function(resp){

							alertify.alert(" la unidad ha sido editada correctamente");

						},

						error:function(resp){

							if(resp == 'timeout')
							{

								alertify.alert('Tienes problemas con tu internet por favor intenta de nuevo.');
							}


						}


					});
					
				});


		function crearAct(btn){

			$('div#act').show();
			$('div#listUnidades').hide();
			var id = btn.value;
			var unidad = $('#unId').val(id);

		}

				$('#crtAct').on('click', function(e){

		    e.preventDefault();
		    var form = $('#prf');
		    var route = form.attr('action');
		    var metodo = form.attr('method');
		    
		    $.ajax({

		      url: route,
		      headers: { 'X-CSFR-TOKEN': token},
		      type: metodo,
		      data: form.serialize(),

		      success:function(resp){

		      	$('input#numeroR').val(" ");
		      	$('#cancelar').hide();
		      	$('#crearR').show();
		      	$('input#porcentajeD').val(" ");
		        $('#cognoscitivo').val(" ");
		        $('#actividad').val(" ");
		        $('#descripAct').val(" ");
		        $('#estrategia').val(" ");
		        $('#valoractividad').val(" ");
		        $('#unidad').val(" ");
		        $('#evidencia').val(" ");
		        $('#caracteristicas').val(" ");
		        $('#realizacion').val(" ");
		        $('#codigoactividad').val(" ");


		        alertify.alert('La actividad ha sido creada, para finalizar el proceso de creacion tienes que crear las rubricas para esa actividad en el siguiente formulario.');

		        $('input#actividadId').val(resp.actividad);
		        $('input#actividadP').val(resp.valoractividad);
		        $('input#idAct').val(resp.id);
		       
		        $('input#numeroR').prop('disabled', true);
		        $('input#porcentajeD').prop('disabled', true);
		        $('input#actividadP').prop('disabled', true);

		        if(resp)
		        {
		          $('.validation').addClass('alert');
		        }

		      },

		      error:function(resp){

		        if(resp == "timeout")
		        {
		          alertify.alert('Lo siento tienes problemas con tu internet.');
		        }

		        alertify.alert('Tienes errores en el formulario por favor corrigelos.');

		        $('#cog').html(resp.responseJSON.cognoscitivo);
		        $('#actdad').html(resp.responseJSON.actividad);
		        $('#desc').html(resp.responseJSON.descripcion);
		        $('#est').html(resp.responseJSON.estrategia);
		        $('#valact').html(resp.responseJSON.valoractividad);
		        $('#uni').html(resp.responseJSON.unnidad);
		        $('#evi').html(resp.responseJSON.evidencia);
		        $('#carac').html(resp.responseJSON.caracteristicas);
		        $('#real').html(resp.responseJSON.realizacion);
		        $('#mat').html(resp.responseJSON.materia_id);
		        $('#cdo').html(resp.responseJSON.codigoactividad);
		        
		      }


		    });

		  });

		  $('a#crearR').on('click', function(e){

		    e.preventDefault();
		    var form = $('#formR');
		    var route = form.attr('action');
		    var metodo = form.attr('method');

		    var d = $('input#porcentajeD').val();
		    var p = $('input#actividadP').val();
		    var t = $('input#total').val();
		    var numeroR = $('input#numeroR').val();

		    $.ajax({

		      url: route,
		      headers: { 'X-CSFR-TOKEN': token},
		      type: metodo,
		      data: form.serialize(),

		      success:function(resp){

		        $('#nameR').val(" ");
		        $('#descripcionR').val(" ");
		        $('#total').val(" ");
		        var name = resp.name;

		        alertify.alert('La rubrica '+name+' ha sido creada correctamente');

		             var rubricas = [resp];
		             var contador = rubricas.length;
		             var rubricas2 = $('input#numeroR').val();
		             var porcentajeD = $('input#porcentajeD').val();

		             
		          if(numeroR == false)
		          {

		               var total = $('input#numeroR').val(contador);

		          }else{

		              var newR = $('input#numeroR').val();
		              var suma = parseFloat(newR) + parseFloat(contador);
		              var resultadoF = $('input#numeroR').val(suma);
		              
		          }

		          if(rubricas2 >=4 )
		          {

		              $('#crearR').removeClass('btn btn-primary');
		              $('#crearR').hide();
		              $('#cancelar').show();

		          }else if(rubricas2 >=2 ){

		            $('#crearR').show();
		            $('#crearR').addClass('btn btn-primary');
		            $('#cancelar').show();

		          }

		          if(d == false)
		          {
		             var r = parseFloat(p) - parseFloat(t);
		             var resultado = $('input#porcentajeD').val(r);
		          }else{

		              var resta = parseFloat(d) - parseFloat(t);
		              $('input#porcentajeD').empty();
		              var save = $('input#porcentajeD').val(resta); 
		          }


		         if (resta == 0) {

		         	 $('#crearR').hide();
		         	 $('#cancelar').show();
   					 alertify.alert(" Si el porcentaje disponible de la actividad es 0 la creacion de rubricas se desabilitara."); 
				}
 

		      },

		      error:function(resp){

		        if(resp == "timeout")
		        {
		          alertify.alert('Tienes problemas con el internet por favor intentalo de nuevo.');
		        }

		            $('#nombre').html(resp.responseJSON.name);
		            $('#descripcion').html(resp.responseJSON.descripcion);
		            $('#prcT').html(resp.responseJSON.total);

		       
		      
		      }

		    });

		  });

		    $('#cancelar').on('click', function(e){

		      e.preventDefault();

		        $('#nameR').val(" ");
		        $('#descripcionR').val(" ");
		        $('#total').val(" ");
		        $('#porcentajeD').val(" ");

    });


		function listAct(btn){

			var id = btn.value;
			var link = $('#port').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			var tablaActividad = $('#tablaActividad');

			$.get(route, function(resp){

				$('#listAct').show();
				$('#listUnidades').hide();


				if(resp.total >= 1)
         {  

            tablaActividad.html(" ");
            $(resp.data).each(function(key, value){

              tablaActividad.append("<tr><td>"+value.actividad+"</td><td><button class='btn btn-primary' value="+value.id+" data-toggle='modal' data-target='#materialA' OnClick='verArchivos(this);'><i class='fa fa-file-archive-o'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#editarA' value="+value.id+"  OnClick='editar(this);'><i class='fa fa-calendar'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#notaAct' OnClick='notaAct(this);' value="+value.id+"><i class='fa fa-file-excel-o'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#Mapoyo' value="+value.id+"  OnClick='fileApoyo(this);'><i class='fa fa-folder'></i></td><td><button class='btn btn-primary'value="+value.id+"  OnClick='actividadPdf(this);'><i class='fa fa-file-word-o'></i></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='listRubricas(this);'><i class='fa fa-search'></i></button></td><td><button class='btn btn-danger' value="+value.id+"  OnClick='borrarActividad(this);'><i class='fa fa-eraser'></i></button></td></tr>");

            });
         }else{

            tablaActividad.html(" ");
            $('div#listAct').hide();
            $('div#listUnidades').show();
            alertify.alert("Esta unidad no tiene actividades");
          
         }

			});

		}


		function listRubricas(btn){

			var id = btn.value;
			var link = $('#listRubrica').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			var tablaRubricas = $('#tablaRubrica');
			$('#actividadIdE').val(id);

			$.get(route, function(resp){

				$('#listAct').hide();
				$('#listRub').show();
				
				tablaRubricas.html(" ");

				$(resp).each(function(key, value){

					tablaRubricas.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' data-toggle='modal' data-target='#modalRubricasEdit' value="+value.id+" OnClick='editRubricas(this);'><i class='fa fa-calendar'></i></button></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarRubrica(this);'><i class='fa fa-eraser'></i></button></td></tr>");

				});


			});

		}

		function editRubricas(btn){

			var id = btn.value;
			var link = $('#EDR').attr('href');
			var route = link.split('%7Bid%7D').join(id);

			$.get(route, function(resp){

				$('#nameRE').val(resp.name);
				$('#descripcionRE').val(resp.descripcion);
				$('#totalR').val(resp.total);
				$('#rubrica_id').val(resp.id);

			});

		}

		$('#edrubrica').on('click', function(e){

			e.preventDefault();

			var id = $('#rubrica_id').val();
			var form = $('#formRE');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bid%7D').join(id);

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert(" La rubrica ha sido editada.");
					$('#listAct').show();
					$('#listRub').hide();


				}

			});

		});


		function borrarRubrica(btn){

			var id = btn.value;
			var link = $('#deleteRubrica').attr('href');
			var route = link.split('%7Bid%7D').join(id);

			$.get(route, function(resp){

				$('#listRub').hide();
				$('#listAct').show();

				alertify.alert(" La rubrica ha sido borrada");

			});
		}


		function borrarActividad(btn){

			var id = btn.value;
			var form = $('#deleteActividad').attr('href');
			var route = form.split('%7Bid%7D').join(id);
			var tablaActividad = $('#tablaActividad');
			
			$.get(route, function(resp){

				$('div#listAct').hide();
				$('div#listUnidades').show();
				alertify.alert(' La actividad ha sido borrada correctamente.');


			});

		}

		function actividadPdf(btn){

			var id = btn.value;
			var link = $('#actPdf').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			window.open(route);
		}


		function verArchivos(btn){

        var materialRoute = $('#materialRoute').attr('href');
        var route = materialRoute.split('%7Bid%7D').join(btn.value);
        var tablaMaterial = $('#tablaMaterial');

        $.get(route, function(resp){

            if(!resp.length == 0)
            {

              tablaMaterial.html(" ");
              $(resp).each(function(key, value){

                var filename = value.filename;
                var cadena = filename.split(' ').join('%20');
                tablaMaterial.append("<tr><td>"+value.filename+"</td><td><button class='btn btn-primary' value="+cadena+"  OnClick='descargar(this);'><i class='fa fa-download'></i></button></td><td><button class='btn btn-primary' value="+cadena+" data-dismiss='modal'  OnClick='borrarMaterial(this);'><i class='fa fa-eraser'></i></button></td></tr>")

            });

            }else{

                tablaMaterial.html(" ");
                alertify.alert('Esta actividad no tiene un Material de apoyo');
            }

        });

      }


      function borrarMaterial(btn){

      	var filename = btn.value;
      	var link = $('#borrarM').attr('href');
      	var route = link.split('%7Bfilename%7D').join(filename);
      	var tablaMaterial = $('#tablaMaterial');

      	$.get(route, function(resp){

      		tablaMaterial.html(" ");
      		alertify.alert('El material ha sido borrado correctamente.');

      	});

      }


      
    function archivo(btn){

      var descargar = $('#descargarRoute').attr('href');
      var route = descargar.split('%7Bfilename%7D').join(btn.value);
      window.open(route);
      
    }

      function descargar(btn){

          var apoyo = $('#apoyoRoute').attr('href');
          var route = apoyo.split('%7Bfilename%7D').join(btn.value);
          window.open(route);
          
      }


      function notaAct(btn){

          var notaAct = $('#tablaNota');
          var clotutores = $('#clotutores').attr('href');
          var route = clotutores.split('%7Bid%7D').join(btn.value);

          $.get(route, function(resp){

              var calId = resp.id;
              notaAct.html(" ");

              $(resp.user).each(function(key, value){

                 notaAct.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' data-dismiss='modal' value="+calId+" OnClick='cal(this);'><i class='fa fa-folder'></i></button></td></tr>");  

              });

               

          });
      }

       function cal(btn){

          var nto = $('#ntoAct').attr('href');
          var route = nto.split('%7Bid%7D').join(btn.value);

          $.get(route, function(resp){

            var notasRubricas = $('#notasRubricas');
            $('div#listAct').hide();
            $('div#notasRubricas').show();

            $(resp.calAlum).each(function(key, value){


              notasRubricas.append("<tr><td>"+value.rubrica+": </td><td>"+value.nota+"</td></tr>");


            });

            $(resp.calificacion).each(function(key, value){

              notasRubricas.append("<tr><td><strong>Promedio: </strong>"+value.promedio+"</td></tr>");

            });


          });
      }



      function editar(btn){

          var id = btn.value;
          var ruta = $('#editarRoute').attr('href');
          var route = ruta.split('%7Bprofesor%7D').join(id);

          $.get(route, function(resp){

            $(resp.actividad).each(function(key, value){

              $('#cogEdit').val(value.cognoscitivo);
              $('#actEdit').val(value.actividad);
              $('#descEdit').val(value.descripcion);
              $('#objEdit').val(value.estrategia);
              $('#valEdit').val(value.valoractividad);
              $('#unEdit').val(value.unnidad);
              $('#evEdit').val(value.evidencia);
              $('#carcEdit').val(value.caracteristicas);
              $('#reaEdit').val(value.realizacion);
              $('#codiEdit').val(value.codigoactividad);
              $('#fechEdit').val(value.fecha);
              $('#fechfEdit').val(value.fechaF);
              $('#actID').val(value.id);
              $('#unID').val(value.unidad_id);  


            });

            $(resp.rubricas).each(function(key, value){

              var div = $('#liR');
              var objeto = value;
              $('#liR li').remove().empty();

              $.each(objeto, function(i, value){

                div.append("<li>"+value+"</li>");

              });
        
            });

            $(resp.materia).each(function(key, value){

              $('#nameMateria').val(value.name);

            });

          });

      }

      $('#editActividad').on('click', function(e){

              e.preventDefault();

             var form = $('#form-edit');
             var metodo = form.attr('method');
             var id = $('#actID').val();
             var ruta = form.attr('action');
             var route = ruta.split('%7Bprofesor%7D').join(id);
             $.ajax({

                  url: route,
                  headers: { 'X-CSFR-TOKEN': token},
                  type: metodo,
                  data: form.serialize(),

                  success:function(resp){

                      alertify.alert('La actividad ha sido activada/editada correctamente.');

                  },

                  error:function(resp){

                      if(resp == 'timeout')
                      {
                        alertify.alert('Tienes problemas con tu internet por favor intenta de nuevo.');
                      }else{

                          alertify.alert('Rellena todos los campos solicitados para poder actividar/editar una actividad.');
                      }

                      if(resp == 'error')
                      {

                      	alertify.alert('Error al eitar la actividad por favor intentelo de nuevo.');
                      }

                  }


             });

            });

		
			function fileApoyo(btn){

				var id = btn.value;
				var actividadId = $('#apoyo_id').val(id);
				var link = $('#apolloRoute').attr('href');
				var route = link.split('%7Bid%7D').join(id);


				$.get(route, function(resp){

					$('#userApoyo_id').val(resp.id);
					$('#AuthUserApoyo').val(resp.name);

				});

			}

			
</script>