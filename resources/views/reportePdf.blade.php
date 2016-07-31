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
      <table>
       
        <tbody>
          <tr>
            <td class="service">Nombre de las Actividades</td>
            @foreach($actividades as $actividad)
              @foreach($actividad->calificaciones as $calificacion)
              @if($calificacion->user_id==$users->id && $calificacion->actividad_id == $actividad->id)
              <td class="desc">{{ $actividad->actividad }}</td>
              @endif
              @endforeach
            @endforeach
          </tr>
          <tr>
            <td class="service">Notas</td>
              <?php $total =0;  ?>
            @foreach($actividades as $actividad)
          
              @foreach($actividad->calificaciones as $calificacion)
                @if($calificacion->user_id==$users->id && $calificacion->actividad_id == $actividad->id)
                <?php $total += $calificacion->promedio;?>
                  <td class="desc">{{ $calificacion->promedio }}</td>
                @endif
              @endforeach
            @endforeach
          </tr>
        
        </tbody>
      </table>
        
        <h3>Total de Notas: {{number_format($total,1)}}</h3>
        <h3>Total de Examenes: {{number_format($totalExamen,1)}}%</h3>

        <h3>Nota de la Materia: {{number_format($totalExamen+$total,1)}}%</h3>
        <h3>Alumno: {{$users->name}}</h3>
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