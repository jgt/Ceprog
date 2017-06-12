<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Reporte Diagnostico</title>
            <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
        </head>
        <body>
        <header class="clearfix">
            <div id="logo">
                <img src="img/logo_10A_FullColor.png">
            </div>
            <h1>Reporte Diagnostico</h1>
            <div id="company" class="clearfix">
                <div>Universidad Ceprog</div>
                <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
                <div>+52 (916) 345 3906 </div>
                <div><a href="#">contacto@uceprog.edu.mx</a></div>
            </div>
            <div id="project">
            	<div><span>Carrera</span>{{ $carrera->name }}</div>
                <div><span>Fecha</span>{{$fecha}}</div>
                <div><span>Alumnos con resultados</span>{{$users}}</div>
            </div>
        </header>
                <table>
                    <thead>
                    <tr>
                    	<th><strong>Areas</strong></th>
                    	<th><strong>Correctas</strong></th>
                    	<th><strong>Incorrectas</strong></th>
                        <th><strong>Porcentaje de  correctas por area</strong></th>
                        <th><strong>Porcentaje de  incorrectas por area</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- */ $totalCorrectas=0 /* --}}
                        {{-- */ $totalIncorrectas=0 /* --}}
                    	@foreach($areas as $area)
							{{--*/ $correctas=0 /*--}}
							{{-- */ $incorrecta=0 /* --}}
							{{-- */ $preguntas=0 /* --}}
                            {{-- */ $suma=0 /* --}}
							<tr>
								@foreach($area->preguntas as $pregunta)
                                    @foreach($carrera->users as $user)
    									@foreach($user->resultadoDiag as $resul)
                                            @if($resul->evadig_id == $pregunta->evadig_id)
                                                @foreach($pregunta->respDiagnostico as $resp)
                                                    @if($resp->user_id == $user->id && $resp->evaposresp->estado == 1)
                                                        {{--*/ $correctas +=count($pregunta) /*--}}
                                                        {{--*/ $totalCorrectas +=count($resp) /*--}}
                                                    @elseif($resp->user_id == $user->id && $resp->evaposresp->estado == 0)
                                                        {{--*/ $incorrecta +=count($pregunta) /*--}}
                                                        {{--*/ $totalIncorrectas +=count($resp) /*--}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
								@endforeach
								<th class="service">{{ $area->name }}</th>
								<th>{{ $correctas }}</th>
								<th>{{ $incorrecta }}</th>
                                <th>{{ $correctas / $users }}%</th>
                                <th>{{ $incorrecta / $users }}%</th>
							</tr>
                     	@endforeach    
                         <tr>
                            <th><strong>Porcentaje</strong></th>
                            <th><strong>{{ $totalCorrectas }}</strong></th>
                            <th><strong>{{ $totalIncorrectas }}</strong></th>
                            <th><strong>{{ $totalCorrectas / $users}}%</strong></th>
                            <th><strong>{{ $totalIncorrectas / $users}}%</strong></th>
                        </tr>
                        
                    </tbody>
                </table>
<footer>
Universidad ceprog Construimos tu futuro.
</footer>
</body>
</html>