
@if($errors->any())

<div class="row">
	<div class="panel-body">
<div class="alert alert-danger" role="alert">

	<p>porfavor corrige los errores</p>
	<br>
	<ul>
		
		@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

		@endforeach

	</ul>
		</div>
			</div>
	</div>
	@endif
	