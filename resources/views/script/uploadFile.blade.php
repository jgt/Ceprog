<script>
	
	$(document).on('submit', 'form', function(e){

		e.preventDefault();

		$form = $(this);

		uploadFile($form);
	});

	function uploadFile($form){

		$form.find('.progress-bar').removeClass('progress-bar-success').removeClass('progress-bar-danger'); 

		var id = $('#act_id').val();
		var form = $('#respAlm');
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split("%7Bid%7D").join(id);

		var formdata = new FormData($form[0]);

		var request = new XMLHttpRequest();

		request.upload.addEventListener('progress', function(e){

			var percent = Math.round(e.loaded/e.total * 100);

			$form.find('.progress-bar').width(percent +'%').html(percent +'%');

			console.log(percent);

		});

		request.addEventListener('load', function(e){

			$form.find('.progress-bar').addClass('progress-bar-success').html('el archivo subio correctamente...');

		});

		request.open(metodo, route);
		request.send(formdata);

		$form.on('click', 'cancel', function(){

			request.abort();

			$form.find('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-success').html('el archivo se cancelo.');
			
		});
	}
</script>