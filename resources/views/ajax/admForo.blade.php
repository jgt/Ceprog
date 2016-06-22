<div id="admForo"  Style="display:none">
 	
        
        {!! Form::open(['route' => 'foro.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-createForo']) !!}
  
           <div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default" id="usuario">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')

	
	{!! Form::label('name', 'Titulo:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'form']) !!}
	</div>

	</div>

	<div class="form-group" id="preguntaForo" Style="display:none">
		{!! Form::label('pregunta', 'Pregunta del foro:', ['class' => 'control-label col-xs-2']) !!}
		<div class="col-lg-10">
	{!! Form::text('pregunta', null, ['class' => 'form-control']) !!}
	</div>
	</div>

	<div class="form-group">
		{!! Form::label('tipo', 'Tipo de foro:', ['class' => 'control-label col-xs-2']) !!}
		<div class="col-lg-10">
	{!! Form::select('tipo', Config::get('foros.tipo'), null, ['class' => 'form-control', 'id' => 'tipForo']) !!}
	</div>
	</div>

	<div class="form-group">
	
	<div class="col-lg-10">
	{!! Form::text('materia_id', null, ['class' => 'form-control', 'id' => 'matForo', 'Style' => 'display:none']) !!}
	 <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
		<hr>
		{!! Form::submit('Crear foro', ['class' => 'btn btn-default', 'id' => 'admForoCrt']) !!}
	</div>


	</div>
	
	</div>
			</div>
		</div>
	</div>
</div>

  

        {!! Form::close() !!}

     </div>