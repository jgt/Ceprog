<script>
	
	$(document).on('ready', function(){

		$('a#pqtCal').on('click', function(e){

			e.preventDefault();

			$('#claPaquete').fadeIn();
			$('#vizuaActividad').fadeOut();
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
			$('#listPersonal').hide();
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
			$('#vizuaPaquete').fadeOut();
			$('div#preguntaExmamen').hide();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();

			var route = $(this).attr('href');
			var tabla = $('#tablaClaPaquete');

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp).each(function(key, value){

					$(value.unidad.materia.semestre.users).each(function(key, user){

								$(user.roles).each(function(key, rol){

									if(rol.name == "alumno")
									{
										$('#bucAlm').on('click', function(e){

												e.preventDefault();

												var alumno = $('#nombreUserAlm').val();

												if(user.name == alumno)
												{	
													tabla.html(" ");

													var newRow = "<tr><td>"+user.name+"</td><td><button class='btn btn-primary' value="+value.id+" id="+user.id+" OnClick='calPaquete(this);'</button><i class='fa fa-pencil-square-o'></i></td><td>Sin calificar</td><td><button class='btn btn-primary' id="+value.unidad.materia_id+" value="+user.id+" OnClick='respPdf(this);' </button><i class='fa fa-pencil-square-o'></i></td><td><button type='button' value="+user.id+" OnClick='examen(this)' id="+value.unidad.materia.id+" class='btn btn-primary'><i class='fa fa-file-pdf-o aria-hidden='true'></i></button></td></tr>";

													$(user.calificaciones).each(function(key, nota){
														
											        	if(user.id == nota.user_id && value.id == nota.actividad_id) 
											        	{
											            	newRow = "<tr><td>"+user.name+"</td><td>Calificado</td><td><button type='button' OnClick='consulUser(this)' class='btn btn-primary' id="+value.id+" value="+user.id+"><i class='fa fa-folder-open' aria-hidden='true'></i></button></td><td><button class='btn btn-primary' id="+value.unidad.materia_id+" value="+user.id+" OnClick='respPdf(this);' </button><i class='fa fa-pencil-square-o'></i></td><td><button type='button' value="+user.id+" OnClick='examen(this)' id="+value.unidad.materia.id+" class='btn btn-primary'><i class='fa fa-file-pdf-o aria-hidden='true'></i></button></td></tr>";
											        	}

											    	});

													tabla.append(newRow);
												}
												
										});

										var newRow = "<tr><td>"+user.name+"</td><td><button class='btn btn-primary' value="+value.id+" id="+user.id+" OnClick='calPaquete(this);'</button><i class='fa fa-pencil-square-o'></i></td><td>Sin calificar</td><td><button class='btn btn-primary' id="+value.unidad.materia_id+" value="+user.id+" OnClick='respPdf(this);' </button><i class='fa fa-pencil-square-o'></i></td><td><button type='button' value="+user.id+" OnClick='examen(this)' id="+value.unidad.materia.id+" class='btn btn-primary'><i class='fa fa-file-pdf-o aria-hidden='true'></i></button></td></tr>";

										$(user.calificaciones).each(function(key, nota){

								        	if(user.id == nota.user_id && value.id == nota.actividad_id) 
								        	{
								            	newRow = "<tr><td>"+user.name+"</td><td>Calificado</td><td><button type='button' OnClick='consulUser(this)' class='btn btn-primary' id="+value.id+" value="+user.id+"><i class='fa fa-folder-open' aria-hidden='true'></i></button></td><td><button class='btn btn-primary' id="+value.unidad.materia_id+" value="+user.id+" OnClick='respPdf(this);' </button><i class='fa fa-pencil-square-o'></i></td><td><button type='button' value="+user.id+" OnClick='examen(this)' id="+value.unidad.materia.id+" class='btn btn-primary'><i class='fa fa-file-pdf-o aria-hidden='true'></i></button></td></tr>";
								        	}

								    	});

										tabla.append(newRow);
									}

								});

					});

				});

			});


		});

		$('#consulBack').on('click', function(e){

			$('#consUser').fadeOut();
			$('#claPaquete').fadeIn();
			e.preventDefault();

		});

		$('#subCal').on('click', function(e){

				e.preventDefault();

				var id = $('#aid').val();
				var form = $('#form-calificacion');
				var metodo = form.attr('method');
				var route = '/nota/'+id;
				$(this).attr('disabled', true);
				$.blockUI();
				CKEDITOR.instances.calComentario.updateElement();

				$.ajax({

					url:route,
					type:metodo,
					data:form.serialize(),

					success:function(resp)
					{
						$('#subCal').attr('disabled', false);
						$('#subCal').hide();
						$('#subEnd').show();
						$('#sumar').hide();
						$.unblockUI();
						alertify.alert("La nota se ha guardado correctamente.");

					},

					error:function(error, request)
					{
						$('#subCal').attr('disabled', false);
						$.unblockUI();
						alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
					}
				})

			});

		$('#editConsul').on('click', function(e){

			e.preventDefault();

			var id = $('#consulIdcal').val();
			var form = $('#formConsul');
			var metodo = form.attr('method');
			var route = '/editComentario/'+id;
			$(this).attr('disabled', true);
			$.blockUI();
			CKEDITOR.instances.cmoConsultar.updateElement();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$('#editConsul').attr('disabled', false);
					$.unblockUI();
					alertify.alert("El comentario ha sido actualizado.");
				},

				error:function()
				{
					$('#editConsul').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				}

			});

		});

	});

	function consulUser(btn)
	{	
		$('#claPaquete').fadeOut();
		$('#consUser').fadeIn();
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
		$('#listPersonal').hide();
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
		$('#vizuaPaquete').fadeOut();
		$('div#preguntaExmamen').hide();
		$('#calAct').fadeOut();
		$('#vizuaActividad').fadeOut();
		$('#claPaquete').fadeOut();
		$('#ltsMatexamen').fadeOut();
		$('#vizuaNota').fadeOut();
		$('#crtExaDiag').fadeOut();
		$('#evaList').fadeOut();
		$('#preguntaDiagnostico').fadeOut();	
		$('#listEva').fadeOut();
		$('#evaListAlm').fadeOut();

		var idUser = btn.value;
		var idAct = btn.id;
		var route = '/consultarUser/'+idUser+'/'+idAct;
		var ul = $('#rubConsultar');
		var file = $('#fileConsultar');

		$.get(route, function(resp){

			ul.html(" ");
			file.html(" ");

			$(resp.user).each(function(key, value){

				$('#userConsultar').val(value.name);
				$('#consulIduser').val(value.id);

				$(value.calificaciones).each(function(key, cal){

					$('#proConsultar').val(cal.promedio);
					$('#consulIdcal').val(cal.id);
					CKEDITOR.instances.cmoConsultar.setData(cal.comentario);

					$(cal.rubricas).each(function(key, rub){

						$('#actConsultar').val(rub.actividad.actividad);
						$('#consulIdact').val(rub.actividad.id);
						ul.append("<li>"+rub.name+"("+rub.pivot.nota+")</li>");

					});
				});

				$(resp.archivos).each(function(key, arch){
					
					$(arch.fileentry).each(function(key, flt){

						file.append("<ul><li><a target='_blank' href='respuestas/"+flt.original_filename+"' >"+flt.original_filename+"</a></li></ul>");

					});

				});

			});

		});
	}

	function calPaquete(btn)
	{
		$('#calAct').fadeIn();
		$('#claPaquete').fadeOut();
		$('#vizuaActividad').fadeOut();
		$('#vizuaPaquete').fadeOut();
		$('#vizuaNota').fadeOut();
		$('#crtExaDiag').fadeOut();
		$('#evaList').fadeOut();
		$('#preguntaDiagnostico').fadeOut();	
		$('#listEva').fadeOut();
		$('#subCal').show();
		$('#subEnd').hide();
		$('#sumar').show();
		$('#ntoFinal').val(" ");
		var userId = btn.id;
		var id = btn.value;
		var route = '/calificacion/'+id+'/'+userId;
		var ul = $('#ulR');
		var archivo = $('#archUser');

		$.get(route, function(resp){

			ul.html(" ");
			archivo.html(" ");

			$(resp.actividad).each(function(key, value){

				$('#nameAct').val(value.actividad);
				$('#aid').val(value.id);		

			});

			$(resp.user).each(function(key, user){

				$('#nameAuth').val(user.name);
				$('#uid').val(user.id);

				$(user.fileentry).each(function(key, file){

					archivo.append("<ul><li><a target='_blank' href='respuestas/"+file.original_filename+"'>"+file.original_filename+"</a></li></ul>");

				});
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

			$('#subEnd').on('click', function(e){

			   	e.preventDefault();
			    $('#calAct').hide();

			});
		
	}

	function respPdf(btn)
	{
		var id = btn.value;
		var idMateria = btn.id;
		var route = '/reporteUser/'+id+'/'+idMateria;
		$.blockUI();
		
		$.get(route, function(resp){

			window.open(route);
			$.unblockUI();

		})

		.fail(function(){

			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo");
			$.unblockUI();
		});
	}

	function examen(btn)
	{
		var user = btn.value;
		var materia = btn.id;
		var route = '/exmMaestro/'+materia;
		var tabla = $('#tablaExamen');

		$.get(route, function(resp){

			tabla.html(" ");
			$('#modalExm').modal('show');

			$(resp).each(function(key, value){

				$(value.examenes).each(function(key, exa){

					var newRow = "<tr><td>"+exa.modulo+"</td><td>Sin nota</td></tr>";

						$(exa.resultados).each(function(key, resul){

							if(resul.examen_id == exa.id && resul.user_id == btn.value)
							{

								newRow = "<tr><td>"+exa.modulo+"</td><td><button type='button' OnClick='crrExm(this)' id="+user+" value="+exa.id+" class='btn btn-primary'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button></td></tr>";
							}


						});

					tabla.append(newRow);

				});

			});

		});
	}

	function crrExm(btn)
	{
		var user = btn.id;
		var examen = btn.value;
		var route = '/ntoExam/'+user+'/'+examen;
		$.blockUI();

		$.get(route, function(resp){

			window.open(route);
			$.unblockUI();

		}).fail(function(resp){

			$.unblockUI();
			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");

		});
	}

</script>