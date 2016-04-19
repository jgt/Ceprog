<script>
	
	$(document).on('ready', function(){

		$('#reportesCarrera').on('click', function(e){

			e.preventDefault();
			
			$('div#act').addClass('alert');
			$('div#listAct').addClass('alert');
		    $('div#examen').addClass('alert');
		    $('div#listExamen').addClass('alert');
		    $('div#calAct').addClass('alert');
		    $('div#planeacionC').addClass('alert');
		    $('div#listSubtemas').addClass('alert');
		    $('#createVideos').addClass('alert');
			$('div#listAct').addClass('alert');
			$('#Almact').addClass('alert');
			$('div#vizuaUnidad').addClass('alert');
			$('div#AlmUni').addClass('alert');
			$('div#VunidadE').addClass('alert');
			$('div#calAct').addClass('alert');
			$('div#notasRubricas').addClass('alert');
			$('#listRub').addClass('alert');
			$('#listTutAlm').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');
			$('div#listUnidades').addClass('alert');
			$('#listPersonal').addClass('alert');
			$('#prflistTuto').addClass('alert');
			$('#alumnosListUser').addClass('alert');
			$('#reportes').removeClass('alert');
			var route = $('#reportesCarrera').attr('href');
			var tablaReporte = $('#tablaReportes');

			$.get(route, function(resp){

				tablaReporte.html(" ");

				$(resp).each(function(key, value){

					tablaReporte.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='carrerasPdf(this);' value="+value.id+"><i class='fa fa-file-word-o' aria-hidden='true'></i></button></td></tr>");

				});
			});

		});

	});

	function carrerasPdf(btn){

		var id = btn.value;
		var link = $('#pdfCar').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}

</script>