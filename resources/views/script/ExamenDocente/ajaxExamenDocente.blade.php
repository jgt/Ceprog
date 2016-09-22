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

			rango.html(" ");
			
			$(ran).each(function(key, value){
	
					rango.append("<option value="+value.id+">"+value.name+"</option>");
			
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
      $('#listExamenAdmin').hide();
	  $('#crtExamenDocente').show();

		var route = $(this).attr('href');
		var materias = $('#selectMatdocente');

		$.get(route, function(resp){
			
			$(resp).each(function(key, mat){

				materias.append("<option value="+mat.id+">"+mat.name+"</option>");
				
			});
		});

	});

	$('#exaDocrt').on('click', function(e){

		e.preventDefault();

		var form = $('#evaDoc');
		var metodo = form.attr('method');
		var route = form.attr('action');
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
		$.blockUI();

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){
				
				$.unblockUI();
				sum = sum+parseFloat($('#valorDocente').val());
	            $('#porcenDocente').val(sum);
	            $('#valorDocente').val(" ");
	            $('#prtIddocente').val(resp.id);
	            $('#prtDosOpciones').val(resp.id);
				alertify.alert("La preunta fue creada correctamente.");

				if(resp.opciones == 0)
				{	
					$('#modalDosOpciones').modal('show');
					
				}else{

					$('#modalRespuestasDocente').modal('show');
				}

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

					$.unblockUI();
				 if(resp == 'timeout')
		            {
		              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
		            }else{

		              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
		              
		            }


			}

		});
	});

	$('#createRespdocente').on('click', function(e){

		e.preventDefault();

		var form = $('#formRespDocente');
		var metodo = form.attr('method');
		var route = form.attr('action');
		$.blockUI();

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				$.unblockUI();
				alertify.alert("Las respuestas han sido creadas.");
				$('#modalRespuestasDocente').modal('hide');
				$('#enunciadoDocente').val(" ");
				$('input#respContenido').val(" ");

			},

			error:function(error, request){

				$.unblockUI();
				if(error == 'timeout')
		            {
		              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
		            }else{

		              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
		              
		            }


			}

		});


	});

	$('#createDosOpciones').on('click', function(e){

		e.preventDefault();

		var form = $('#formDosOpciones');
		var metodo = form.attr('method');
		var route = form.attr('action');
		$.blockUI();

		$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				$.unblockUI();
				alertify.alert("Las respuestas han sido creadas.");
				$('#modalDosOpciones').modal('hide');
				$('#enunciadoDocente').val(" ");
				$('input#respDosOpciones').val(" ");

			},

			error:function(error, request){

				$.unblockUI();
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