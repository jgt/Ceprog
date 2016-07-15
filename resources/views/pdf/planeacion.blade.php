<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>domppdf</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portal UC</title>
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">


</head>
<body>
	
	
	<div>
    <hr>
    <h4>Centro de Estudios Profesionales del Grijalva Campus Palenque
</h4>
    <br>
 
	<table>
		
		<tr>
			
			<th scope="col">Nombre del Actividad</th>
			<th scope="col">Estrategia</th>
			<th scope="col">Cognoscitivo</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Valor Actividad</th>
			<th scope="col">Unidad</th>
			<th scope="col">Evidencia</th>
			<th scope="col">Caracteristicas</th>
			<th scope="col">Realizacion</th>
			<th scope="col">Codigo actividad</th>

		</tr>	

		<tr>
			
			<td>{{ $actividad->actividad}}</td>
			<td>{{ $actividad->estrategia}}</td>
			<td>{{ $actividad->cognoscitivo}}</td>
			<td>{{ $actividad->descripcion}}</td>
			<td>{{ $actividad->valoractividad}}</td>
			<td>{{ $actividad->unidad}}</td>
			<td>{{ $actividad->evidencia}}</td>
			<td>{{ $actividad->caracteristicas}}</td>
			<td>{{ $actividad->realizacion}}</td>
			<td>{{ $actividad->codigoactividad}}</td>

		</tr>

	</table>
	</div>

<div>
    
	</table>

</body>
</html>