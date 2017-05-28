<script>
	
	$(document).on('ready', function(){

		$('#almEva').on('click', function(e){

			e.preventDefault();

			$('#evaListAlm').fadeIn();
			var route = $(this).attr('href');
			listar(route);

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

              $(resp.pregunta).each(function(key, preg){

              var preguntaId = $('#pregId').val(preg.id);

              divPreg.append("<li><p>"+preg.contenido+"</p></li>");

              $(preg.respuestas).each(function(key, respu){

                ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");
              });
            });
          }
    
        });
	}

</script>