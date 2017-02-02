<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="UTF-8">
	<title>Unidad</title>
	<link href="{{'estiloPdf/css/pdf.css'}}" rel="stylesheet">
</head>
<body>

	 <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <br><br><br><br><br><br><br><br>
      <h1>Univesidad Ceprog</h1>
      <div id="project">
        <div><span>Materia</span>{{$unidad->materia}}</div>
        <div><span>Semestre</span>{{ $unidad->semestre}}</div>
        <div><span>Asesor</span>{{ $unidad->asesor}}</div>
      </div>
    </header>
    <main>
    	<hr>
      <table>
       
        <tbody>
           <tr>
            <td class="service">Nombre de la Unidad</td>
            <td class="desc">{{ $unidad->unidad }}</td>
          </tr>
          <tr>
            <td class="service">Seriacion</td>
            <td class="desc">{{ $unidad->seriacion }}</td>
          </tr>
          <tr>
            <td class="service">Clave</td>
            <td class="desc">{{ $unidad->clave }}</td>
          </tr>
          <tr>
            <td class="service">Tema</td>
            <td class="desc">{{ $unidad->tema }}</td>
          </tr>
          <hr>
        </tbody>
      </table>
      <hr>
      <br>
        <div class="notice">
            
            @foreach($unidad->subtemas as $subtema)
                
                @forelse ($subtema->imagenes as $imagen)
                  <br>
                  {!! $subtema->subtemas !!} 
                  {!! $subtema->descripcion !!}
                  <img src="{{$imagen->ruta}}">

                  @empty

                {!! $subtema->subtemas !!}
                {!! $subtema->descripcion !!}

                @endforelse
                        
        @endforeach

        </div>
    </main>
</body>
</html>
				





