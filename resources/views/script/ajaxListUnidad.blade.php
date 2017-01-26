<script>
	
	$(document).on('ready', function(){
		
		$('a#menuListUser').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#listTutAlm').hide();
			$('#preForo').hide();
			$('#froadm').hide();
			$('#chatForo').hide();
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
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#crr').hide();
			$('#alumnosListUser').show();
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

			var route = $(this).attr('href');
			var tablaAlumnos = $('#tablaAlumnosList');
	
			$.get(route, function(resp){

				tablaAlumnos.html(" ");

				$(resp).each(function(key, value){
					$('#prbPrueba').val(value.id);
					$(value.semestre).each(function(key, sem){

						$(sem.carrera).each(function(key, carrera){

						$(sem.users).each(function(key, user){

							$('#mierda').val(user.cuenta);
							if(sem.users.length > 0){

							$(user.roles).each(function(key, role){

								if(role.name == "alumno")
										{

											$('#almSearch').on('click', function(e){

												e.preventDefault();

												var alumno = $('#nombreUser').val();

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

								if(file.user_id == userId)
								{
									 var filename = file.filename;
		              				 var cadena = filename.split(' ').join('%20');
									tablaAct.append("<tr><td>"+file.filename+"</td><td>"+act.actividad+"</td><td>"+uni.unidad+"</td><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='descActUser(this);' value="+cadena+"><i class='fa fa-download' aria-hidden='true'></i></button></td></tr>");
								}

							});
						});

					});
				});
						
			});

		}

		function descActUser(btn){

			var name = btn.value;
			var link = $('#download').attr('href');
			var route = link.split('%7Bfilename%7D').join(name);
			window.open(route);

		}

	
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
		  	


		//function para traer los datos de la rubricas incompletas.

	
    function archivo(btn){

      var descargar = $('#descargarRoute').attr('href');
      var route = descargar.split('%7Bfilename%7D').join(btn.value);
      window.open(route);
      
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

			
</script>