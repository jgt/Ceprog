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
        <img src="img/ceprog.png">
      </div>
      <h1>Univesidad Ceprog</h1>
      <div id="project">
        <div><span>Materia</span>{{$actividad->unidad->materia}}</div>
        <div><span>Semestre</span>{{ $actividad->unidad->semestre}}</div>
        <div><span>Fecha de inicio</span>{{ $actividad->fecha}}</div>
        <div><span>Fecha de entrega</span>{{ $actividad->fechaF}}</div>
      </div>
    </header>
    <main>
    	<hr>
      <table>
       
        <tbody>
          <tr>
            <td class="service">Nombre de la Actividad</td>
            <td class="desc">{{ $actividad->actividad }}</td>
          </tr>
          <tr>
            <td class="service">Descripcion de la actividad</td>
            <td class="desc">{{ $actividad->descripcion }}</td>
          </tr>
          <tr>
            <td class="service">Estrategia</td>
            <td class="desc">{{ $actividad->estrategia }}</td>
          </tr>
          <tr>
            <td class="service">Nivel cognositivo</td>
            <td class="desc">{{ $actividad->cognoscitivo }}</td>
          </tr>
           <tr>
            <td class="service">Valor total de la actividad</td>
            <td class="desc">{{ $actividad->valoractividad }}</td>
          </tr>
          <tr>
            <td class="service">Unidad(es)</td>
            <td class="desc">{{ $actividad->unidad->unidad }}</td>
          </tr>
          <tr>
            <td class="service">Evidencias</td>
            <td class="desc">{{ $actividad->evidencia }}</td>
          </tr>
          <tr>
            <td class="service">Caracteristicas</td>
            <td class="desc">{{ $actividad->caracteristicas }}</td>
          </tr>
          <tr>
            <td class="service">Sugerencia de relacion</td>
            <td class="desc">{{ $actividad->realizacion }}</td>
          </tr>
          <tr>
            <td class="service">Fecha de actividad</td>
            <td class="desc">{{ $actividad->fecha }}</td>
          </tr>
          <tr>
            <td class="service">Codigo de la actividad</td>
            <td class="desc">{{ $actividad->codigoactividad }}</td>
          </tr>
        
         
        </tbody>
      </table>
      <label for="rubricas">Rubricas</label>
      @foreach($actividad->rubricas as $rubrica)
  
          <ul><li>{{$rubrica->name}}</li></ul>  

        @endforeach

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



