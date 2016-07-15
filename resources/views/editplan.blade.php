<div class="col-md-12" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">PLANEACIÓN DOCENTE 
MODALIDAD SEMIESCOLARIZADO
</h4>
    <br>
    </div>
  <div class="col-xs-2">
    {!! Form::label('user_id', 'Nombre del Docente')!!}
	{!! Form::select('user_id', [$user->id => $user->name], null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-3">
    {!! Form::label('periodo', 'Perido Escolar')!!}
	{!! Form::text('periodo', null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-3">
   	{!! Form::label('carrera', 'Carrera/Grupo')!!}
  	{!! Form::select('carrera', [$planeacion->materia->semestre->name], null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-1">
     {!! Form::label('modulo', 'Modulo')!!}
  {!! Form::text('modulo', null, ['class' => 'form-control'])!!}
  </div>
 <div class="col-xs-2">
    {!! Form::label('materia_id', 'Asignatura')!!}
	{!! Form::select('materia_id',[$planeacion->materia->id => $planeacion->materia->name], null, ['class' => 'form-control'])!!}
  </div>
   <div class="col-xs-2">
    {!! Form::label('fecha', 'Fecha de Entrega')!!}
  {!! Form::date('fecha', null, ['class' => 'form-control'])!!}
  </div>
  <div class="col-xs-5">
  	 {!! Form::label('objetivo', 'Objetivo General')!!}
	{!! Form::textarea('objetivo', null, ['class' => 'form-control', 'rows' => '3'])!!}
  </div>
<div class="col-md-8" id="reinscripcion">
    <hr>
    <h4 class="titulo-reinscripcion">DOSIFICACIÓN CURRICULAR
</h4>
    <br>
    
	<table class="table table-bordered">
		
		<tr>
			<td>{!! Form::label('semana', 'Semana')!!}</td>
			<td>{!! Form::label('objetivo', 'Objetivo')!!}</td>
			<td>{!! Form::label('unidades', 'Unidades(Es), temas y subtemas')!!}</td>
			<td>{!! Form::label('bibliografia', 'Bibliografia basica')!!}</td>

		</tr>	

		
			<tr>
			
			<td>Fecha 1</td>
			<td>{!! Form::textarea('objetivoP', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('unidadesP', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('bibliografiaP', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>

		<tr>
			
			<td>Fecha 2</td>
			<td>{!! Form::textarea('objetivoS', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('unidadesS', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('bibliografiaS', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>

		<tr>
			
			<td>Fecha 3</td>
			<td>{!! Form::textarea('objetivoT', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('unidadesT', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('bibliografiaT', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>

		<tr>
			
			<td>Fecha 4</td>
			<td>{!! Form::textarea('objetivoC', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('unidadesC', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('bibliografiaC', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

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
			<td>{!! Form::label('semana', 'Semana')!!}</td>
			<td>{!! Form::label('estrategias', 'Estrategias de enseñanza y de aprendizaje')!!}</td>
			<td>{!! Form::label('evaluacion', 'Criterios de evaluacion')!!}</td>

		</tr>	

		
			<tr>
			
			<td>Fecha 1</td>
			<td>{!! Form::textarea('estrategiasP', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('criteriosP', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>

		<tr>
			
			<td>Fecha 2</td>
			<td>{!! Form::textarea('estrategiasS', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('criteriosS', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>

		<tr>
			
			<td>Fecha 3</td>
			<td>{!! Form::textarea('estrategiasT', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('criteriosT', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>

		<tr>
			
			<td>Fecha 4</td>
			<td>{!! Form::textarea('estrategiasC', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>
			<td>{!! Form::textarea('criteriosC', null, ['class' => 'form-control', 'rows' => '2'])!!}</td>

		</tr>


	</table>

	<div class="col-xs-4">
    {!! Form::label('asesor', 'Elaboro el asesor')!!}
	{!! Form::select('asesor',[$user->id => $user->name], null, ['class' => 'form-control'])!!}
  </div>
  <br> <br> <br>
  <div class="">
   <h3>Reviso</h3>
   <p>COORDINADOR DOCENTE/ Mtro. Juan Carlos Feria Hernández DEPARTAMENTO DE INVESTIGACIÓN/ Mtro. Juan Alberto Jiménez Piña 
</p>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-success ' ] ) !!}
  </div>
<br> <br>


@section('footer')
	
	@include('script.select')
	
    @stop
  