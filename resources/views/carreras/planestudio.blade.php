@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Crear Carrera</h1>

@include('errors.error')
	
{!! Form::open(['route' => 'carrera.store', 'method' => 'POST', 'form' => 'form-control']) !!}
	
	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				 <div class="panel-body">
               {!! Form::open() !!}
                 <div class="form-group">
                     {!! Form::label('name', 'Nombre de la carrera') !!}
                     {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
                 </div>
                 <div class="form-group">
                     {!! Form::label('plan', 'Plan') !!}
                     {!! Form::text('plan', null, ['class' => 'form-control' ]) !!}
                 </div>
                  <div class="form-group">
                     {!! Form::label('revoe', 'Clave') !!}
                     {!! Form::text('revoe', null, ['class' => 'form-control', 'rows' => '3' ]) !!}
                 </div>	
             </div>

		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('Crear plan', ['class' => 'btn btn-default']) !!}
     <a href="{{route('menu')}}" class="btn btn-warning">Ir al menu principal</a>

    </div>


{!! Form::close() !!}

@stop


 @section('footer')
	
	@include('script.select')
	
    @stop