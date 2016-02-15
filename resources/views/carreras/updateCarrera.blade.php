@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Editar Plan de estudio</h1>

@include('errors.error')
	
{!! Form::model($carrera, ['route' => ['carrera.update', $carrera ], 'method' => 'PUT', 'form' => 'form-control']) !!}
	
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
                     {!! Form::label('plan', 'Semestre') !!}
                     {!! Form::text('plan', null, ['class' => 'form-control' ]) !!}
                 </div>
                  <div class="form-group">
                     {!! Form::label('revoe', 'Clave') !!}
                     {!! Form::text('revoe', null, ['class' => 'form-control', 'rows' => '3' ]) !!}
                 </div>	
                  <div class="form-group">
   					{!! Form::label('semestre_list', 'Semestre : ') !!}
   					{!! Form::select('semestre_list[]', $semestres, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'disabled']) !!}
</div>
             </div>

		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('Editar', ['class' => 'btn btn-default']) !!}
      <a href="{{route('carrera.index')}}" class="btn btn-warning">Retroceder</a>
    </div>


{!! Form::close() !!}

@stop


 @section('footer')
	
	@include('script.select')
	
    @stop