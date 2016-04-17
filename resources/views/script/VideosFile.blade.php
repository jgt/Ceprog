<script>
	
	$('#Vimg').on('click', function(e){

		e.preventDefault();

		$form = $('#my-dropzone');

		videosFile($form);
	});

	function videosFile($form){

		$('.progress-bar').removeClass('progress-bar-success').removeClass('progress-bar-danger').html(" ");

		var id = $('#viduni').val();
		var form = $('#my-dropzone');
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

		$('#cancelVideo').on('click', function(){

			request.abort();

			$('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-success').html('el archivo se cancelo.');
			
		});
	}
</script>