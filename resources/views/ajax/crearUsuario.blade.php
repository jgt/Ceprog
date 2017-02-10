 <div Style="display:none" id="user" class="col-md-10 col-md-offset-1">
      
  
  <h2 align="center"> Crear Usuarios</h2>
  <hr>
  {!! Form::open(['route' => 'admin.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-create']) !!}

  
   <div class="form-group">
  {!! Form::label('name', 'Nombre: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'form', 'placeholder' => 'Nombre']) !!}
  </div>
   </div>
  <div class="form-group">
  {!! Form::label('cuenta', 'Cuenta: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
     {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'form', 'placeholder' => 'Cuenta']) !!}
  </div>
  </div>
   <div class="form-group">
  {!! Form::label('password', 'Contraseña: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     {!! Form::password('password', null, ['class' => 'form-control', 'id' => 'form']) !!}
   </div>
  </div>
  
   <div class="form-group">
  {!! Form::label('role_list', 'Rol:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <select name="role_list[]" id="roleSelect" class="form-control"></select>
   </div>
  </div>
    <div class="form-group" Style="diplay:none" id="userCarr">
  {!! Form::label('carrera_list', 'Carrera:', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <select name="carrera_list[]" class="form-control" id="crrs"></select>
   </div>
  </div>
  <div class="form-group" Style="diplay:none" id="userSem">
  {!! Form::label('semestre_list', 'Semestre: ', ['class' => 'control-label col-xs-3']) !!}
   <div class="col-xs-9">
     <select name="semestre_list[]" class="form-control" id="smes"></select>
   </div>
  </div>
 
  <div class="form-group" Style="diplay:none" id="userMat">
  {!! Form::label('materia', 'Materia: ', ['class' => 'control-label col-xs-3'])!!}
  <div class="col-xs-9">
     <select name="materia_list[]" class="form-control" id="mtausr" style="width:560px" multiple></select>
  </div>
  </div>
  <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
             {!! Form::submit('Crear', ['class' => 'btn btn-default', 'id' => 'submit']) !!}
        </div>
    </div>

  {!! Form::close() !!}

      
     </div>

     {!! Form::open(['route' => 'datosMaestro', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-admEnd', 'style' => 'display:none', 'enctype' => 'multipart/form-data']) !!}

  
   <div class="form-group">
  {!! Form::label('formacion', 'Formación : ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('formacion', null, ['class' => 'form-control', 'id' => 'admFormacion', 'placeholder' => 'Formación']) !!}
  </div>
   </div>
 
   <div class="form-group">
  {!! Form::label('celular', 'Numero cel. ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'admCelular', 'placeholder' => 'celular']) !!}
    {!! Form::text('user_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'admUserId']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('antiguedad', 'Antigüedad: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('antiguedad', null, ['class' => 'form-control', 'id' => 'admAnti', 'placeholder' => 'Antigüedad']) !!}
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
    <select name="campus[]" class="form-control" id="admSltCampus" style="width:700px" multiple></select>
   </div>
  </div>

   <div class="form-group">
  {!! Form::label('modelo', 'Clase modelo: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('modelo', null, ['class' => 'form-control', 'id' => 'admModelo', 'placeholder' => 'modelo']) !!}
  </div>
   </div>
  
   <div class="form-group">
  {!! Form::label('contrato', 'Contrato(periodo): ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('contrato', null, ['class' => 'form-control', 'id' => 'admCtn', 'placeholder' => 'contrato']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('entrevista', 'Entrevista director: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('entrevista', null, ['class' => 'form-control', 'id' => 'admEtr', 'placeholder' => 'Entrevista']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('identidad', 'Identidad institucional: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('identidad', null, ['class' => 'form-control', 'id' => 'admInd', 'placeholder' => 'Identidad institucional']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('planeacion', 'Planeacion: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('planeacion', null, ['class' => 'form-control', 'id' => 'admPla', 'placeholder' => 'Planeacion']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('erom', 'Erom: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('erom', null, ['class' => 'form-control', 'id' => 'admErom', 'placeholder' => 'Nombre']) !!}
  </div>
   </div>

   <div class="form-group">
  {!! Form::label('apa', 'Apa: ', ['class' => 'control-label col-xs-3']) !!}
  <div class="col-xs-9">
    {!! Form::text('apa', null, ['class' => 'form-control', 'id' => 'admApa', 'placeholder' => 'Apa']) !!}
  </div>
   </div>


    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            {!! Form::submit('Finalizar', ['class' => 'btn btn-default', 'id' => 'admCdoEnd']) !!}
        </div>
    </div>    
     </div>


 {!! Form::close() !!}