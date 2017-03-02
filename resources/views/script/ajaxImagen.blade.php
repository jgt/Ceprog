<script>
	
	$(document).on('ready', function(){

		$('#clickEdit').on('click', function(e){

			e.preventDefault();
			var route = $('#edtAlm').attr('href');
		
			$.get(route, function(resp){

				$('#nameUpdateAlm').val(resp.name);
				$('#cuentaUpdateAlm').val(resp.cuenta);
				$('#clickAuth').val(resp.id);
				$("input[type='password']").val('');

			});


		});

	});


</script>