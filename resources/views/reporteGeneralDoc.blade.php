<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Reporte General</title>
            <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
        </head>
        <body>
        <header class="clearfix">
            <div id="logo">
                <img src="img/logo_10A_FullColor.png">
            </div>
            <h1>Reporte General</h1>
            <div id="company" class="clearfix">
                <div>Universidad Ceprog</div>
                <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
                <div>+52 (916) 345 3906 </div>
                <div><a href="#">contacto@uceprog.edu.mx</a></div>
            </div>
            <div id="project">
                <div><span>Proyecto</span> Evaluacion docente</div>
                <div><span>Fecha</span>{{$fecha}}</div>
                <div><span>Lineamientos:</span>4 puntaje maximo</div>
                <div><span>Planeacion:</span>4 puntaje maximo</div>
                <div><span>Motivacion:</span>4 puntaje maximo</div>
                <div><span>Desenvolvimiento de la asignatura:</span>7 puntaje maximo</div>
            </div>
        </header>
        <main>
        {{-- */ $count=1 /* --}}
        {{-- */ $lineaspag=30 /* --}}
        @foreach($materias as $materia)
            @if($count==1)
                <table class="page-break">
                    <thead>
                    <tr>
                        <th class="service">Materias</th>
                        <th>Maestro</th>
                        @foreach($rangos as $rango)
                            <th class="desc">{{$rango->name}}</th>
                        @endforeach
                        <th>Total</th>
                        <th>Alumnos</th>
                        <th>Porcentaje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    {{--*/ $porcentaje=0 /*--}}
                    <tr>
                        <td class="service">{{$materia->name}}</td>
                        @foreach($materia->users as $user)
                          <td class="service">{{$user->name}}</td>
                        @endforeach
                        @foreach($rangos as $rango)
                  {{--*/ $total=0 /*--}}
                    @foreach($rango->preguntas as $pregunta)
                      @foreach($pregunta->respuestasDocentes as $posResp)
                        @foreach($posResp->respuestasDocentes as $respuesta)

                            @if($materia->id == $respuesta->materia_id && $pregunta->rango_id == $rango->id)
                            {{--*/ $total +=$posResp->valor /*--}}
                            @endif  
                        @endforeach
                      @endforeach
                    @endforeach
                    <td class="service">{{number_format($total/$materia->mat_results,1)}}%</td>
                    {{--*/ $porcentaje += $total /*--}}
                 @endforeach
                 <td class="service">{{number_format($porcentaje/$materia->mat_results,1)}}</td>
                  <td class="service">{{$materia->mat_results}}</td>
                  <td class="service">{{number_format($porcentaje/$materia->mat_results,1)}}</td>
                    </tr>
                    {{-- */ $count=$count+1 /* --}}
                    @if($count==$lineaspag)
                    </tbody>
                </table>
 {{-- */ $count=1 /* --}}
@endif
@endforeach
</main>
<footer>
Universidad ceprog Construimos tu futuro.
</footer>
</body>
</html>