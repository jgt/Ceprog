<script>

    $(document).on('ready', function(){


      $('a#Lexamen').on('click', function(e){

        e.preventDefault();

        var tablaExamenes = $('#tablaExamenes');
        var route = $(this).attr('href');
          $('#listExamen').show();
          $('div#act').hide();
          $('div#examen').hide();
          $('div#pregunta').hide();
          $('div#user').hide();
          $('div#listAct').hide();
          $('div#calAct').hide();
          $('div#planeacionC').hide();
          $('div#listUnidades').hide();
          $('div#listSubtemas').hide();
          $('#createVideos').hide();
          $('div#vizuaUnidad').hide();
          $('div#VunidadE').hide();
          $('#listTutAlm').hide();
          $('#adminPlan').hide();
          $('#admRole').hide();
          $('div#user').hide();
          $('#admForo').hide();
          $('#listTut').hide();
          $('#alumnosListUser').hide();
          $('#listPersonal').hide();
          $('#reportes').hide();
          $('#chatForo').hide();
          $('#crr').hide();

        
        $.get(route, function(resp){

          tablaExamenes.html(" ");

          $(resp.data).each(function(key, value){

            if(moment().format() >= value.fecha && moment().format() <= value.fechaF)
            {

              tablaExamenes.append("<tr><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='realizarExamen(this);' data-toggle='modal' data-target='#quiz'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='notaExamen(this);' data-toggle='modal' data-target='#notaExamen'><i class='fa fa-pencil-square-o'></i></td></tr>");

            }else{
              
              tablaExamenes.append("<tr><td><strong>No activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

            }
            
          });

        });

      });

        $('#nextQuiz').on('click', function(e){

        e.preventDefault();

        var id = $('#exaId').val();
        var form = $('#dpg');
        var link = form.attr('action');
        var metodo = form.attr('method');
        var route = link.split('%7Bid%7D').join(id);

        $.ajax({

            url: route,
            headers: { 'X-CSFR-TOKEN': token},
            type: metodo,
            data: form.serialize(),

            success:function(resp){

              var id = $('#exaId').val();
              var prueba = $('#pruebaR').attr('href');
              var route = prueba.split('%7Bid%7D').join(id);
              var divPreg = $('#pregQuiz');
              var ulQuiz = $('#quizResp');

              $.get(route, function(resp){

                divPreg.html(" ");
                ulQuiz.html(" ");

                var nota = $('#ntEx').val(resp.nota);

                $(resp.pregunta).each(function(key, preg){

                  var preguntaId = $('#pregId').val(preg.id);

                  divPreg.append("<p>"+preg.contenido+"</p>");

                  $(preg.respuestas).each(function(key, respu){

                    ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");

                    
                  });

                });

              });
              
            },

            error:function(request, error)
            {

              if(error)
              {
                $('#nextQuiz').hide();
                $('#endQuiz').show();
              }

            }

          });

      });

      $('#endQuiz').on('click', function(e){

        e.preventDefault();

        var id = $('#exaId').val();
        var form = $('#exForm');
        var link = form.attr('action');
        var metodo = form.attr('method');
        var route = link.split('%7Bid%7D').join(id);
        
        $.ajax({

            url: route,
            headers: { 'X-CSFR-TOKEN': token},
            type: metodo,
            data: form.serialize(),

            success:function(resp){

              $('#ntEx').val(' ');
              $('#qexaId').val(' ');
              alertify.alert("El examen ha termiando correctamente.");
              $('#quiz').modal('hide');
              var id = resp.id;
              var link = $('#pdfExamen').attr('href');
              var route = link.split('%7Bid%7D').join(id);
              window.open(route);

            },

            error:function(request, error){

              if(error)
              {

                alertify.alert("Error al procesar la solicitud.");
              }

            }


        });


      });

    });

    function realizarExamen(btn)
      {

         $('#nextQuiz').show();
         $('#endQuiz').hide();
        var idExamen = $('#qexaId').val(btn.value);
        var prueba = $('#pruebaR').attr('href');
        var route = prueba.split('%7Bid%7D').join(btn.value);
        var divPreg = $('#pregQuiz');
        var ulQuiz = $('#quizResp');
        var examenId = $('#exaId').val(btn.value);
        
        $.get(route, function(resp){

          divPreg.html(" ");
          ulQuiz.html(" ");

          

          $(resp.pregunta).each(function(key, preg){

            var preguntaId = $('#pregId').val(preg.id);
            divPreg.append("<p>"+preg.contenido+"</p>");

            $(preg.respuestas).each(function(key, respu){

              ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");

            });

          });

        });

      }

      function notaExamen(btn)
      {

        var id = btn.value;
        var link = $('#ntoExamen').attr('href');
        var route = link.split('%7Bid%7D').join(id);
        var examen = $('#tablaNexamen');

        $.get(route, function(resp){

          examen.html(" ");
          
          $(resp).each(function(key, value){

            $(value.examen).each(function(key, exa){

              $(value.user).each(function(key, user){

                if(value.user_id == user.id)
                {

                  examen.append("<tr><td>"+exa.modulo+"</td><td>"+value.resultado+"</td></tr>");
                }

              });

            });

          });

        });


      }



  </script>