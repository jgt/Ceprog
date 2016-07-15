<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="UTF-8">
	<title>Reporte</title>
	<link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>
      <div id="logo">
        <img src="img/ceprog.png">
      </div>
      <h1>Univesidad Ceprog</h1>
      <div id="project"></div>
    </header>
    <main>
    	<hr>
      <table>
       
        <tbody>

           @foreach($carreras as $semestre)
           <tr>

           <td>Semestre:</td>
           <td>{!! $semestre->name!!}</td>
             
           </tr>
           <tr>
             <td>Materias:</td>
             <td>{!! $semestre->materias->count(); !!}</td> 
           </tr>
          
          <tr>
            <td>Alumnos:</td>
            <td>{!! $semestre->users->count(); !!}</td>
          </tr>
          
         @endforeach
        </tbody>
      </table>
      {!! Form::label('alumnos', 'Total de alumnos en la carrera:')!!} {!! $alumnos->users->count(); !!}
      <hr>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Informe de materias y estudiantes.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
</body>
</html>
