<script>
		
		$(document).on('ready', function(){

			$('a#prfTutorial').on('click', function(e){

				e.preventDefault();

				$('#prflistTuto').removeClass('alert');
				$('div#act').addClass('alert');
				$('div#listAct').addClass('alert');
			    $('div#examen').addClass('alert');
			    $('div#listExamen').addClass('alert');
			    $('div#calAct').addClass('alert');
			    $('div#notasRubricas').addClass('alert');
			    $('div#planeacionC').addClass('alert');
			    $('div#listSubtemas').addClass('alert');
			    $('#createVideos').addClass('alert');
			    $('#Almact').addClass('alert');
			    $('#AlmUni').addClass('alert');
			    $('div#vizuaUnidad').addClass('alert');
			    $('div#VunidadE').addClass('alert');
			    $('#listRub').addClass('alert');
			    $('div#listUnidades').addClass('alert');
			    $('#listTutAlm').addClass('alert');
			    	$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');

			    var route = $('#allTutorialPrf').attr('href');
			    var tutorial = $('#tablaTutorialPrf');

			    $.get(route, function(resp){

			    	tutorial.html(" ");
			    	console.log(resp);
			    	$(resp).each(function(key, value){

			    		$(value.roles).each(function(key, op){

			    			if(op.slug == 'prf')
			    			{

			    				var filename = value.original_filename;
				                var cadena = filename.split(' ').join('%20');
								tutorial.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' OnClick='descargarTutoPrf(this);' value="+cadena+"><i class='fa fa-download'></i></button></td><td><button class='btn btn-primary' OnClick='tutorialOnlinePrf(this);' data-toggle='modal' data-target='#tutoPrf' value="+value.id+"><i class='fa fa-eye'></i></button></td><tr>");
			    			}

			    		});
					
				});


			    });

			});




			$('a#almTutorial').on('click', function(e){

				e.preventDefault();



				$('#prflistTuto').addClass('alert');
				$('div#act').addClass('alert');
				$('div#listAct').addClass('alert');
			    $('div#examen').addClass('alert');
			    $('div#listExamen').addClass('alert');
			    $('div#calAct').addClass('alert');
			    $('div#notasRubricas').addClass('alert');
			    $('div#planeacionC').addClass('alert');
			    $('div#listSubtemas').addClass('alert');
			    $('#createVideos').addClass('alert');
			    $('#Almact').addClass('alert');
			    $('#AlmUni').addClass('alert');
			    $('div#vizuaUnidad').addClass('alert');
			    $('div#VunidadE').addClass('alert');
			    $('#listRub').addClass('alert');
			    $('div#listUnidades').addClass('alert');
			    $('#listTutAlm').removeClass('alert');

			    var route = $('#allTutorialAlm').attr('href');
			    var tutorialAlm = $('#tablaTutorialAlm');

			    $.get(route, function(resp){


			    	tutorialAlm.html(" ");

			    	$(resp).each(function(key, value){

			    		$(value.roles).each(function(key, op){
			    			
			    			if(op.slug == 'alm')
			    			{

			    				var filename = value.original_filename;
				                var cadena = filename.split(' ').join('%20');
								tutorialAlm.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' OnClick='descargarTutoAlm(this);' value="+cadena+"><i class='fa fa-download'></i></button></td><td><button class='btn btn-primary' OnClick='tutorialOnlineAlm(this);' data-toggle='modal' data-target='#tutoAlm' value="+value.id+"><i class='fa fa-eye'></i></button></td><tr>");

			    			}

			    		});

					
					});


			    });

			});


		});

		function descargarTutoAlm(btn){

		var filename = btn.value;
		var link = $('#dwTutorialAlm').attr('href');
		var route = link.split('%7BfileName%7D').join(filename);
		window.open(route);
	}


		function tutorialOnlineAlm(btn){

		var id = btn.value;
		var link = $('#allVideosAlm').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var div = $('#divTutoAlm');

		$.get(route, function(resp){

			div.html(" ");

			div.append("<video width='530'  height='300' id='fgt'  controls='controls'><source src='/tutoriales/"+resp.original_filename+"' type='video/webm'/><source src='/tutoriales/"+resp.original_filename+"' type='video/ogg'/><source src='/tutoriales/"+resp.original_filename+"' type='video/mp4'/></video>");

		});
		

	}

	$('#outVideoAlm').on('click', function(e){

		var div = $('#divTutoAlm');

		div.html(" ");

	});





		function descargarTutoPrf(btn){

		var filename = btn.value;
		var link = $('#dwTutorial').attr('href');
		var route = link.split('%7BfileName%7D').join(filename);
		window.open(route);
	}


		function tutorialOnlinePrf(btn){

		var id = btn.value;
		var link = $('#allVideos').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var div = $('#divTutoPrf');

		$.get(route, function(resp){

			div.html(" ");

			div.append("<video width='530'  height='300' id='fgt'  controls='controls'><source src='/tutoriales/"+resp.original_filename+"' type='video/webm'/><source src='/tutoriales/"+resp.original_filename+"' type='video/ogg'/><source src='/tutoriales/"+resp.original_filename+"' type='video/mp4'/></video>");

		});
		

	}

	$('#outVideoPrf').on('click', function(e){

		var div = $('#divTutoPrf');

		div.html(" ");

	});





</script>