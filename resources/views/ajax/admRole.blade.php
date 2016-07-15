<div id="admRole"  Style="display:none">
 
        
        {!! Form::open(['route' => 'role.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' =>'form-createRole']) !!}
  			 <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
           <div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default" id="usuario">
				<div class="panel-heading"></div>

				<div class="panel-body">
					<div class="form-group">

						@include('errors.error')

	
	{!! Form::label('name', 'Nombre:', ['class' => 'control-label col-xs-2']) !!}

		<div class="col-lg-10">
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	</div>

	<div class="form-group">
	
	{!! Form::label('slug', 'Slug:', ['class' => 'col-lg-2 control-label']) !!}

	<div class="col-lg-10">
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
	</div>


	</div>
	<div class="col-xs-offset-2 col-xs-10">

     {!! Form::submit('Crear Role', ['class' => 'btn btn-default', 'id' => 'creRole']) !!}
    </div>
				</div>
			</div>
		</div>
	</div>
</div>

  

        {!! Form::close() !!}

     </div>