<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="UTF-8">
	<title>Actividad</title>
	<link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>
     
      <div id="project">
        <div><span>Alumno</span>{{$user->name}}</div>
      </div>
    </header>
    <main>
    	<hr>
      <table>
       
        <tbody>
          <tr>
            <td class="service">Nombre de las Unidades</td>
            @foreach($semestres as $semestre)
              @foreach($semestre->materias as $materia)
                @foreach($materia->unidades as $unidad)
                  <td class="desc">{{ $unidad->unidad }}</td>
                @endforeach
              @endforeach
            @endforeach
          </tr>
    
        </tbody>
      </table>

      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Este formato es un reporte de la actividad creada.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
</body>
</html>