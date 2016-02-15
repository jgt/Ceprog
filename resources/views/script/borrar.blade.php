<script>

	$('document').ready(function(){

		$('.btn-danger').click(function(e){

			e.preventDefault();

			var row = $(this).parents('tr');
			var id = row.data('id');
			var form = $('#form-delete');
			var url = form.attr('action').replace(':USER_ID', id);
			var data = form.serialize();

			row.fadeOut();

			$.post(url, data, function(result){

				alert(result);

			});

		});

	});


	</script>