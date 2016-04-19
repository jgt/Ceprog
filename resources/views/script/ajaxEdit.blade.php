<script>
  
  $(document).on('ready', function(){

      cargar();

  });

  function cargar(){

     $('a#listaP').on('click', function(e){

      e.preventDefault();
      var tablaData = $('#tablaData');
      $('div#user').addClass('alert');
      $('div#listaP').removeClass('alert');
      $('div#calAct').addClass('alert');
      $('div#planeacionC').addClass('alert');
      $('div#listUnidades').addClass('alert');
      $('div#listSubtemas').addClass('alert');
      $('#createVideos').addClass('alert');
      $('div#vizuaUnidad').addClass('alert');
      $('#listRub').addClass('alert');
      $('#listPersonal').addClass('alert');
      $('#reportes').addClass('alert');
      var listUser = $(this).attr('href');

      $.get(listUser, function(resp){

        $(resp).each(function(key,value){

          tablaData.append("<tr><td>"+value.name+"</td><td><button value="+value.id+" data-toggle='modal' data-target='#myModal' OnClick='Mostrar(this);' class='btn btn-primary'><i class='fa fa-pencil'></i></button></td></tr>");

        });
 
      });

    });
  }

  function Mostrar(btn)
  {
     var route =  "http://ucp.com/admin/"+btn.value+"/edit";
 
    $.get(route, function(resp){

      $('input#name').val(resp.name);
      $('input#cuenta').val(resp.cuenta);
      $('input#password').val(resp.password);
      $('#id').val(resp.id); 

      $('#roles').empty();
      $('#materias').empty();
      $('#semestres').empty();
      $('#carreras').empty();
      $.each(resp.roles, function(i, data){

        $('#roles').append('<option value="'+data.id+'">'+data.name+'</option>');

      });

      $.each(resp.materias, function(i, data){

          $('#materias').append('<option value="'+data.id+'">'+data.name+'</option>');
       
      });

      $.each(resp.semestres, function(i, data){

        $('#semestres').append('<option value="'+data.id+'">'+data.name+'</option>');
      
      });

      $.each(resp.carreras, function(i, data){

        $('#carreras').append('<option value="'+data.id+'">'+data.name+'</option>');

      });

    });
  }

  $('#actualizar').on('click', function(){

    var value = $('#id').val();
    var route = "http://ucp.com/admin/"+value+"";
    var form = $('#form');
    var metodo = form.attr('method');
   
    $.ajax({

        url: route,
        type: metodo,
        data: form.serialize(),

        success: function(){

            cargar();
            $('#myModal').modal('toggle');
            $('#msj-success').fadeIn();
        }
    })

  });

 

</script>