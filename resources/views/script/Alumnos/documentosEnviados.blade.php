<script>
	
	$(document).on('ready', function(){

		$('a#fileSend').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			var tablaFile = $('#tablaFile');
			$.blockUI();
			
			$.get(route, function(resp){

				tablaFile.html(" ");

				if(resp.length == 0)
				{
					$.unblockUI();
					alertify.alert("Aun no has respondido esta actividad.");

				}else{

					$(resp).each(function(key, value){

						var now = new Date();
			            var startDate = new Date(value.fecha);
			            var endDate = new Date(value.fechaF);

			            if(now >= startDate &&  now <= endDate)
			            {
			            	$.unblockUI();
			            	$('#modalFile').modal('show');
			            	$(value.fileentries).each(function(key, file){

			            		var filename = file.original_filename;
								var cadena = filename.split(' ').join('%20');
								tablaFile.append("<tr><td>"+file.filename+"</td><td><button class='btn btn-danger' value="+file.id+" OnClick='fileDelete(this);'><i class='fa fa-eraser'></i></button></td></tr>");

			            	});

			            }else{

			            	$('#modalFile').modal('hide');
			            	$.unblockUI();
			            	alertify.alert("Fecha de activacion <strong>"+value.fecha+"</strong> Fecha limite de entrega <strong>"+value.fechaF+"</strong>");
			            }

					});
				}
			});

		});

	});

	function fileDelete(btn){

		var id = btn.value;
		var route = '/borrar/'+id;
		var tablaFile = $('#tablaFile');
		$.blockUI();
		
		$.get(route, function(resp){

			tablaFile.html(" ");
			$('#modalFile').modal('hide');
			alertify.alert(' El archivo se ha borrado.');
			$.unblockUI();

		});

	}

</script>