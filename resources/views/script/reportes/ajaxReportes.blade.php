<script>
	
	$(document).on('ready', function(){

		$('#reportesCarrera').on('click', function(e){

			e.preventDefault();
			
			$('div#act').hide();
			$('div#listAct').hide();
		    $('div#examen').hide();
		    $('div#listExamen').hide();
		    $('div#calAct').hide();
		    $('div#planeacionC').hide();
		    $('div#listSubtemas').hide();
		    $('#createVideos').hide();
			$('div#listAct').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#calAct').hide();
			$('div#notasRubricas').hide();
			$('#listRub').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('div#listUnidades').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').show();
			$('#plcList').hide();
			$('#admPlc').hide();
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