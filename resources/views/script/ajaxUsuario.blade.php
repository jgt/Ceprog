<script>


		var cl = new CanvasLoader('canvasloader-container');
		cl.show(); // Hidden by default
						
		// This bit is only for positioning - not necessary
		var loaderObj = document.getElementById("canvasLoader");
		loaderObj.style.position = "absolute";
		loaderObj.style["top"] = cl.getDiameter() * -2.2 + "px";
		loaderObj.style["left"] = cl.getDiameter() * 4 + "px";  

		$('div#canvasloader-container').attr('class', 'alert'); 

		$(document).on('ready', function(){

			$('a#Cusuario').on('click', function(e){

		        e.preventDefault();

		      $('div#user').removeClass('alert');
		      $('div#listaP').addClass('alert');
		      $('div#act').addClass('alert');
		      $('div#examen').addClass('alert')
		      $('div#listExamen').addClass('alert');
		      $('div#calAct').addClass('alert');
		      $('div#planeacionC').addClass('alert');
		      $('div#editUnidad').addClass('alert');
		      $('div#listSubtemas').addClass('alert');
		       $('#createVideos').addClass('alert');
		       $('div#vizuaUnidad').addClass('alert');
		       $('#listRub').addClass('alert');
		       $('div#admRole').addClass('alert');
		       $('#listTut').addClass('alert');
			$('#adminPlan').addClass('alert');
			      
	      }); 

			$('#submit').on('click', function(e){

				e.preventDefault();

				var form = $('#form-create');
				var metodo = form.attr('method');
				var action = form.attr('action');

				
				$.ajax({

					beforeSend: function(){

						
				  		$('div#canvasloader-container').removeClass('alert');
						
					},
					
					url: action,
					type: metodo,
					data: form.serialize(),

					success: function(resp){

						alertify.alert('Usuario creado correctamente');
						$('input#form').val("");
						$('div#canvasloader-container').attr('class', 'alert');

					},

					error: function(request, error){

						if(error == "timeout"){

							alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
							$('div#canvasloader-container').attr('class', 'alert');
						}else{

							alertify.alert('Tienes errores en el formulario de usurio puede ser que te falte un campo o el usuario ya existe.');
							$('div#canvasloader-container').attr('class', 'alert');
						}
					}

				})

				
			});

		});

	</script>