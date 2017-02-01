 <div Style="display:none" id="cdoCrTdoc" class="col-md-8 col-md-offset-1">
  
  <h2 align="center"> Crear Docente</h2>
  <hr>
  {!! Form::open(['route' => 'cdoStore', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-cdoDocente']) !!}
  
   <div class="form-group">
  {!! Form::label('name', 'Nombre: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'cdoName', 'placeholder' => 'Nombre']) !!}
  </div>
   </div>

  <div class="form-group">
  {!! Form::label('cuenta', 'Cuenta: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::email('cuenta', null, ['class' => 'form-control', 'id' => 'cdoCuenta', 'placeholder' => 'Cuenta']) !!}
  </div>
  </div>

   <div class="form-group">
  {!! Form::label('password', 'Contraseña: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::password('password', null, ['class' => 'form-control', 'id' => 'cdoPass', 'placeholder' => 'Contraseña']) !!}
   </div>
  </div>
   
    <div class="form-group">
  {!! Form::label('materia_list', 'Materia:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
    <select name="materia_list[]" class="form-control" id="cdoMta" style="width:440px" multiple></select>
   </div>
  </div>

  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Siguente', ['class' => 'btn btn-default', 'id' => 'cdoNewDoc']) !!}
        </div>
    </div>

    {!! Form::close() !!}
  
  {!! Form::open(['route' => 'datosMaestro', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-cdoEnd', 'style' => 'display:none', 'enctype' => 'multipart/form-data']) !!}

  
   <div class="form-group">
  {!! Form::label('formacion', 'Formación : ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('formacion', null, ['class' => 'form-control', 'id' => 'cdoFormacion', 'placeholder' => 'Formación']) !!}
  </div>
   </div>
 
   <div class="form-group">
  {!! Form::label('celular', 'Numero cel. ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'cdoCelular', 'placeholder' => 'celular']) !!}
    {!! Form::text('user_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'cdoUserId']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('antiguedad', 'Antigüedad: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('antiguedad', null, ['class' => 'form-control', 'id' => 'cdoAnti', 'placeholder' => 'Antigüedad']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('curriculum', 'Curriculum actualizado: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::file('curriculum', null, ['class' => 'form-control', 'id' => 'cdoVitae', 'placeholder' => 'Curriculum']) !!}
  </div>
   </div>

  <div class="form-group">
  {!! Form::label('campus', 'Elige el campus:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
    <select name="campus[]" class="form-control" id="sltCampus" style="width:440px" multiple></select>
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('modelo', 'Clase modelo: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('modelo', null, ['class' => 'form-control', 'id' => 'cdoModelo', 'placeholder' => 'modelo']) !!}
  </div>
   </div>
  
   <div class="form-group">
  {!! Form::label('contrato', 'Contrato(periodo): ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('contrato', null, ['class' => 'form-control', 'id' => 'cdoCtn', 'placeholder' => 'contrato']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('entrevista', 'Entrevista director: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('entrevista', null, ['class' => 'form-control', 'id' => 'cdoEtr', 'placeholder' => 'Entrevista']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('identidad', 'Identidad institucional: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('identidad', null, ['class' => 'form-control', 'id' => 'cdoInd', 'placeholder' => 'Identidad institucional']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('planeacion', 'Planeacion: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('planeacion', null, ['class' => 'form-control', 'id' => 'cdoPla', 'placeholder' => 'Planeacion']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('erom', 'Erom: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('erom', null, ['class' => 'form-control', 'id' => 'cdoErom', 'placeholder' => 'Nombre']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('apa', 'Apa: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('apa', null, ['class' => 'form-control', 'id' => 'cdoApa', 'placeholder' => 'Apa']) !!}
  </div>
   </div>


    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Finalizar', ['class' => 'btn btn-default', 'Style' => 'display:none', 'id' => 'cdoEnd']) !!}
        </div>
    </div>    
     </div>


 {!! Form::close() !!}