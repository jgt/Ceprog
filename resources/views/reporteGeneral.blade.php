<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="UTF-8">
  <title>Actividad</title>
  <link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>
     <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <hr>
      <br><br><br><br><br><br><br><br><br><br><br>

      <div id="project"></div>
    </header>
    <main>
      <hr>
      <table class="table table-bordered">
      <tr>
        <th>Alumnos/No.Preguntas</th>
        @foreach($examen->preguntas as $contador => $pregunta)
        <th>({{$contador + 1}}){{$pregunta->contenido}}</th>
        @endforeach
      </tr>
      @foreach($examen->materia->semestre->users as $user)
      <tr>
        <th>{{$user->name}}</th>
        @foreach($examen->preguntas as  $pregunta)
          @foreach($user->respuestasUser as $preguntaUser)
            @if($pregunta->id == $preguntaUser->pregunta_id)
              @foreach($pregunta->respuestas as $respuesta)
                @if($respuesta->id == $preguntaUser->respuesta_id)
                  @if($respuesta->estado==1)
                    <th>1</th>
                  @else
                    <th>0</th>  
                  @endif
                @endif 
              @endforeach 
           @endif
          @endforeach
        @endforeach
        
      </tr>
      @endforeach   
    </table>
        
        <hr>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Este formato es un reporte de calificaciones.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
</body>
</html>