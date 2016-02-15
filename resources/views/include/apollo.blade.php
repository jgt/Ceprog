<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"></div>

        <div class="panel-body">
        
            @include('errors.error')


  <div class="form-group">
  {!! Form::label('usuario', 'Nombre: ', ['class' => 'form-group']) !!}

  {!! Form::text('usuario', $users->name, null, ['class' => 'form-control']) !!}
    </div>
  
  <div class="form-group">
   {!! Form::label('mensaje', 'Mensaje: ', ['class' => 'form-group']) !!}
    
   {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'rows' => '1']) !!}
   </div>

   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control']) !!}
   <hr>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    <a href="{{ route('portafolio', $actividad->materia)}}" class=" btn btn-warning">Retroceder</a>
   </div>

        </div>

      </div>
    </div>
     <div class="col-md-4 col-md-offset-1">

          <h2 class="tamaños" id="color-letra" align="center">Tips!!</h2>
          <hr>
          <ul>
            <li><p id="color-letra">Puedes subir un archivo de cualquier formato para tus estudiantes.</p></li>
            <li><p id="color-letra">Solo tienes que escribir un mensaje y elegir tu archivo.</p></li>
            <li><p id="color-letra">Si quieres ver el archivo que subiste puedes dar clic <a href="{{ url('/materialApoyo')}}">Aqui</a> o puedes ingesar desde el menu principal.</li>
          </ul>
        </div>
  </div>
</div>

<div class="col-xs-offset-2 col-xs-10">


    </div>


    @section('footer')
  
  @include('script.select')
  
    @stop