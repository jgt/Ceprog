<script>

    $(document).on('ready', function(){


      $('a#Lexamen').on('click', function(e){

        e.preventDefault();

        var tablaExamenes = $('#tablaExamenes');
        var route = $(this).attr('href');
          $('#listExamen').removeClass('alert');
          $('div#act').addClass('alert');
          $('div#examen').addClass('alert');
          $('div#pregunta').addClass('alert');
          $('div#user').addClass('alert');
          $('div#listAct').addClass('alert');
          $('div#calAct').addClass('alert');
          $('div#planeacionC').addClass('alert');
          $('div#listUnidades').addClass('alert');
          $('div#listSubtemas').addClass('alert');
          $('#createVideos').addClass('alert');
          $('div#vizuaUnidad').addClass('alert');
          $('div#VunidadE').addClass('alert');
          $('#listTutAlm').addClass('alert');
          $('#adminPlan').addClass('alert');
          $('#admRole').addClass('alert');
          $('div#user').addClass('alert');
          $('#admForo').addClass('alert');
          $('#listTut').addClass('alert');
          $('#alumnosListUser').addClass('alert');
          $('#listPersonal').addClass('alert');

        
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