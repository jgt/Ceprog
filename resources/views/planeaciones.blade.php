@extends('template.Maestro')


<div class="col-md-8" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">Centro de Estudios Profesionales del Grijalva Campus Palenque
</h4>
    <br>
    
	<table class="table table-bordered">
		
		<tr>
			<td></td>
			<td>Nombre del docente</td>
			<td>Periodo escolar</td>
			<td>Carrera/Grupo</td>
			<td>Modulo</td>
			<td>Asignatura</td>
			<td>Fecha</td>
			<td>Objetivo General</td>
			<td>Asesor</td>
			<td>Reviso</td>

		</tr>	

		<tr>
			<td>{{ $planeacion->user->name}}</td>
			<td>{{ $planeacion->periodo}}</td>
			<td>{{ $planeacion->carrera}}</td>
			<td>{{ $planeacion->modulo}}</td>
			<td>{{ $planeacion->materia->name}}</td>
			<td>{{ $planeacion->fecha}}</td>
			<td>{{ $planeacion->objetivo}}</td>
			<td>{{ $planeacion->user->name}}</td>
			<td>COORDINADOR DOCENTE/ Mtro. Juan Carlos Feria Hernández DEPARTAMENTO DE INVESTIGACIÓN/ Mtro. Juan Alberto Jiménez Piña</td>

		</tr>

	</table>
	</div>

<div class="col-md-8" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">DOSIFICACIÓN CURRICULAR
</h4>
    <br>
    
	<table class="table table-bordered">
		
		<tr>
			<td></td>
			<td>Semana</td>
			<td>Objetivo</td>
			<td>Unidades(Es), temas y subtemas</td>
			<td>Bibliografia basica</td>

		</tr>	

		
			<tr>
			
			<td>Fecha 1</td>
			<td>{{ $planeacion->objetivoP}}</td>
			<td>{{ $planeacion->unidadesP}}</td>
			<td>{{ $planeacion->bibliografiaP}}</td>

		</tr>

		<tr>
			<td>Fecha 2</td>
			<td>{{ $planeacion->objetivoS}}</td>
			<td>{{ $planeacion->unidadesS}}</td>
			<td>{{ $planeacion->bibliografiaS}}</td>

		</tr>

		<tr>
			<td>Fecha 3</td>
			<td>{{ $planeacion->objetivoT}}</td>
			<td>{{ $planeacion->unidadesT}}</td>
			<td>{{ $planeacion->bibliografiaT}}</td>

		</tr>

		<tr>
			<td>Fecha 4</td>
			<td>{{ $planeacion->objetivoC}}</td>
			<td>{{ $planeacion->unidadesC}}</td>
			<td>{{ $planeacion->bibliografiaC}}</td>

		</tr>

		<tr>
			<td>Fecha 5</td>
			<td>{{ $planeacion->objetivoQ}}</td>
			<td>{{ $planeacion->unidadesQ}}</td>
			<td>{{ $planeacion->bibliografiaQ}}</td>

		</tr>


	</table>
	</div>
   <div class="col-md-8" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">ACTIVIDADES DE APRENDIZAJE
</h4>
    <br>

    <table class="table table-bordered">
		
		<tr>
			<td></td>
			<td>Semana</td>
			<td>Estrategias de enseñanza y de aprendizaje</td>
			<td>Criterios de evaluacion</td>

		</tr>	

		
			<tr>
			<td>Fecha 1</td>
			<td>{{ $planeacion->estrategiasP}}</td>
			<td>{{ $planeacion->criteriosP}}</td>

		</tr>

		<tr>
			<td>Fecha 2</td>
			<td>{{ $planeacion->estrategiasS}}</td>
			<td>{{ $planeacion->criteriosS}}</td>
		</tr>

		<tr>
			<td>Fecha 3</td>
			<td>{{ $planeacion->estrategiasT}}</td>
			<td>{{ $planeacion->criteriosT}}</td>
		</tr>

		<tr>
			<td>Fecha 4</td>
			<td>{{ $planeacion->estrategiasC}}</td>
			<td>{{ $planeacion->criteriosC}}</td>

		</tr>

		<tr>
			<td>Fecha 5</td>
			<td>{{ $planeacion->estrategiasQ}}</td>
			<td>{{ $planeacion->criteriosQ}}</td>

		</tr>


	</table>