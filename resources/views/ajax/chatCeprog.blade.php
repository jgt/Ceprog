<div  id="chatForo" Style="display:none">
	   
       <a href="{{ route('showForo')}}" id="showForo" Style="display:none"></a>
	<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a id="bchat" href="http://www.jquery2dotnet.com"><span  class="glyphicon glyphicon-refresh">
                            </span>Borrar mensajes</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="panel-body"  id="mchat"></div>

                <div class="panel-footer">
                    <div class="input-group">
                    	{!! Form::open(['route' => 'preguntas', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'fmchat']) !!}

								
										@include('errors.error')
										
										{!! Form::textarea('comment', null, ['class' => 'form-control input-sm', 'rows' => '3', 'placeholder' => 'maximo de palabras es de 250...', 'id' => 'btn-input']) !!}
										{!! Form::text('foroId', null, ['id' => 'foroId', 'Style' => 'display:none'])!!}
                                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
										<a href="{{ route('comentario')}}" id="comentForo" Style="display:none"></a>
                        <span class="input-group-btn">
                        	<hr>
                           {!! Form::submit('Comentar', ['class' => 'btn btn-warning btn-sm', 'id' => 'btn-chat']) !!}

                        </span>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


</div>