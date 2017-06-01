<script>
	
	$(document).on('ready', function(){

		$('a#almEva').on('click', function(e){

			e.preventDefault();

			$('#evaListAlm').fadeIn();
			$('#tbMateriaDoc').hide();
			$('#preForo').hide();
			$('#chatForo').hide();
			$('#listPersonal').hide();
			$('#alumnosListUser').hide();
			$('#prflistTuto').hide();
			$('div#act').hide();
			$('div#listAct').hide();
			$('div#examen').fadeOut();
			$('div#listExamen').hide();
			$('div#calAct').hide();
			$('div#notasRubricas').hide();
			$('div#planeacionC').fadeOut();
			$('div#listSubtemas').hide();
			$('#createVideos').hide();
			$('#Almact').hide();
			$('#AlmUni').hide();
			$('div#vizuaUnidad').hide();
			$('div#VunidadE').hide();
			$('#listRub').hide();
			$('div#listUnidades').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#reportes').hide();
			$('#froadm').hide();
			$('#listRub').hide();
			$('#vizuaUnidad').hide();
			$('#LexamenMaestro').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#mtaList').hide();
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

			var route = $(this).attr('href');
			listar(route);

		});

		$('#almNextQuiz').on('click', function(e){

			e.preventDefault();
			nextQuestion();

		});

		$('#almEndQuiz').on('click', function(e){

			e.preventDefault();
			$('#quizEvalm').modal('hide');

		});

		function listar(route)
		{	
			var tabla = $('#tablaEvaalm');

			$.get(route, function(resp){

				tabla.html(' ');

				$(resp).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

		            if(now >= startDate &&  now <= endDate)
		            {

		              tabla.append("<tr><td>"+value.name+"</td><td><strong>Activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='realizarEva(this)'><i class='fa fa-pencil-square-o'></i></td></tr>");

		            }else{
		              
		              tabla.append("<tr><td>"+value.name+"</td><td><strong>No activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><strong>No disponible</strong></td></tr>");

		            }


				});


			});
		}

	});

	function realizarEva(btn)
	{
		var id = btn.value;
		var route = 'realizarEva/'+id;
		var divPreg = $('#almPregQuiz');
        var ulQuiz = $('#almQuizResp');
		$('#quizEvalm').modal('show');

		$.get(route, function(resp){

          divPreg.html(" ");
          ulQuiz.html(" ");
  
          if(resp.pregunta.length == 0)
          {
          	
            alertify.alert("Ya tienes una nota en este examen.");
            $('#quizEvalm').modal('hide');

          }else{

          	  $('#almNextQuiz').show();
        	  $('#almEndQuiz').hide();
              $(resp.pregunta).each(function(key, preg){

              var id = $('#almEvaId').val(preg.evadig_id);
              var preguntaId = $('#almPregId').val(preg.id);

              if(preg.imagen)
              {

              	divPreg.append("<h1>"+preg.area.name+"</h1><li>"+preg.contador+"<p>"+preg.contenido+"</p><img class='img-responsive' alt='Responsive image' src='/diagnostico/"+preg.imagen+"'></li>");

              }else{

              	divPreg.append("<h1>"+preg.area.name+"</h1><li><p>"+preg.contenido+"</p></li>");
              }

              
              $(preg.posible_resp).each(function(key, respu){

                ulQuiz.append("<li><input type='radio' name='respeva' value="+respu.id+">"+respu.name+"</li>");
              });

            });

          }
    
        });
	}

	function nextQuestion()
	{
		var id = $('#almEvaId').val();
		var form = $('#almEvadiag');
		var metodo = form.attr('method');
		var route = 'nxtQuestion/'+id;
		$('#almNextQuiz').attr('disabled', true);
        $.blockUI();

        $.ajax({

        	url:route,
        	type:metodo,
        	data:form.serialize(),

        	success:function(resp)
        	{
        		
        		$.unblockUI();
        		
        		//siguente pregunta
        		var idExa = $('#almEvaId').val();
        		var route = 'realizarEva/'+idExa;
				var divPreg = $('#almPregQuiz');
		        var ulQuiz = $('#almQuizResp');

		        $.get(route, function(resp){

		          divPreg.html(" ");
		          ulQuiz.html(" ");
		          $('#almNextQuiz').attr('disabled', false);
		  
		          if(resp.pregunta.length == 0)
		          {
		          	
		            alertify.alert("Examen finalizado");
		            $('#almNextQuiz').hide();
                  	$('#almEndQuiz').show();

		          }else{

		              $(resp.pregunta).each(function(key, preg){

		              var id = $('#almEvaId').val(preg.evadig_id);
		              var preguntaId = $('#almPregId').val(preg.id);
		              		
		              if(preg.imagen)
		              {
		              	divPreg.append("<h1>"+preg.area.name+"</h1><li>"+preg.contador+"<p>"+preg.contenido+"</p><img class='img-responsive' alt='Responsive image' src='/diagnostico/"+preg.imagen+"'></li>");

		              }else{

		              	divPreg.append("<h1>"+preg.area.name+"</h1><li><p>"+preg.contenido+"</p></li>");
		              }

		              
		              $(preg.posible_resp).each(function(key, respu){

		                ulQuiz.append("<li><input type='radio' name='respeva' value="+respu.id+">"+respu.name+"</li>");
		              });

		            });

		          }
		    
		        });


        	},

        	error:function()
        	{
        		alertify.alert('Error al procesar la solicitud, por favor intentalo de nuevo');
        		$('#almNextQuiz').attr('disabled', false);
        		$.unblockUI();
        	}


        });
	}



</script>