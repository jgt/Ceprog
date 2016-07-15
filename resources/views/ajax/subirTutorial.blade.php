 <div  Style="display:none" id="tutoriales">
  {!! Form::open(['route' => 'storeTutorial', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'form-tuto']) !!}
       <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  

      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading"></div>
           <div class="panel-body">

           <a href="{{ route('storeTutorial')}}" id="tro" Style="display:none"></a>
        <a href="{{ route('role.index')}}" id="listRole" Style="display:none"></a>

  <div class="form-group">

   {!! Form::label('role_list', 'Role: ', ['class' => 'form-group']) !!}
   
   {!! Form::select('role_list[]', $roles, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}

   </div>
    
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control'])!!}
   <hr>
   {!! Form::submit('Subir archivo', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'tutUp'])!!}
   </div>
   
            
        </div>
      </div>
    </div>

  {!! Form::close() !!}

</div>