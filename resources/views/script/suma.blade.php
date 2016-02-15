<script type="text/javascript">

	$(document).ready(function(){


		$("#nota").click(function(){
	
	var total = 0;
	$('.rubrica').each(function(index){
		total += parseFloat($(this).val());
	});
	$("#total").val(total);
		
});
		
		

	});

	
</script>