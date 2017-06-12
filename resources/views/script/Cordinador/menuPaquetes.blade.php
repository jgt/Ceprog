<script>
	$(document).on('ready', function(){

		$('a#herramientas').on('click', function(e){

			e.preventDefault();

			var route = $(this).attr('href');
			var ul = $('ul#listUni');

			$.get(route, function(resp){

				ul.html(" ");
		
				$(resp).each(function(key, value){

					ul.append("<li class='treeview'><a href='#' id='bookId' value="+value.id+"><i class='fa fa-book' aria-hidden='true'></i>"+value.unidad+"</a></li>");

				});

				$('a#bookId').on('click', function(e){

					e.preventDefault();
					$('#tbMateriaDoc').hide();
					$('#crtExamenDocente').hide();
					$('#mtaList').hide();
					$('#crr').hide();
					$('#semm').hide();
					$('#listExamenDocente').hide();
					$('#preForo').hide();
				    $('div#examen').fadeOut();
				    $('div#listExamen').hide();
				    $('div#planeacionC').fadeOut();
				    $('#createVideos').hide();
					$('#Almact').hide();
					$('div#vizuaUnidad').hide();
					$('div#AlmUni').hide();
					$('div#VunidadE').hide();
					$('div#notasRubricas').hide();
					$('#listRub').hide();
					$('#listTutAlm').hide();
					$('#adminPlan').hide();
					$('#admRole').hide();
					$('div#user').hide();
					$('#admForo').hide();
					$('#listTut').hide();
					$('#listPersonal').hide();
					$('#prflistTuto').hide();
					$('#alumnosListUser').hide();
					$('#reportes').hide();
					$('#crr').hide();
					$('#froadm').hide();
					$('#tutoriales').hide();
					$('#listExamenDoc').hide();
					$('#listRec').hide();
					$('#listRecMa').hide();
					$('#plcList').hide();
					$('#admPlc').hide();
					$('#plcAlm').hide();
					$('#act').fadeOut();
					$('#crtSub').fadeOut();
					$('#editUnidad').fadeIn();
					$('#videoUnidad').fadeOut();
					$('#listSubtemas').fadeOut();
					$('#listAct').fadeOut();
					$('#calAct').fadeOut();
					$('div#preguntaExmamen').hide();
					$('#vizuaPaquete').fadeOut();
					$('#calAct').fadeOut();
					$('#vizuaActividad').fadeOut();
					$('#claPaquete').fadeOut();
					$('#consUser').fadeOut();
					$('#ltsMatexamen').fadeOut();
					$('#vizuaNota').fadeOut();
					$('#crtExaDiag').fadeOut();
					$('#evaList').fadeOut();
					$('#preguntaDiagnostico').fadeOut();	
					$('#listEva').fadeOut();
					$('#evaListAlm').fadeOut();
					$('#reporteDiag').hide();
					$('#reporteCarr').fadeOut();

					var id = $(this).attr('value');
					var menu = $('#menUnidad');
					menu.html(" ");
					var route = '/editplan/'+id;
					
					$.get(route, function(resp){

						$('#menUnidad').fadeIn();
						$('#namUnidad').val(resp.unidad);
						$('#editasignatura').val(resp.materia);
						$('#editsemes').val(resp.semestre);
						$('#editseriacion').val(resp.seriacion).attr('disabled', true);
						$('#editclave').val(resp.clave).attr('disabled', true);
						$('#editasesor').val(resp.asesor);
						$('#editunidad').val(resp.unidad).attr('disabled', true);
						$('#edittema').val(resp.tema).attr('disabled', true);
						$('#editactividadP').val(resp.actividadP).attr('disabled', true);
						$('#editfechaU').val(resp.fecha).attr('disabled', true);
						$('#editmateria').val(resp.materia_id).attr('disabled', true);
						$('#editUs').val(resp.user_id).attr('disabled', true);
						$('#unidadId').val(resp.id).attr('disabled', true);
						CKEDITOR.instances.editobjetivo.setData(resp.objetivo);
						CKEDITOR.instances.editactividadP.setData(resp.editactividadP);

						menu.append("<tr><td><button value="+resp.id+" OnClick='activar(this)'>Activar Edicion</button></td><td><button type='button' value="+resp.id+" OnClick='subtema(this)'>Crear Subtemas</button></td><td><button type='button' value="+resp.id+" OnClick='actividad(this)'>Crear Actividad</button></td><td><button type='button' value="+resp.id+" OnClick='video(this)'>Subir Video</button></td><td><button type='button' value="+resp.id+" OnClick='pdf(this)'>Ver Pdf</button></td><td><button type='button' value="+resp.id+" OnClick='listSubtema(this)'>Lista subtemas</button></td><td><button type='button' value="+resp.id+" OnClick='listAct(this)'>Lista actividad</button></td><td><button type='button' value="+resp.id+" OnClick='listVideo(this)'>Lista videos</button></td></tr>");

					}).fail(function(){

						alertify.alert("Error al cargar los datos, por favor recargue la pagina.");
					});		
				});
			});
		});

		$('#editU').on('click', function(e){

			e.preventDefault();
			var id = $('#unidadId').val();
			var form = $('#edit-formplan');
			var metodo = form.attr('method');
			var route = '/updateplan/'+id;
			$(this).attr('disabled', true);
			$.blockUI();
			CKEDITOR.instances.editobjetivo.updateElement();
			CKEDITOR.instances.editactividadP.updateElement();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$('#editU').hide();
					$('#editseriacion').attr('disabled', true);
					$('#editclave').attr('disabled', true);
					$('#editobjetivo').attr('disabled', true);
					$('#editunidad').attr('disabled', true);
					$('#edittema').attr('disabled', true);
					$('#editactividadP').attr('disabled', true);
					$('#editfechaU').attr('disabled', true);
					$('#editmateria').attr('disabled', true);
					$('#editUs').attr('disabled', true);
					$('#unidadId').attr('disabled', true);
					$('#editU').attr('disabled', false);
					$.unblockUI();
					alertify.alert("La unidad <strong>"+resp.unidad+"</strong> ha sido editada correctamente.");
				},

				error:function(error, request)
				{
					$('#editU').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				}

			});

		});

		$('#crsubt').on('click', function(e){

			e.preventDefault();
			var form = $('#create-formSubt');
			var metodo = form.attr('method');
			var route = '/storeSubtemas';
			$(this).attr('disabled', true);
			$.blockUI();
			CKEDITOR.instances.createDesc.updateElement();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$('#crsubt').attr('disabled', false);
					$.unblockUI();
					alertify.alert("El subtema <strong>"+resp.subtemas+"</strong> ha sido creado");
				},

				error:function(error, request)
				{
					$('#crsubt').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				}

			});

		});

		$('#crtAct').on('click', function(e){

			e.preventDefault();
			var form = $('#prf');
			var metodo = form.attr('method');
			var route = '/storeActividad';
			$(this).attr('disabled', true);
			$.blockUI();
			CKEDITOR.instances.estrategia.updateElement();
			CKEDITOR.instances.descripAct.updateElement();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$('#modalRubricas').modal('show');
					$('#cognoscitivo').val(" ");
					$('#actividad').val(" ");
					$('#descripAct').val(" ");
					$('#estrategia').val(" ");
					$('#valoractividad').val(" ");
					$('#evidencia').val(" ");
					$('#caracteristicas').val(" ");
					$('#realizacion').val(" ");
					$('#codigoactividad').val(" ");
					$('#numeroR').val(" ");
					$('#actividadId').val(resp.id);
					$('#actividadP').val(resp.valoractividad)
					$('#crtAct').attr('disabled', false);

					$.unblockUI();
					alertify.alert("La actividad <strong>"+resp.actividad+"</strong> ha sido creada correctamente.");
				},

				error:function(error, request)
				{
					$('#crtAct').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
				}

			});

		});

		$('#crearR').on('click', function(e){

			e.preventDefault();

			var form = $('#formR');
			var metodo = form.attr('method');
			var route = form.attr('action');
			var d = $('input#porcentajeD').val();
		    var p = $('input#actividadP').val();
		    var t = $('input#total').val();
		    var numeroR = $('input#numeroR').val();
		    $(this).attr('disabled', true);
		    $.blockUI();

			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					 var rubricas = [resp];
		             var contador = rubricas.length;
		             var rubricas2 = $('input#numeroR').val();
		             var porcentajeD = $('input#porcentajeD').val();
		             $('#crearR').attr('disabled', false)
					 $('#nameR').val(" ");
			         $('#descripcionR').val(" ");
			         $('#total').val(" ");
			         $.unblockUI();
			         alertify.alert("La rubrica <strong>"+resp.name+"</strong> ha sido creada correctamente.");

			        if(numeroR == false)
		          	{
		               var total = $('input#numeroR').val(contador);

		          	}else{

		              var newR = $('input#numeroR').val();
		              var suma = parseFloat(newR) + parseFloat(contador);
		              var resultadoF = $('input#numeroR').val(suma);
		              
		          	}

		          	if(rubricas2 >=4 )
		          	{
		              $('#crearR').removeClass('btn btn-primary');
		              $('#crearR').hide();
		              $('#cancelar').show();

		          	}else if(rubricas2 >=2 ){

			            $('#crearR').show();
			            $('#crearR').addClass('btn btn-primary');
			            $('#cancelar').show();

		          	}

		          	 if(d == false)
		          	{
		             var r = parseFloat(p) - parseFloat(t);
		             var resultado = $('input#porcentajeD').val(r);
		          	}else{

		              var resta = parseFloat(d) - parseFloat(t);
		              $('input#porcentajeD').empty();
		              var save = $('input#porcentajeD').val(resta); 
		          	}

		          	 if (resta == 0) {

		         	 $('#crearR').hide();
		         	 $('#cancelar').show();
   					 alertify.alert(" Si el porcentaje disponible de la actividad es 0 la creacion de rubricas se desabilitara."); 
					}

				},

				error:function(error, request)
				{
					$('#crearR').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud. por favor intentalo de nuevo.");
				}	

			});
		});

		$('#Vimg').on('click', function(e){

			e.preventDefault();

			var id = $('#viduni').val();
			var form = $('#my-videoUnidad');
			var metodo = form.attr('method');
			var route = '/storeSubir/'+id;
			var formData = new FormData($('#my-videoUnidad')[0]);
			$(this).attr('disabled', true);
			$.blockUI();

			$.ajax({

				url: route,
				type: metodo,
				headers: { 'X-CSFR-TOKEN': token},
				data: formData,
				contentType: false,
		        processData: false,
		        cache: false,

		         beforeSend:function(){

		        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   

		        },

				success:function(resp)
				{	
					$('#Vimg').attr('disabled', false);
					$.unblockUI();
					alertify.alert("El video ha sido guardado correctamente.");	
				},

				error:function(error, request)
				{
					$('#Vimg').attr('disabled', false);
					alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		        	$.unblockUI();
				}

			});

		});
	});

	$('#editS').on('click', function(e){

			e.preventDefault();

			var id = $('#Idsubtemas').val();
			var form = $('#edit-formSubt');
			var metodo = form.attr('method');
			var route = '/updateSubtemas/'+id;
			$(this).attr('disabled', true);
			$.blockUI();
			CKEDITOR.instances.descSubedit.updateElement();
			
			$.ajax({

				url:route,
				type:metodo,
				data:form.serialize(),

				success:function(resp)
				{
					$('#editS').attr('disabled', false);
					$.unblockUI();
					alertify.alert("El subtema <strong>"+resp.subtemas+"</strong> ha sido editado correctamente.");
				},

				error:function(error, request)
				{
					$('#editS').attr('disabled', false);
					$.unblockUI();
					alertify.alert("Error al procesar la solicitud. por favor intentalo de nuevo.");
				}

			});

	});

	$('#fimg').on('click', function(e){

			e.preventDefault();

			var id = $('#subimgId').val();
			var form = $('#imgSub');
			var metodo = form.attr('method');
			var route = '/imagenSubtema/'+id;
			var formData = new FormData($('#imgSub')[0]);
			$(this).attr('disabled', true);

			$.ajax({

				url:route,
				type:metodo,
				data:formData,
				contentType: false,
		        processData: false,
		        cache: false,

		        beforeSend:function(){

		        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   

		        },

		        success:function(resp)
		        {
		        	$('#imagenSubtema').modal('hide');
		        	$('#fimg').attr('disabled', false);
		        	alertify.alert("La imagen  ha sido guardado correctamente.");
		        	$.unblockUI();
		        },

		        error:function(error, request)
		        {
		        	$('#fimg').attr('disabled', false);
		        	alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		        	$.unblockUI();
		        }

			});

	});

	$('#editActividad').on('click', function(e){

             e.preventDefault();
             var form = $('#form-edit');
             var metodo = form.attr('method');
             var id = $('#actID').val();
             var route = '/updateActividad/'+id
             $(this).attr('disabled', true);
             $.blockUI();
             CKEDITOR.instances.descEdit.updateElement();
             CKEDITOR.instances.objEdit.updateElement();


             $.ajax({

                  url: route,
                  type: metodo,
                  data: form.serialize(),

                  success:function(resp)
                  {	
                  	  $('#editActividad').attr('disabled', false);
                  	  $.unblockUI();
                      alertify.alert('La actividad ha sido activada/editada correctamente.');
                  },

                  error:function(error, request)
                  {
                      $('#editActividad').attr('disabled', false);
                  	  $.unblockUI();
                  	  alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
                  }
             });

     });

	$('#apoy').on('click', function(e)
	{
		e.preventDefault();
		var id = $('#apoyo_id').val();
		var form = $('#apoyoM_id');
		var metodo = form.attr('method');
		var route = '/material/'+id
		var formData = new FormData($('#apoyoM_id')[0]);

		$.ajax({

		 	url: route,
			type: metodo,
			data: formData,
			contentType: false,
		    processData: false,
		    cache: false,

		        beforeSend:function()
		        {
		        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   
		        },
		       
		        success:function(resp)
		        {
		        	 alertify.alert("El archivo  ha sido guardado correctamente.");
		        	 $.unblockUI();
		        },

		        error:function(error, request)
		        {
		        	alertify.alert("Error al procesar la solicitud.");
		        	$.unblockUI();	
		        }
		});
	});

	$('#crtR').on('click', function(e){

		  		e.preventDefault();

		  		var form = $('#formRu');
		  		var route = form.attr('action');
		  		var metodo = form.attr('method');
		  		var porcentajeD = $('#actD').val();
		  		var porcentaje = $('#actTotal').val();
		  	
		  		$.ajax({

		  			url: route,
			        type: metodo,
			        data: form.serialize(),

			        success:function(resp)
			        {
			        	alertify.alert("La rubrica ha sido creada correctamente.");
			        	$('#actTotal').val(" ");
			        	$('#actDesc').val(" ");
			        	$('#actRub').val(" ");
			        	$('#crtRubrica').modal('hide');

			        },

			        error:function(request, error)
			        {

			        	alertify.alert("Error en la solicitud.");
			        }

		  		});

		  	});

		function activar(btn)
		{
			var id = btn.value;
			$('#editU').show();
			$('#crtSub').fadeOut();
			$('#act').fadeOut();
			$('#editUnidad').fadeIn();
			$('#videoUnidad').fadeOut();
			$('#listSubtemas').fadeOut();
			$('#listAct').fadeOut();
			$('#calAct').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
			$('div#examen').fadeOut();
			$('div#listExamen').hide();
		    $('div#planeacionC').fadeOut();
		    $('#createVideos').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#notasRubricas').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#vizuaNota').fadeOut();
			$('div#preguntaExmamen').hide();
			$('#ltsMatexamen').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#editseriacion').attr('disabled', false);
			$('#editclave').attr('disabled', false);
			$('#editobjetivo').attr('disabled', false);
			$('#editunidad').attr('disabled', false);
			$('#edittema').attr('disabled', false);
			$('#editactividadP').attr('disabled', false);
			$('#editfechaU').attr('disabled', false);
			$('#editmateria').attr('disabled', false);
			$('#editUs').attr('disabled', false);
			$('#unidadId').attr('disabled', false);
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();

		}

		function subtema(btn)
		{
			var id = btn.value;
			$('#createSubt').val(id);
			$('#editUnidad').fadeOut();
			$('#crtSub').fadeIn();
			$('#act').fadeOut();
			$('#videoUnidad').fadeOut();
			$('#listSubtemas').fadeOut();
			$('#listAct').fadeOut();
			$('#calAct').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#planeacionC').fadeOut();
		    $('#createVideos').hide();
			$('div#listAct').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#notasRubricas').hide();
			$('#listRub').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('div#preguntaExmamen').hide();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();
		
		}

		function actividad(btn)
		{
			var id = btn.value;
			$('#unId').val(id);
			$('#act').fadeIn();
			$('#crtSub').fadeOut();
			$('#editUnidad').fadeOut();
			$('#videoUnidad').fadeOut();
			$('#listSubtemas').fadeOut();
			$('#listAct').fadeOut();
			$('#calAct').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#planeacionC').fadeOut();
		    $('#createVideos').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#notasRubricas').hide();
			$('#listRub').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('div#preguntaExmamen').hide();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();
		
		}

		function video(btn)
		{
			var id = btn.value;
			$('#viduni').val(id);
			$('#videoUnidad').fadeIn();
			$('#editUnidad').fadeOut();
			$('#act').fadeOut();
			$('#crtSub').fadeOut();
			$('#listSubtemas').fadeOut();
			$('#listAct').fadeOut();
			$('#calAct').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#planeacionC').fadeOut();
		    $('#createVideos').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#notasRubricas').hide();
			$('#listRub').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('div#preguntaExmamen').hide();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();
		}	

	function pdf(btn)
	{
		var id = btn.value;
		var route = '/pdf/'+id;
		
		$.get(route, function(){

			window.open(route);

		}).fail(function(){

			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		})
	}

		function listSubtema(btn)
		{
			var id = btn.value;
			var route = '/listSubtemas/'+id;
			var tabla = $('#tablaDataSubtemas');
			$('#listSubtemas').fadeIn();
			$('#videoUnidad').fadeOut();
			$('#editUnidad').fadeOut();
			$('#act').fadeOut();
			$('#crtSub').fadeOut();
			$('#listAct').fadeOut();
			$('#calAct').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#planeacionC').fadeOut();
		    $('#createVideos').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#notasRubricas').hide();
			$('#listRub').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('div#preguntaExmamen').hide();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp).each(function(key, value){

					tabla.append("<tr><td>"+value.subtemas+"</td><td><button type='button' class='btn btn-warning' OnClick='subtemaEdit(this)' value="+value.id+"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></td><td><button type='button' class='btn btn-primary' OnClick='imagen(this)' value="+value.id+"><i class='fa fa-cloud-upload' aria-hidden='true'></i></button></td><td><button type='button' class='btn btn-primary' OnClick='listImagen(this)' value="+value.id+"><i class='fa fa-picture-o' aria-hidden='true'></i></button></td><td><button type='button' class='btn btn-danger' OnClick='subtemaBorrar(this)' value="+value.id+"><i class='fa fa-eraser' aria-hidden='true'></i></button></td></tr>");

				});

			});
		}

	function subtemaEdit(btn)
	{
		var id = btn.value;
		var route = '/showSubtema/'+id;
		$('#editST').modal('show');

		$.get(route, function(resp){

			$(resp).each(function(key, value){

				$('#editsubId').val(value.unidad_id);
				$('#Idsubtemas').val(value.id);
				$('#editsubT').val(value.subtemas);
				CKEDITOR.instances.descSubedit.setData(value.descripcion);
			});

		});
	}

	function imagen(btn)
	{
		var id = btn.value;
		var route = '/showSubtema/'+id;
		$('#subimgId').val(id);
		$('#imagenSubtema').modal('show');
		
		$.get(route, function(resp){

			$('#namSubtema').val(resp.subtemas);

		});

	}

	function listImagen(btn)
	{
		var id = btn.value;
		$('#listImagenes').modal('show');
		var route = '/listImagenes/'+id;
		var img = $('#tablaImagenes');

		$.get(route, function(resp){

			img.html(" ");

			$(resp).each(function(key, value){

				img.append("<tr><td>"+value.filename+"</td><td><button class='btn btn-danger' value="+value.id+"  OnClick='borrarImg(this);'><i class='fa fa-eraser'></i></button></td></tr>");

			});

		});
	}

	function borrarImg(btn)
	{

		var id = btn.value;
		var route = '/borrarImg/'+id;

		$.get(route, function(resp){

			$('#listImagenes').modal('hide');
			alertify.alert("La imagen ha sido borrada correctamente.");

		}).fail(function(){

			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		});

	}

	function subtemaBorrar(btn)
	{
		var id = btn.value;
		var route = '/deleteSubtemas/'+id;

		$.get(route, function(resp){

			alertify.alert("El subtema ha sido borrado correctamente.");

		}).fail(function(resp){

			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");

		});
	}

	function listVideo(btn)
	{
		var id = btn.value;
		$('#videoListDocente').modal('show');
		var route = '/showVideos/'+id;
		var video = $('#tablaVideosListDocente');

		$.get(route, function(resp){

			video.html(" ");

			$(resp).each(function(key, value){

				video.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-danger' value="+value.id+"  OnClick='borrarVdo(this);'><i class='fa fa-eraser'></i></button></td></tr>")

			});
		});
	}

	function borrarVdo(btn)
	{
		var id = btn.value;
		var route = '/delete/'+id;

		$.get(route, function(resp){

			$('#videoListDocente').modal('hide');
			alertify.alert("El video ha sido borrado correctamente.");

		}).fail(function(resp){

			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
		});
	}	

		function listAct(btn)
		{	
			var id = btn.value;
			var route = '/portafolio/'+id;
			var tablaActividad = $('#tablaActividad');
			$('#videoUnidad').fadeOut();
			$('#editUnidad').fadeOut();
			$('#act').fadeOut();
			$('#crtSub').fadeOut();
			$('#listSubtemas').fadeOut();
			$('#calAct').fadeOut();
			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#listExamenDocente').hide();
			$('#preForo').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#planeacionC').fadeOut();
		    $('#createVideos').hide();
			$('#Almact').hide();
			$('div#vizuaUnidad').hide();
			$('div#AlmUni').hide();
			$('div#VunidadE').hide();
			$('div#notasRubricas').hide();
			$('#listRub').hide();
			$('#listTutAlm').hide();
			$('#adminPlan').hide();
			$('#admRole').hide();
			$('div#user').hide();
			$('#admForo').hide();
			$('#listTut').hide();
			$('#listPersonal').hide();
			$('#prflistTuto').hide();
			$('#alumnosListUser').hide();
			$('#reportes').hide();
			$('#crr').hide();
			$('#froadm').hide();
			$('#tutoriales').hide();
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('div#preguntaExmamen').hide();
			$('#vizuaPaquete').fadeOut();
			$('#calAct').fadeOut();
			$('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();

			$.get(route, function(resp){

				$('#listAct').fadeIn();
				if(resp.length >= 1)
	         	{  
		            tablaActividad.html(" ");

		            $(resp).each(function(key, value){

		              tablaActividad.append("<tr><td>"+value.actividad+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='verArchivos(this)'><i class='fa fa-file-archive-o'></i></button></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='editarAct(this);'><i class='fa fa-calendar'></i></button></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='fileApoyo(this);'><i class='fa fa-folder'></i></td><td><button class='btn btn-primary'value="+value.id+"  OnClick='actividadPdf(this)'><i class='fa fa-file-word-o'></i></td><td><button class='btn btn-primary' value="+value.id+"  OnClick='listRubricas(this);'><i class='fa fa-search'></i></button></td><td><button class='btn btn-primary' value="+value.id+" OnClick='crearRubricas(this)'><i class='fa fa-plus-circle' aria-hidden='true'></i></button></td><td><button class='btn btn-danger' value="+value.id+"  OnClick='borrarActividad(this)'><i class='fa fa-eraser'></i></button></td></tr>");
		            });

		         }else{
		            tablaActividad.html(" ");
		            $('div#listAct').fadeOut();
		            alertify.alert("Esta unidad no tiene actividades");
		          
		         }
			});
		}

	function verArchivos(btn){

        var id = btn.value
        var route = '/material/'+id
        var tablaMaterial = $('#tablaMaterial');

        $.get(route, function(resp){

            if(!resp.length == 0)
            {

              $('#materialA').modal('show');
              tablaMaterial.html(" ");
              $(resp).each(function(key, value){

                var filename = value.filename;
                var cadena = filename.split(' ').join('%20');
                tablaMaterial.append("<tr><td>"+value.filename+"</td><td><button class='btn btn-primary' value="+cadena+"  OnClick='descargar(this);'><i class='fa fa-download'></i></button></td><td><button class='btn btn-danger' value="+value.id+" data-dismiss='modal'  OnClick='borrarApoyo(this);'><i class='fa fa-eraser'></i></button></td></tr>")

            });

            }else{

                tablaMaterial.html(" ");
                $('#materialA').modal('hide');
                alertify.alert('Esta actividad no tiene un Material de apoyo');
            }

        });

      }

       function editarAct(btn){

          var id = btn.value;
          var route = '/actEdit/'+id;
      	 
      	  $.get(route, function(resp){

      	  	$('#editarA').modal('show');
      	  	$(resp.actividad).each(function(key, value){

              $('#cogEdit').val(value.cognoscitivo);
              $('#actEdit').val(value.actividad);
              $('#descEdit').val(value.descripcion);
              $('#objEdit').val(value.estrategia);
              $('#valEdit').val(value.valoractividad);
              $('#unEdit').val(value.unnidad);
              $('#evEdit').val(value.evidencia);
              $('#carcEdit').val(value.caracteristicas);
              $('#reaEdit').val(value.realizacion);
              $('#codiEdit').val(value.codigoactividad);
              $('#fechEdit').val(value.fecha);
              $('#fechfEdit').val(value.fechaF);
              $('#actID').val(value.id);
              $('#unID').val(value.unidad_id);  
              CKEDITOR.instances.descEdit.setData(value.descripcion);
			  CKEDITOR.instances.objEdit.setData(value.estrategia);
			  
            });

            $(resp.rubricas).each(function(key, value){

              var div = $('#liR');
              var objeto = value;
              $('#liR li').remove().empty();

              $.each(objeto, function(i, value){
                div.append("<li>"+value+"</li>");
              });
        
            });

            $(resp.materia).each(function(key, value){
              $('#nameMateria').val(value.name);
            });

          }).fail(function(resp){

          	$('#editarA').modal('hide');
          	alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
          });

      }

      function borrarApoyo(btn)
	  {
			var id = btn.value;
			var route = '/borrarM/'+id;
			console.log(route);
			
			$.get(route, function(){

				$('#materialA').modal('hide');
				alertify.alert("El archivo ha sido borrado correctamente.");

			}).fail(function(){

				alertify.alert("Error al procesar la solicitud.");
			});
	  }

	  function descargar(btn)
	  {

		var filename = btn.value;
		var route = '/fileentry/'+filename;
		window.open(route);
	
	  }

      function fileApoyo(btn)
      {	

      	var id = btn.value;
      	var route = '/apollo/'+id
      	$('#Mapoyo').modal('show');

      	$.get(route, function(resp){

			$(resp).each(function(key, value){

				$('#userApoyo_id').val(value.unidad.user_id);
				$('#AuthUserApoyo').val(value.unidad.asesor);
				$('#apoyo_id').val(value.id);

			});

		}).fail(function(resp)
		{

			$('#Mapoyo').modal('hide');
			alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");

		});

      }

      function actividadPdf(btn)
	  {
			var id = btn.value;
			var route = '/planpdf/'+id;
			
			$.get(route, function(resp){

				window.open(route);

			}).fail(function(resp){

				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo");

			});

	  }

	  function crearRubricas(btn)
	  {
		var id = btn.value;
		var route = '/showActividad/'+id;
		var sum = 0;
		$('#crtRubrica').modal('show');

		$.get(route, function(resp){

			$(resp).each(function(key, value){

				$('#acId').val(value.id);
				$('#actN').val(value.actividad);
				$('#actPr').val(value.valoractividad).prop('disabled', true);
				$('#actD').val(" ").prop('disabled', true);
				
				$(value.rubricas).each(function(key, rub){

					sum += parseFloat(rub.total);
					var resta = parseFloat(value.valoractividad) - parseFloat(sum);
					$('#actD').val(resta).prop('disabled', true);
			
					if(resta == 0)
					{	
						$('#crtR').hide();
						$('#salirR').show();

					}else{

						$('#crtR').show();
						$('#salirR').hide();
					}

					if(sum == value.valoractividad)
					{
						$('#crtRubrica').modal('hide');
						alertify.alert("Esta actividad tiene sus rubricas completas.");
					}

				});

			});

			}).fail(function(resp){

				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");

			});

	  }

		function listRubricas(btn)
		{
			var id = btn.value;
			var route = '/listrubrica/'+id
			var tablaRubricas = $('#tablaRubrica');
			
			$.get(route, function(resp){
				
				$('#listRub').modal('show');
				tablaRubricas.html(" ");

				$(resp).each(function(key, value){

					tablaRubricas.append("<tr><td>"+value.name+"</td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarRubrica(this);'><i class='fa fa-eraser'></i></button></td></tr>");
				});
			});
		}

		function borrarRubrica(btn)
		{
			var id = btn.value;
			var route = '/deleteRubrica/'+id;

			$.get(route, function(resp){

				$('#listRub').modal('hide');
				alertify.alert(" La rubrica ha sido borrada");

			}).fail(function(resp){

				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			});
		}

		function borrarActividad(btn)
		{
			var id = btn.value;
			var route = '/deleteActividad/'+id;
			
			$.get(route, function(resp){
				
				alertify.alert(' La actividad ha sido borrada correctamente.');

			}).fail(function(resp){


				alertify.alert("Error al procesar la solicitud, por favor intentalo de nuevo.");
			});
		}

</script>