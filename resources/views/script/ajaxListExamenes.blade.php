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

              tablaExamenes.append("<tr><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='realizarExamen(this);'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

            }else{
              
              tablaExamenes.append("<tr><td><strong>No activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

            }
            
          });

        });

      });

    });

    function realizarExamen(btn)
      {

        var prueba = $('#pruebaR').attr('href');
        var route = prueba.split('%7Bid%7D').join(btn.value);
        window.open(route);

      }


  </script>