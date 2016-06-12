<script>
  
  $(document).on('ready', function(){

  
    $('a#createExa').on('click', function(e){

      e.preventDefault();

      $('#preForo').hide();
      $('#examen').show();
      $('div#planeacionC').hide();
      $('#pregunta').hide();
      $('#chatForo').hide();
      $('#froadm').hide();
      $('#alumnosListUser').hide();
      $('div#preguntaExmamen').hide();


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

        $.ajax({


          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            alertify.alert('El examen ha sido creado correctamente');
            $('#preForo').hide();
            $('#examen').hide();
            $('#mod').hide();
            $('#modl').hide();
            $('#fec').hide();
            $('#fecF').hide();
            $('#ho').hide();
            $('#crr').hide();
            $('#froadm').hide();
            $('#preguntaExmamen').show();
            $('#np').val(" ");
            $('#enunciado').val(" "); 
            $('#examenId').val(resp.id);

          },

          error:function(resp){

             if(resp == 'timeout')
             {

                alertify.alert('Lo siento hubo problemas con el internet por favor intentalo de nuevo');
             }

             $('#mod').show();
            $('#modl').show();
            $('#fec').show();
            $('#fecF').show();
            $('#ho').show();
            $('#froadm').hide();
             $('#mod').html(resp.responseJSON.modalidad);
             $('#modl').html(resp.responseJSON.modulo);
             $('#fec').html(resp.responseJSON.fecha);
             $('#fecF').html(resp.responseJSON.fechaF);
             $('#ho').html(resp.responseJSON.hora);
            

          }


        });


    });
  
      $('#createPreg').on('click', function(e){

        e.preventDefault();

        var form = $('#storePregunta');
        var route = form.attr('action');
        var metodo = form.attr('method');
        var np = $('#np').val();

        $.ajax({

          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            alertify.alert('La pregunta fue creada');

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

            if(nuevoNp == 39)
            {
              $('#createPreg').hide();
              alertify.alert('El limite de preguntas para este examen es de 40, apartir de aqui ya no puedes crear mas preguntas.');
            }

            if(contador == true)
            {
              $('#createResp').show();
              $('#canResp').hide();
            }

          },

          error:function(resp){

            if(resp == 'timeout')
            {
              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
            }else{

              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
              $('#modalRespuestas').modal('hide');
            }

          }


        });


      });

    $('#createResp').on('click', function(e){

      e.preventDefault();

       var form = $('#storeRespuesta');
       var route = form.attr('action');
       var metodo = form.attr('method');
       var respR = $('#respC').val();

      $.ajax({

          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

              $('#enunciado').val(' ');

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
              alertify.alert('Lo sentimos la opcion no se ha podido crear por problemas de conexion');
            }

            alertify.alert('Los campos del formulario estan vacios.');

          }

      });
      
    });

   
  });


</script>