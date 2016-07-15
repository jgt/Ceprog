
<div id="alumnoEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
     <a href="{{ route('reset')}}" id="edtAlm" Style="display:none"></a> 
     <a href="{{ route('addImg')}}" id="addImg" Style="display:none"></a>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       
       {!! Form::open(['route' => 'resetC', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'click-form', 'files' => true]) !!}
         <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  @include('errors.error')

   <div class="form-group">
  {!! Form::label('name', 'Nombre:', ['class' => 'form-group']) !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameUpdateAlm', 'disabled']) !!}
  {!! Form::text('authuser', Auth::user()->id, ['id' => 'clickAuth', 'Style' => 'display:none'])!!}
  <input type="text" id="udpUser" Style="display:none">
   </div>

    <div class="form-group">
  {!! Form::label('cuenta', 'Numero de cuenta:', ['class' => 'form-group']) !!}
  {!! Form::text('cuenta', null, ['class' => 'form-control', 'id' => 'cuentaUpdateAlm', 'disabled']) !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('password', 'Password:', ['class' => 'form-group']) !!}
  {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('archivo', 'Imagen de perfil ', ['class' => 'form-group']) !!}
    {!! Form::file('archivo', null, ['class' => 'form-control'])!!}
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <a href="#" class="btn btn-primary" id="clickUpdate">Editar</a>
      </div>
    </div>
     {!! Form::close() !!}
  </div>
 
</div>