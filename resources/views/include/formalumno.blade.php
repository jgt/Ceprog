
@extends('template.default')

@section('content')

<div class="header"></div>

@include('include.menualumnos')

<div  class="container optimal">
   <div class="row">
       <div  class="col col-md-6 col-md-offset-3" id="mensaje" >
           <div class="panel panel-default">
             <div class="panel-heading"><h3 class="panel-title">Correo</h3></div>
             <div class="panel-body">
               {!! Form::open(['route' => 'email.store', 'method' => 'post']) !!}
                  <div class="form-group">
                     {!! Form::label('name', 'Nombre') !!}
                     {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
                 </div>

                 <div class="form-group">
                     {!! Form::label('email', 'E-Mail') !!}
                     {!! Form::email('email', null, ['class' => 'form-control' ]) !!}
                 </div>
                 <div class="form-group">
                     {!! Form::label('mensaje', 'Mensaje') !!}
                     {!! Form::textarea('mensaje', null, ['class' => 'form-control' ]) !!}
                 </div>
                 <div class="form-group">
                    {!! Form::label('user', 'Alumno', ['class' => 'control-label col-xs-2']) !!}
                    {!! Form::select('user[]', $user, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
                 </div>
          
                 <div class="form-group">
                     {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                 </div>
               {!! Form::close() !!}
             </div>
           </div>
        </div>
   </div>
</div>

@stop


@section('footer')

@include('script.select')


@stop