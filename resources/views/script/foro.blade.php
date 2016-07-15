<script>

	
	var cl = new CanvasLoader('canvasloader-container');
		cl.show(); // Hidden by default
						
		// This bit is only for positioning - not necessary
		var loaderObj = document.getElementById("canvasLoader");
		loaderObj.style.position = "absolute";
		loaderObj.style["top"] = cl.getDiameter() * -0.3 - "px";
		loaderObj.style["left"] = cl.getDiameter() * 10 + "px";  

		$('div#canvasloader-container').attr('class', 'alert'); 

	$(document).on('ready', function(){

		foroCeprog();
	});

	var foroCeprog = function(){

		$('#comentar').on('click', function(e){

			e.preventDefault();

			var form = $('#formulario');
			var action = form.attr('action');
			var metodo = form.attr('method');
		
			$.ajax({

				beforeSend: function(){

					$('div#canvasloader-container').removeClass('alert'); 
				},

				type: metodo,
				url: action,
				data: form.serialize(),

				success: function(resp){

					$('#publicacion').val("");
					$('div#canvasloader-container').attr('class', 'alert'); 
					if(resp)
					{
						$('#nuevoC').attr('class', 'alert');
						$('#comentario').html(resp);
					}
					else
					{
						alertify.alert('Lo sentimos tu comentario no fue publicado por problemas de conexion');
					}

				},

				error: function(error){

					if(error == "timeout")
					{
						alertify.alert('Tienes problemas de conexion!!');
						$('div#canvasloader-container').attr('class', 'alert'); 

					}
					else
					{
						alertify.alert('Tienes errores en el formulario o el campo enlace tiene una url invalida.');
						$('div#canvasloader-container').attr('class', 'alert'); 
					}

				}


			});

		});
	}

</script>