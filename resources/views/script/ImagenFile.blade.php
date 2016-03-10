<script>
	
	$(document).on('submit', 'form', function(e){

		e.preventDefault();

		$form = $(this);

		imagenFile($form);
	});

	function imagenFile($form){

		$('.progress-bar').removeClass('progress-bar-success').removeClass('progress-bar-danger').html(" ");

		var id = $('#subimgId').val();
		var form = $('#imgSub');
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split("%7Bid%7D").join(id);

		var formdata = new FormData($form[0]);

		var request = new XMLHttpRequest();

		request.upload.addEventListener('progress', function(e){

			var percent = Math.round(e.loaded/e.total * 100);

			
			$('.progress-bar').css('width', percent);

			console.log(percent);

		});

		request.addEventListener('load', function(e){

			$('.progress-bar').addClass('progress-bar-success').html('el archivo subio correctamente...');

		});

		request.open(metodo, route);
		request.send(formdata);

		$('#cancelImg').on('click', function(){

			request.abort();

			$('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-success').html('el archivo se cancelo.');
			
		});
	}
</script>