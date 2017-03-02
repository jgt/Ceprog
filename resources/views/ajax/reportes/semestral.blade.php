 <div Style="display:none" id="showRpt" class="col-md-10 col-md-offset-1">
      
  
  <h2 align="center"> Crear reporte</h2>
  <hr>
  {!! Form::open(['route' => 'rptSemestral', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'form-rptSemestral']) !!}
  
   <div class="form-group">
  {!! Form::label('docente', 'Docente: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('docente', null, ['class' => 'form-control', 'id' => 'docSemestral', 'readonly' => 'readonly']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('nivel', 'Nivel: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('nivel', null, ['class' => 'form-control', 'id' => 'nvlSemestral', 'placeholder' => 'Nivel']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('programa', 'Programa: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('programa', null, ['class' => 'form-control', 'id' => 'prgSemestral', 'readonly' => 'readonly']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('materia', 'Materia: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('materia', null, ['class' => 'form-control', 'id' => 'mtaNamesem', 'readonly' => 'readonly']) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('semestre', 'Semestre:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('semestre', null, ['class' => 'form-control', 'id' => 'semSemestral', 'readonly' => 'readonly']) !!}
   </div>
  </div>
    <div class="form-group">
  {!! Form::label('grupo', 'Grupo:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('grupo', null, ['class' => 'form-control', 'id' => 'grpGrupo', 'placeholder' => 'Grupo']) !!}
   </div>
  </div>
  <div class="form-group">
  {!! Form::label('d1', 'Falta 1: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('d1', null, ['class' => 'form-control', 'id' => 'd1Sem', 'placeholder' => 'Falta 1']) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('d2', 'Falta 2: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('d2', null, ['class' => 'form-control', 'id' => 'd2Sem', 'placeholder' => 'Falta 2']) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('d3', 'Falta 3: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('d3', null, ['class' => 'form-control', 'id' => 'd3Sem', 'placeholder' => 'Falta 3']) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('d4', 'Falta 4: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('d4', null, ['class' => 'form-control', 'id' => 'd4Sem', 'placeholder' => 'Falta 4']) !!}
   </div>
  </div>
   <div class="form-group">
  {!! Form::label('d5', 'Falta 5: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('d5', null, ['class' => 'form-control', 'id' => 'd5Sem', 'placeholder' => 'Falta 5']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('planeacion', 'Planeacion: ', ['class' => 'control-label col-xs-3'])!!}
  <div class="col-xs-9">
     {!! Form::text('planeacion', null, ['class' => 'form-control', 'id' => 'planSemestral', 'placeholder' => 'Planeacion'])!!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('guiaT', 'Guia Tematica:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('guiaT', null, ['class' => 'form-control', 'id' => 'guiaSem', 'placeholder' => 'Guia Tematica']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('examen', 'Examen:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('examen', null, ['class' => 'form-control', 'id' => 'exaSem', 'placeholder' => 'Examen']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('controlG', 'Control de Grupo:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('controlG', null, ['class' => 'form-control', 'id' => 'ctrGrupo', 'placeholder' => 'Control de Grupo']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('examenActa', 'Acta de Examen:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('examenActa', null, ['class' => 'form-control', 'id' => 'actSemestral', 'placeholder' => 'Acta de Examen']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('rptAlumnos', 'Alumnos reprobados', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('examenActa', null, ['class' => 'form-control', 'id' => 'rptAlumnos', 'placeholder' => 'Alumnos reprobados']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('reunionUno', 'Reunion 1:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('reunionUno', null, ['class' => 'form-control', 'id' => 'reunionUno', 'placeholder' => 'Reunion 1']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('reunionDos', 'Reunion 2:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('reunionDos', null, ['class' => 'form-control', 'id' => 'reunionDos','placeholder' => 'Reunion 2']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('reunionTres', 'Reunion 3:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('reunionTres', null, ['class' => 'form-control', 'id' => 'reunionTres', 'placeholder' => 'Reunion 3']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('reunionCuatro', 'Reunion 4:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('reunionCuatro', null, ['class' => 'form-control', 'id' => 'reunionCuatro', 'placeholder' => 'Reunion 4']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('reunionCinco', 'Reunion 5:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('reunionCinco', null, ['class' => 'form-control', 'id' => 'reunionCinco', 'placeholder' => 'Reunion 5']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('remite', 'Remite:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('remite', null, ['class' => 'form-control', 'id' => 'remiteSem', 'placeholder' => 'Remite']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('asunto', 'Asunto:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('asunto', null, ['class' => 'form-control', 'id' => 'asuntoSem', 'placeholder' => 'Asunto']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('solucion', 'Solucion:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::textarea('solucion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'solSem']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('estatus', 'Estatus:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('estatus', null, ['class' => 'form-control', 'id' => 'status', 'placeholder' => 'Estatus']) !!}
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('observacionUno', 'Observacion 1:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('observacionUno', null, ['class' => 'form-control', 'id' => 'observacionUno', 'placeholder' => 'Observacion 1']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('observacionDos', 'Observacion 2:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('observacionDos', null, ['class' => 'form-control', 'id' => 'observacionDos', 'placeholder' => 'Observacion 2']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('observacionTres', 'Observacion 3:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('observacionTres', null, ['class' => 'form-control', 'id' => 'observacionTres', 'placeholder' => 'Observacion 3']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('observacionCuatro', 'Observacion 4:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('observacionCuatro', null, ['class' => 'form-control', 'id' => 'observacionCuatro', 'placeholder' => 'Observacion 4']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('observacionCinco', 'Observacion 5:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('observacionCinco', null, ['class' => 'form-control', 'id' => 'observacionCinco', 'placeholder' => 'Observacion 5']) !!}
   </div>
  </div>

  <div class="form-group">
  {!! Form::label('opnEstudiante', 'Opinion Estudiantil:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::text('opnEstudiante', null, ['class' => 'form-control', 'id' => 'opnAlm', 'placeholder' => 'Opinion Estudiantil']) !!}
   </div>
  </div>

  <div class="form-group">
     {!! Form::text('datos_docente_id', null, ['class' => 'form-control', 'id' => 'docId', 'style' => 'display:none']) !!}
  </div>

  <div class="form-group">
     {!! Form::text('materia_id', null, ['class' => 'form-control', 'style' => 'display:none', 'id' => 'mtaIdsem']) !!}
  </div>

   <div class="form-group">
     {!! Form::text('datos_docente_id', null, ['class' => 'form-control', 'style' => 'display:none', 'id' => 'userSemid']) !!}
  </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Crear reporte', ['class' => 'btn btn-default', 'id' => 'crt-rptSem']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>