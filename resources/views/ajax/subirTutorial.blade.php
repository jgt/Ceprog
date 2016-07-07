 <div  Style="display:none" id="tutoriales">
  {!! Form::open(['route' => 'storeTutorial', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
       <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  

      <div class="col-md-6 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading"></div>
           <div class="panel-body">

           <a href="{{ route('storeTutorial')}}" id="tro" Style="display:none"></a>
        <a href="{{ route('role.index')}}" id="listRole" Style="display:none"></a>

  <div class="form-group">

   {!! Form::label('role_list', 'Role: ', ['class' => 'col-lg-2 control-label']) !!}
   
   {!! Form::select('role_list[]', $roles, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}

   </div>

  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control'])!!}
   <hr>
   <div class="progress progress-striped active">
     <div class="progress-bar" style="width:0%"></div>
   </div>
   <hr>
   {!! Form::submit('Responder', ['class' => 'btn btn-sm btn btn-info upload'])!!}
   <button type="button" class="btn btn-sm btn btn-danger cancel">Cancelar</button>
   </div>
   
            
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>