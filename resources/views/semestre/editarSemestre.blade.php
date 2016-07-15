@extends('template.Maestro')


@section('content')

<div class="header-admin"></div>

<h1 align="center" id="principal-role">Editar semestre</h1>
	
{!! Form::model($semestre, ['route' => ['semestre.update', $semestre->id], 'method' => 'PUT', 'form' => 'form-control']) !!}
	
	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
					
					 @include('errors.error')
					 
				 <div class="panel-body">
               {!! Form::open() !!}
                 <div class="form-group">
                     {!! Form::label('name', 'Semestre') !!}
                     {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
                 </div>
                  <div class="form-group">
   					{!! Form::label('materia_list', 'Materias') !!}
   					{!! Form::select('materia_list[]', $materias, null, [ 'id' => 'tag_list', 'class' => 'form-control', 'disabled']) !!}
</div>
             </div>

		</div>
	</div>
</div>

<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('editar', ['class' => 'btn btn-default']) !!}
	<a href="{{route('materia.index')}}" class="btn btn-warning">Retroceder</a>
    </div>


{!! Form::close() !!}

@stop


 @section('footer')
	
	@include('script.select')
	
    @stop