<script>
  
  $(document).on('ready', function(){
    var sum=0;
    
    //Valor por defefecto de la caja de texto valor
    $('#porcen').val($('#valor').val());

    $('#valor').keyup(function(){
      if(!isNaN(parseFloat($(this).val())))
      {
        $('#porcen').val(parseFloat(sum)+parseFloat($(this).val()));
      }else{

        $('#porcen').val(sum);
      }
            
    });
  
    $('a#createExa').on('click', function(e){

      e.preventDefault();

      $('#tbMateriaDoc').hide();
      $('#mtaList').hide();
      $('#crr').hide();
      $('#semm').hide();
      $('#preForo').hide();
      $('#examen').fadeIn();
      $('div#planeacionC').fadeOut();
      $('#pregunta').hide();
      $('#chatForo').hide();
      $('#froadm').hide();
      $('#alumnosListUser').hide();
      $('div#preguntaExmamen').hide();
      $('#listExamenDocente').hide();
      $('#act').hide();
      $('div#listAct').hide();
      $('div#user').hide();
      $('div#listExamen').hide();
      $('div#calAct').hide();
      $('div#listUnidades').hide();
      $('div#listSubtemas').hide();
      $('#createVideos').hide();
      $('div#vizuaUnidad').hide();
      $('div#VunidadE').hide();
      $('#listRub').hide();
      $('#prflistTuto').hide();
      $('#adminPlan').hide();
      $('#admRole').hide();
      $('div#user').hide();
      $('#admForo').hide();
      $('#listTut').hide();
      $('#listPersonal').hide();
      $('#reportes').hide();
      $('#crr').hide();
      $('#crtExamenDocente').hide();
      $('#listExamenDoc').hide();
      $('#listRec').hide();
      $('#listRecMa').hide();
      $('#plcList').hide();
      $('#admPlc').hide();
      $('#plcAlm').hide();
      $('#act').fadeOut();
      $('#crtSub').fadeOut();
      $('#editUnidad').fadeOut();
      $('#videoUnidad').fadeOut();
      $('#listSubtemas').fadeOut();
      $('#listAct').fadeOut();
      $('#calAct').fadeOut();
      $('#menUnidad').fadeOut();
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

      var route = $(this).attr('href');
      
      $.get(route, function(resp){

        $(resp.materia).each(function(key, value){

            $('#mta').val(value.name);
            $('input#mta').prop('disabled', true);
            $('#idMat').val(value.id);

        });

        $(resp.usuario).each(function(key, value){

          $('#auth').val(value.name);

        });
        

      });

    });

    $('#crearExa').on('click', function(e){

        e.preventDefault();

        var form = $('#formExa');
        var route = form.attr('action');
        var metodo = form.attr('method');
        $('#valor').val('0.5');
        $(this).attr('disabled', true);
        $.blockUI();

        $.ajax({


          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            $('#crearExa').attr('disabled', false);
            $.unblockUI();
            alertify.alert('El examen ha sido creado correctamente');
            $('#porcen').val(parseInt(0));
            $('#preForo').hide();
            $('#examen').hide();
            $('#mod').hide();
            $('#modl').hide();
            $('#fec').hide();
            $('#fecF').hide();
            $('#ho').hide();
            $('#crr').hide();
            $('#mtaList').hide();
            $('#froadm').hide();
            $('#preguntaExmamen').show();
            $('#np').val(" ");
            $('#enunciado').val(" "); 
            $('#examenId').val(resp.id);

          },

          error:function(request, error){

             if(request == 'timeout')
             {

                alertify.alert('Lo siento hubo problemas con el internet por favor intentalo de nuevo');
             }else if(error)
             {
                 $('#crearExa').attr('disabled', false);
                 $.unblockUI();
                 alertify.alert('Porfavor rellena todos los campos del formulario.');
             }

             $('#mod').show();
            $('#modl').show();
            $('#fec').show();
            $('#fecF').show();
            $('#ho').show();
            $('#froadm').hide();
          
          }


        });


    });
  
      $('#createPreg').on('click', function(e){

        e.preventDefault();
        
        var form = $('#storePregunta');
        var route = form.attr('action');
        var metodo = form.attr('method');
        var np = $('#np').val();
        var valor = $('#valor').val();
        var porcen = $('#porcen').val();
        CKEDITOR.instances.enunciado.updateElement();
        $(this).attr('disabled', true);
        $.blockUI();

      if(porcen <= 20)
        {

        $.ajax({

          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            $('#createPreg').attr('disabled', false);
            $.unblockUI();
            sum = sum+parseFloat($('#valor').val());
            $('#porcen').val(sum);
            $('#valor').val(" ");
            alertify.alert('La pregunta fue creada');
            $('#modalRespuestas').modal('show');
            $('#endQuestion').hide();

            
          //conteo de preguntas
            var preguntas = [resp];
            var contador = preguntas.length;
            var respC = $('#respC').val(" ");
            $('#prtId').val(resp.id);
            $('input#nameRespUno').val(' ');

            if(np == false)
            {
              var total = $('#np').val(contador);
            }else{

                var nuevoNp = $('#np').val();
                var suma = parseFloat(nuevoNp) + parseFloat(contador);
                var resultado = $('#np').val(suma);
            }

          },

          error:function(resp){

            if(resp == 'timeout')
            {
              $('#createPreg').attr('disabled', false);
              $.unblockUI();
              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
            }else{

              $('#createPreg').attr('disabled', false);
              $.unblockUI();
              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
              $('#modalRespuestas').modal('hide');
            }

          }


        });

      }else{

        alertify.alert('El examen ha llegado a su limite de porcentaje.');
        $('#endQuestion').show();
        $('#modalRespuestas').modal('hide');

        $('#endQuestion').on('click', function(e){

          e.preventDefault();
          $('#preguntaExmamen').hide();

        });
      }
    
      });

    $('#createResp').on('click', function(e){

      e.preventDefault();

       var form = $('#storeRespuesta');
       var route = form.attr('action');
       var metodo = form.attr('method');
       var respR = $('#respC').val();
       $(this).attr('disabled', true);
       $.blockUI();

      $.ajax({

          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

              $('#enunciado').val(' ');
              $('#createResp').attr('disabled', false);
              $.unblockUI();
              if(resp)
              {
                alertify.alert('La respuesta fueron guardadas correctamente');
                $('div#preguntaExmamen').show();
                $('#modalRespuestas').modal('hide');
              }
          },

          error:function(resp){

            if(resp == 'timeout')
            {
              $('#createResp').attr('disabled', false);
              $.unblockUI();
              alertify.alert('Lo sentimos la opcion no se ha podido crear por problemas de conexion');
            }

            $('#createResp').attr('disabled', false);
            $.unblockUI();
            alertify.alert('Los campos del formulario estan vacios.');

          }

      });
      
    });

   
  });


</script>