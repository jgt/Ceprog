<script>
  
  $(document).on('ready', function(){

    $('a#createExa').on('click', function(e){

      e.preventDefault();

      $('#examen').removeClass('alert');
      $('#act').addClass('alert');
      $('div#listAct').addClass('alert');
      $('div#user').addClass('alert');
      $('div#listExamen').addClass('alert');
      $('div#calAct').addClass('alert');
      $('div#planeacionC').addClass('alert');
      $('div#listUnidades').addClass('alert');
      $('div#listSubtemas').addClass('alert');
       $('#createVideos').addClass('alert');
       $('div#vizuaUnidad').addClass('alert');
        $('div#VunidadE').addClass('alert');
        $('#listRub').addClass('alert');
        $('#prflistTuto').addClass('alert');

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
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            alertify.alert('El examen ha sido creado correctamente');
            $('#examen').addClass('alert');
            $('#mod').addClass('alert');
            $('#modl').addClass('alert');
            $('#fec').addClass('alert');
            $('#fecF').addClass('alert');
            $('#ho').addClass('alert');
            $('div#pregunta').removeClass('alert');
            $('#np').val(" ");
            $('#enunciado').val(" "); 
            $('#examenId').val(resp.id);

          },

          error:function(resp){

             if(resp == 'timeout')
             {

                alertify.alert('Lo siento hubo problemas con el internet por favor intentalo de nuevo');
             }

             $('#mod').removeClass('alert');
            $('#modl').removeClass('alert');
            $('#fec').removeClass('alert');
            $('#fecF').removeClass('alert');
            $('#ho').removeClass('alert');
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
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            alertify.alert('La pregunta fue creada');

            var preguntas = [resp];
            var contador = preguntas.length;
            var respC = $('#respC').val(" ");
            $('#nameResp').val(" ");
            $('#prtId').val(resp.id);

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
              $('#createPreg').addClass('alert');
              alertify.alert('El limite de preguntas para este examen es de 40, apartir de aqui ya no puedes crear mas preguntas.');
            }

            if(contador == true)
            {
              $('#createResp').removeClass('alert');
              $('#canResp').addClass('alert');
            }

          },

          error:function(resp){

            if(resp == 'timeout')
            {
              alertify.alert('Lo sentimos la pregunta no fue creada por problemas de conexion');
            }else{

              alertify.alert('Por favor rellena todos los campos solicitados en el formulario');
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
          type: metodo,
          data: form.serialize(),

          success:function(resp){

              alertify.alert('La respuesta fue creada correctamente');

              $('div#pregunta').removeClass('alert');
              $('#enunciado').val(" ");
              $('#respName').val(" ");
              var respuestas = [resp];
              var contador = respuestas.length;

              if(respR == false)
              {
                var total = $('#respC').val(contador);
              }else{

                var nuevoResp = $('#respC').val();
                var suma = parseFloat(nuevoResp) + parseFloat(contador);
                var finalR = $('#respC').val(suma);
              }

              if(nuevoResp == 3)
              {
                $('#createResp').addClass('alert');
                $('#canResp').removeClass('alert');
              }


          },

          error:function(resp){

            if(resp == 'timeout')
            {
              alertify.alert('Lo sentimos la opcion no se ha podido crear por problemas de conexion');
            }

            $('#respName').html(resp.responseJSON.name);

          }

      });

    });

  });

</script>