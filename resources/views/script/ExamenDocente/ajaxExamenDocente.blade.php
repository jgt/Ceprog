<script>

$(document).on('ready', function(){

	var sum=0;

	$('#porcenDocente').val($('#valorDocente').val());

    $('#valorDocente').keyup(function(){
      if(!isNaN(parseFloat($(this).val())))
      {
        $('#porcenDocente').val(parseFloat(sum)+parseFloat($(this).val()));
      }else{

        $('#porcenDocente').val(sum);
      }
            
    });

	function rango()
	{
		var route = $('#rangoPregunta').attr('href');
		var rango = $("#rangoId");
						
		$.get(route, function(ran){

			rango.html(" ");

			$(ran).each(function(key, value){

				if(value.menor == 1)
				{
					rango.append("<option value="+value.id+">"+value.name+"</option>");
				}

			});

		});
	}

	function rangoSuccess()
	{
		var route = $('#rangoPregunta').attr('href');
		var rango = $("#rangoId");
		var cont = $('#npDocente').val();
						
		$.get(route, function(ran){

			$(ran).each(function(key, value){

				if(value.menor <= cont)
				{
					rango.html(" ");
					rango.append("<option value="+value.id+">"+value.name+"</option>");
				}
				
			});

		});
	}

	$('#evaDocente').on('click', function(e){

		e.preventDefault();

		$('#mtaList').hide();
      $('#crr').hide();
      $('#semm').hide();
      $('#preForo').hide();
      $('#examen').hide();
      $('div#planeacionC').hide();
      $('#pregunta').hide();
      $('#chatForo').hide();
      $('#froadm').hide();
      $('#alumnosListUser').hide();
      $('div#preguntaExmamen').hide();
      $('#listExamenDocente').hide();
      $('#act').hide();
      $('div#listAct').hide();
      $('div#user').hide();
      $('div#listExamen').hide();
      $('div#calAct').hide();
      $('div#listUnidades').hide();
      $('div#listSubtemas').hide();
      $('#createVideos').hide();
      $('div#vizuaUnidad').hide();
      $('div#VunidadE').hide();
      $('#listRub').hide();
      $('#prflistTuto').hide();
      $('#adminPlan').hide();
      $('#admRole').hide();
      $('div#user').hide();
      $('#admForo').hide();
      $('#listTut').hide();
      $('#listPersonal').hide();
      $('#reportes').hide();
      $('#crr').hide();
	  $('#crtExamenDocente').show();

		var route = $(this).attr('href');
		var materias = $('#selectMatdocente');
		var catedratico = $('#docente');

		$('#docente').change(function(){

				materias.html(" ");
			});

		$.get(route, function(resp){

			catedratico.html(" ");
		
			$(resp).each(function(key, user){

				$(user.roles).each(function(key, role){

					if(role.name == "profesor")
					{	

						catedratico.append("<option value="+user.id+">"+user.name+"</option>");
					}
					
				});
					$(user.materias).each(function(key, mat){

						$('#docente').change(function(){

							var userId = this.value;
							var materia = mat.pivot.user_id;
							var carreraId = mat.semestre.carrera.id
							var semestre = mat.semestre.carrera_id;

							if(userId == materia && semestre == carreraId)
							{	

								materias.append("<option value="+mat.id+">"+mat.name+"</option>");
								$('#carreraDocente').val(mat.semestre.carrera.name);
							}

						});

					});
			});

		});

	});

	$('#exaDocrt').on('click', function(e){

		e.preventDefault();

		var form = $('#evaDoc');
		var metodo = form.attr('method');
		var route = form.attr('action');
		var valor = $('#valorDocente').val('0.5');
		var numeracion = $('#contadorDocente').val('1');

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				$('#preguntaDocente').show();
				$('#crtExamenDocente').hide();
				$('#porcenDocente').val(parseInt(0));
				$('#npDocente').val(" ");
            	$('#enunciadoDocente').val(" "); 
				alertify.alert("El examen ha sido creado correctamente.");
				var examenId = $('#exaDoccenteId').val(resp.id);
				rango();

			},

			error:function(error, $request){

				alertify.alert("Error");

			}


		});
	});

	$('#pregDocente').on('click', function(e){

		e.preventDefault();

		var form = $('#formPregDocente');
		var metodo = form.attr('method');
		var route = form.attr('action');
		var np = $('#npDocente').val();
		var valor = $('#valorDocente').val();
		var porcen = $('#porcenDocente').val();
		var numeracion = $('#contadorDocente').val();

		if(porcen <= 20)
		{

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				sum = sum+parseFloat($('#valorDocente').val());
	            $('#porcenDocente').val(sum);
	            $('#valorDocente').val(" ");
	            $('#prtIddocente').val(resp.id);
				alertify.alert("La preunta fue creada correctamente.");
				$('#modalRespuestasDocente').modal('show');

				//conteo de preguntas.
				var preguntas = [resp];
				var contador = preguntas.length;
				var num = parseFloat(numeracion) + parseFloat(contador);
				$('#contadorDocente').val(num);
	   
	            if(np == false)
	            {
	              var total = $('#npDocente').val(contador);

	            }else{

	                var nuevoNp = $('#npDocente').val();
	                var suma = parseFloat(nuevoNp) + parseFloat(contador);
	                var resultado = $('#npDocente').val(suma);
	            }

	            //limite de rango
	            rangoSuccess();

			},

			error:function(error, request){

				 if(resp == 'timeout')
		            {
		              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
		            }else{

		              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
		              
		            }


			}

		});

		}else{

			$('#endQuestionDocente').show();
			$('#pregDocente').hide();
			alertify.alert("El limite de porcentaje de este examen se ha agotado.");

			$('#endQuestionDocente').on('click', function(e){

	          e.preventDefault();
	          $('#preguntaDocente').hide();

	        });

		}

	});

	$('#createRespdocente').on('click', function(e){

		e.preventDefault();

		var form = $('#formRespDocente');
		var metodo = form.attr('method');
		var route = form.attr('action');

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert("Las respuestas han sido creadas.");
				$('#modalRespuestasDocente').modal('hide');
				$('#enunciadoDocente').val(" ");
				$('input#respContenido').val(" ");

			},

			error:function(error, request){

				if(error == 'timeout')
		            {
		              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
		            }else{

		              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
		              
		            }


			}

		});


	});

});


</script>