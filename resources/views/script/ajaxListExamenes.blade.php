<script>

    $(document).on('ready', function(){


      //cuando se edita la pregunta
      function listaPreguntas()
      {
                var id = $('#edexamenId').val();
                var link = $('#listPreguntas').attr('href')
                var route = link.split('%7Bid%7D').join(id);
                var tabla = $('#tablaPreguntas');

                 $.get(route, function(resp){

                  tabla.html(' ');
          
                  $(resp.data).each(function(key, value){

                    tabla.append("<tr><td>"+value.contenido+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarPregunta(this);' data-toggle='modal' data-target='#editPregunta'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarPregunta(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

                    });

                });
      }

      $('a#LexamenMaestro').on('click', function(e){

          e.preventDefault();

          $('#tbMateriaDoc').hide();
        $('#crtExamenDocente').hide();
        $('#mtaList').hide();
        $('#crr').hide();
        $('#semm').hide();
        $('#listTutAlm').hide();
        $('#preForo').hide();
        $('#froadm').hide();
        $('#chatForo').hide();
        $('div#act').hide();
        $('div#listAct').hide();
        $('div#examen').fadeOut();
        $('div#listExamen').hide();
        $('div#calAct').hide();
        $('div#planeacionC').fadeOut();
        $('div#listSubtemas').hide();
        $('#createVideos').hide();
        $('div#listAct').hide();
        $('#Almact').hide();
        $('div#vizuaUnidad').hide();
        $('div#AlmUni').hide();
        $('div#VunidadE').hide();
        $('div#calAct').hide();
        $('div#notasRubricas').hide();
        $('#listRub').hide();
        $('#listTutAlm').hide();
        $('#adminPlan').hide();
        $('#admRole').hide();
        $('div#user').hide();
        $('#admForo').hide();
        $('#listTut').hide();
        $('div#listUnidades').hide();
        $('#listPersonal').hide();
        $('#prflistTuto').hide();
        $('#crr').hide();
        $('#alumnosListUser').hide();
        $('#listExamenDocente').show();
        $('#listPreg').hide();
        $('#listExamenDoc').hide();
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

          var tabla = $('#tablaExamenesDocente');
          var route = $(this).attr('href');

          $.get(route, function(resp){

            tabla.html(' ');

            if(resp.total == 0)
            {
              alertify.alert('La materia no tiene examenes.');
              $('#listExamenDocente').hide();
            }else{

              $(resp.data).each(function(key, value){

               tabla.append("<tr><td>"+value.modulo+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarExamen(this);' data-toggle='modal' data-target='#editarExamen'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='crearPreguntas(this);' data-toggle='modal' data-target='#crearPreguntas'><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='preguntas(this);'><i class='fa fa-search' aria-hidden='true'></i><td><button class='btn btn-primary' value="+value.id+" OnClick='verExamen(this);'><i class='fa fa-eye' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='examenPdf(this);'><i class='fa fa-eye' aria-hidden='true'></i></td></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExamen(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

            }); 

            } 



          });

      });

      
      $('#updateExa').on('click', function(e){

        e.preventDefault();

        var id = $('#exa_id').val();
        var form = $('#form-exa');
        var link = form.attr('action');
        var metodo = form.attr('method');
        var route = link.split('%7Bid%7D').join(id);

        $.ajax({

          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            alertify.alert('El examen ha sido editado correctamente.');

             var matId = $('#editExmat').val();
             var tabla = $('#tablaExamenesDocente');
             var link = $('#ltexa').attr('href');
             var ruta = link.split('%7Bid%7D').join(matId);

          $.get(ruta, function(resp){

            tabla.html(' ');

            $(resp.data).each(function(key, value){

               tabla.append("<tr><td>"+value.modulo+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarExamen(this);' data-toggle='modal' data-target='#editarExamen'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='crearPreguntas(this);' data-toggle='modal' data-target='#crearPreguntas'><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='preguntas(this);'><i class='fa fa-search' aria-hidden='true'></i><td><button class='btn btn-primary' value="+value.id+" OnClick='verExamen(this);'><i class='fa fa-eye' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='examenPdf(this);'><i class='fa fa-eye' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExamen(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

            });  

          });

          }

        });

      });

      
      $('#updatePreg').on('click', function(e){

          e.preventDefault();
          var id = $('#edpreguntaId').val();
          var form = $('#edPreg-form');
          var link = form.attr('action');
          var metodo = form.attr('method');
          var route = link.split('%7Bid%7D').join(id);
          
          $.ajax({

              url: route,
              headers: { 'X-CSFR-TOKEN': token},
              type: metodo,
              data: form.serialize(),

              success:function(resp){

                    listaPreguntas();
                    alertify.alert('La pregunta fue editada correctamente.');
                    $('#editPregunta').modal('hide');
                    $('#modaleditRespuestas').modal('show');

                    var enlace = $('#answer').attr('href');
                    var ruta = enlace.split('%7Bid%7D').join(id);
                    
                    $.get(ruta, function(resp){

                        $(resp).each(function(key, value){

                          

                        });

                    });



              },

              error:function(request, error){

                if(error)
                {

                  alertify.alert('Tienes algunos errores porfavor verifica el formulario.');
                }
              }

          })

      });


      $('#respEditEx').on('click', function(){

                        var form = $('#updateRespuesta');
                        var link = form.attr('action');
                        var metodo = form.attr('method');
                        var route = link.split('%7Bid%7D').join(id);

                    $.ajax({

                        url: route,
                        headers: { 'X-CSFR-TOKEN': token},
                        type: metodo,
                        data: form.serialize(),

                        success:function(resp){

                          alertify.alert('La respuestas han sido editadas.');

                        },

                        error:function(request, error){

                          if(error)
                          {
                            alertify.alert('Tienes algunos errores porfavor verifica el formulario.');
                          }

                        }


                    });

                   });


      //lista de examenes para estudiantes
      $('a#Lexamen').on('click', function(e){

        e.preventDefault();

        var tablaExamenes = $('#tablaExamenes');
        var route = $(this).attr('href');
        $('#endQuiz').attr('disabled', false);

        $('#tbMateriaDoc').hide();
          $('#listExamen').show();
          $('div#act').hide();
          $('div#examen').fadeOut();
          $('div#pregunta').hide();
          $('div#user').hide();
          $('div#AlmUni').hide();
          $('div#listAct').hide();
          $('div#calAct').hide();
          $('div#planeacionC').fadeOut();
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
          $('#LexamenMaestro').hide();
          $('#crr').hide();
          $('#semm').hide();
          $('#mtaList').hide();
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
        
        $.get(route, function(resp){


          tablaExamenes.html(" ");

          $(resp.data).each(function(key, value){

            var now = new Date();
            var startDate = new Date(value.fecha);
            var endDate = new Date(value.fechaF);

            if(now >= startDate &&  now <= endDate)
            {

              tablaExamenes.append("<tr><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='realizarExamen(this);' data-toggle='modal' data-target='#quiz'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='notaExamen(this);' data-toggle='modal' data-target='#notaExamen'><i class='fa fa-pencil-square-o'></i></td></tr>");

            }else{
              
              tablaExamenes.append("<tr><td><strong>No activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='notaExamen(this);' data-toggle='modal' data-target='#notaExamen'><i class='fa fa-pencil-square-o'></i></td></tr>");

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
        $('#nextQuiz').attr('disabled', true);
        $.blockUI();

        $.ajax({

            url: route,
            headers: { 'X-CSFR-TOKEN': token},
            type: metodo,
            data: form.serialize(),

            success:function(resp){

              $.unblockUI();
              var id = $('#exaId').val();
              var prueba = $('#pruebaR').attr('href');
              var route = prueba.split('%7Bid%7D').join(id);
              var divPreg = $('#pregQuiz');
              var ulQuiz = $('#quizResp');

              $.get(route, function(resp){

                divPreg.html(" ");
                ulQuiz.html(" ");
                $('#nextQuiz').attr('disabled', false);

                var nota = $('#ntEx').val(resp.nota);

                if(resp.pregunta.length == 0)
                {
                  alertify.alert("El examen ha finalizado, tu nota es: "+resp.nota);
                  $('#nextQuiz').hide();
                  $('#endQuiz').show();
                }else{

                  $(resp.pregunta).each(function(key, preg){
                  
                  var preguntaId = $('#pregId').val(preg.id);

                  divPreg.append("<p>"+preg.contenido+"</p>");

                  $(preg.respuestas).each(function(key, respu){

                    ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");

                    
                  });

                });
                }

              });
              
            },

            error:function(request, error)
            {

              if(error)
              {
                $.unblockUI();
                $('#nextQuiz').attr('disabled', false);
                alertify.alert("Recuerda que tienes que responder la pregunta.");
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
        $('#endQuiz').attr('disabled', true);
        $.blockUI();
        
        $.ajax({

            url: route,
            headers: { 'X-CSFR-TOKEN': token},
            type: metodo,
            data: form.serialize(),

            success:function(resp){

              $.unblockUI();
              $('#ntEx').val(' ');
              $('#qexaId').val(' ');
              $('#quiz').modal('hide');
              var id = resp.id;
              var link = $('#pdfExamen').attr('href');
              var route = link.split('%7Bid%7D').join(id);
              window.open(route);

            },

            error:function(request, error){

              if(error)
              {
                $('#endQuiz').attr('disabled', false);
                $.unblockUI();
                alertify.alert("Error al procesar la solicitud.");
              }

            }


        });


      });
  
      //crear preguntas del examen que aun no se ha completado.
      $('#createP').on('click', function(e){

          e.preventDefault();

          var sum = $('#porcenIcm').val();
          var form = $('#storePreguntaIcm');
          var route = form.attr('action');
          var metodo = form.attr('method');
          CKEDITOR.instances.enunciadoIcm.updateElement();
          $(this).attr('disabled', true);
          $.blockUI();

          $.ajax({

              url: route,
              headers: { 'X-CSFR-TOKEN': token},
              type: metodo,
              data: form.serialize(),

              success:function(resp)
              {
                $('#createP').attr('disabled', false);
                $.unblockUI();
                alertify.alert('La pregunta ha sido creada.');
                $('#modalRespuestasIcm').modal('show');
                $('#crearPreguntas').modal('hide');
                $('#enunciadoIcm').val(" ");
                $('#valorIcm').val(" ");

                var preguntas = [resp];
                var contador = preguntas.length;
                var respC = $('#respC').val(" ");
                $('#prtIcm').val(resp.id);
                $('input#nameRespUnoIcm').val(' ');

                if(np == false)
                {
                  var total = $('#np').val(contador);
                }else{

                    var nuevoNp = $('#np').val();
                    var suma = parseFloat(nuevoNp) + parseFloat(contador);
                    var resultado = $('#np').val(suma);
                }

              },

              error:function(request, error)
              {
                if(error)
                {
                  $('#createP').attr('disabled', false);
                  $.unblockUI();
                  alertify.alert("Hay errores en el formulario.");
                }

              }

          });




      });

        //crear respuestas de los examenes incompletos
        $('#createRespIcm').on('click', function(e){

            e.preventDefault();
            
            var form = $('#storeRespuestaIcm');
            var route = form.attr('action');
            var metodo = form.attr('method');
            $(this).attr('disabled', true);
            $.blockUI();

            $.ajax({

                url: route,
                headers: { 'X-CSFR-TOKEN': token},
                type: metodo,
                data: form.serialize(),

                success:function(resp)
                {

                    if(resp)
                    {
                      $('#createRespIcm').attr('disabled', false);
                      $.unblockUI();
                      alertify.alert('La respuesta fueron guardadas correctamente');
                      $('#modalRespuestasIcm').modal('hide');
                    }
                },

                error:function(request, error)
                {

                     if(error)
                     {
                        $('#createRespIcm').attr('disabled', false);
                        $.unblockUI();
                        alertify.alert('Tienes errores en el formulario.');
                     }

                }


            });


        });

    });

      function reporteGeneral(btn){

        var id = btn.value;
        var link = $('#rpeGen').attr('href');
        var route = link.split('%7Bid%7D').join(id);
        window.open(route);

  }



    //funciones para lista de examenes perfil maestro

    function crearPreguntas(btn) // crear preguntas si el examen esta incompleto
    {


      var id = btn.value;
      $('#quizId').val(id);
      var link = $('#examenPreguntas').attr('href');
      var route = link.split('%7Bid%7D').join(id);
      var sum = 0;

      $.get(route, function(resp){

          $('#npIcm').val(resp.length);

        $(resp).each(function(key, value){

            sum += parseFloat(value.valor);
            var porcen = $('#porcenIcm').val(sum);
            
            $('#valorIcm').keyup(function(){
            if(!isNaN(parseFloat($(this).val())))
            { 
             
              var suma = parseFloat(sum) + parseFloat($(this).val());
              $('#porcenIcm').val(suma);

            }else{

              $('#porcenIcm').val(sum);
            }
                  
          });

            if(sum >= 20)
            {
              $('#createP').hide();
              $('#endQuestion').show();
            }else{

               $('#createP').show();
               $('#endQuestion').hide();

            }


              });


      });

    }


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
  
          if(resp.pregunta.length == 0)
          {
            alertify.alert("Ya tienes una nota en este examen.");
            $('#quiz').modal('hide');
          }else{

              $(resp.pregunta).each(function(key, preg){

              var preguntaId = $('#pregId').val(preg.id);

              divPreg.append("<li><p>"+preg.contenido+"</p></li>");

              $(preg.respuestas).each(function(key, respu){

                ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");
              });
            });
          }
    
        });
      }


      function verExamen(btn)
      {

        var id = btn.value;
        var link = $('#verExa').attr('href');
        var route = link.split('%7Bid%7D').join(id);
        window.open(route);

      }

      function examenPdf(btn)
      { 

        var id = btn.value;
        var link = $('#exmPdf').attr('href');
        var route = link.split('%7Bid%7D').join(id);
        window.open(route);

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

                  examen.append("<tr><td>"+exa.modulo+"</td><td>"+value.resultado+"</td></tr>");
    
            });

          });

        });


      }

      function borrarExamen(btn)
      {

          var id = btn.value;
          var link = $('#deleteEx').attr('href');
          var route = link.split('%7Bid%7D').join(id);

          $.get(route, function(resp){

             var tabla = $('#tablaExamenesDocente');
             var link = $('#LexamenMaestro').attr('href');
             var ruta = link.split('%7Bid7D').join(id);

             alertify.alert('El examen ha sido borrado.');

             $.get(ruta, function(resp){

                tabla.html(' ');

                $(resp.data).each(function(key, value){

              tabla.append("<tr><td>"+value.modulo+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarExamen(this);' data-toggle='modal' data-target='#editarExamen'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='crearPreguntas(this);' data-toggle='modal' data-target='#crearPreguntas'><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='preguntas(this);'><i class='fa fa-search' aria-hidden='true'></i><td><button class='btn btn-primary' value="+value.id+" OnClick='verExamen(this);'><i class='fa fa-eye' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='examenPdf(this);'><i class='fa fa-eye' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExamen(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");
            }); 

             });

          });
      }

      function editarExamen(btn)
      {

          var id = btn.value;
          var link = $('#editExamen').attr('href');
          var route = link.split('%7Bid%7D').join(id);
          $('#exa_id').val(id);

          $.get(route, function(resp){

            $('#editExmat').val(resp.materia_id);
            $('#authExam').val(resp.catedratico);
            $('#modExam').val(resp.modalidad);
            $('#mdExamen').val(resp.modulo);
            $('#ini').val(resp.fecha);
            $('#fin').val(resp.fechaF);

          });
      }


      //funciones para el la lista de examenes perfil maestro seccion preguntas
      function preguntas(btn)
      { 

        $('#listPreg').show();
        $('#listExamenDocente').hide();
        var id = btn.value;
        var dltPregunta = $('#idDlt').attr('href', id);
        var link = $('#listPreguntas').attr('href')
        var route = link.split('%7Bid%7D').join(id);
        var tabla = $('#tablaPreguntas');

        //retrocede a lista de examenes
        $('#backPreguntas').on('click', function(e){

                e.preventDefault();
                $('#listPreg').hide();
                $('#listExamenDocente').show();

        });
    
        $.get(route, function(resp){

            tabla.html(' ');
              
              if(resp.total == 0)
              {
                alertify.alert('Este examen no tiene preguntas.');
                $('#listPreg').hide();
                $('#listExamenDocente').show();
              }else{

                $(resp.data).each(function(key, value){

                  tabla.append("<tr><td>"+value.contenido+"</td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarPregunta(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

                });

              }

        });

      }

      function editarPregunta(btn)
      {

        var id = btn.value;
        var link = $('#edPreg').attr('href');
        var route = link.split('%7Bid%7D').join(id);

        $.get(route, function(resp){

            $('#edenunciado').val(resp.contenido);
            $('#edvalor').val(resp.valor);
            $('#edexamenId').val(resp.examen_id);
            $('#edpreguntaId').val(resp.id);

        });

      }

      function borrarPregunta(btn)
      {

        var id = btn.value;
        var link = $('#dltPregunta').attr('href');
        var route = link.split('%7Bid%7D').join(id);

        //lista de preguntas
        var idExa = $('#idDlt').attr('href');
        var enlace = $('#listPreguntas').attr('href')
        var ruta = enlace.split('%7Bid%7D').join(idExa);
        var tabla = $('#tablaPreguntas');

        
        $.get(route, function(resp){

          alertify.alert('La pregunta ha sido borrada.');

          //lista de preguntas
          $.get(ruta, function(resp){

            tabla.html(' ');

            $(resp.data).each(function(key, value){

                console.log(value);
              tabla.append("<tr><td>"+value.contenido+"</td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarPregunta(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

            });

        });

        });


      }



  </script>