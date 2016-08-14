<script>
		
		$(document).on('ready', function(){

			$('a#prfTutorial').on('click', function(e){

				e.preventDefault();
				
				$('#preForo').hide();
				$('#chatForo').hide();
				$('#listPersonal').hide();
				$('#alumnosListUser').hide();
				$('#prflistTuto').show();
				$('div#act').hide();
				$('div#listAct').hide();
			    $('div#examen').hide();
			    $('div#listExamen').hide();
			    $('div#calAct').hide();
			    $('div#notasRubricas').hide();
			    $('div#planeacionC').hide();
			    $('div#listSubtemas').hide();
			    $('#createVideos').hide();
			    $('#Almact').hide();
			    $('#AlmUni').hide();
			    $('div#vizuaUnidad').hide();
			    $('div#VunidadE').hide();
			    $('#listRub').hide();
			    $('div#listUnidades').hide();
			    $('#listTutAlm').hide();
			    $('#adminPlan').hide();
				$('#admRole').hide();
				$('div#user').hide();
				$('#admForo').hide();
				$('#listTut').hide();
				$('#reportes').hide();
				$('#froadm').hide();
				$('#listRub').hide();
				$('#vizuaUnidad').hide();
				$('#LexamenMaestro').hide();
				$('#crr').hide();
				$('#semm').hide();
				$('#mtaList').hide();
				$('#crtExamenDocente').hide
				$('#listExamenDoc').hide();

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

				$('#preForo').hide();
				$('#chatForo').hide();
				$('#listPersonal').hide();
				$('#prflistTuto').hide();
				$('div#act').hide();
				$('div#listAct').hide();
			    $('div#examen').hide();
			    $('div#listExamen').hide();
			    $('div#calAct').hide();
			    $('div#notasRubricas').hide();
			    $('div#planeacionC').hide();
			    $('div#listSubtemas').hide();
			    $('#createVideos').hide();
			    $('#Almact').hide();
			    $('#AlmUni').hide();
			    $('div#vizuaUnidad').hide();
			    $('div#VunidadE').hide();
			    $('#listRub').hide();
			    $('div#listUnidades').hide();
			    $('#listTutAlm').show();
			    $('#reportes').hide();
			    $('#crr').hide();	
				$('#semm').hide();
				$('#mtaList').hide();
			    $('#froadm').hide();
			    $('#listExamenDocente').hide();
			    $('#crtExamenDocente').hide();
			    $('#listExamenDoc').hide();

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