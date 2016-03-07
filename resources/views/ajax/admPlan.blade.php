<div id="adminPlan" class="col-md-10 col-md-offset-1 alert">
 
        
        {!! Form::open(['route' => 'carrera.store', 'method' => 'POST', 'form' => 'form-control', 'id' => 'form-plan' ]) !!}
  
           <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default" id="usuario">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <div class="form-group">

                        @include('errors.error')

    
    <div class="form-group">
         {!! Form::label('name', 'Nombre de la carrera') !!}
         {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
     </div>

    </div>

   <div class="form-group">
         {!! Form::label('plan', 'Plan') !!}
        {!! Form::text('plan', null, ['class' => 'form-control' ]) !!}
     </div>


<div class="form-group">
        {!! Form::label('revoe', 'Clave') !!}
        {!! Form::text('revoe', null, ['class' => 'form-control', 'rows' => '3' ]) !!}
</div> 
 <hr>
    {!! Form::submit('Crear Plan', ['class' => 'btn btn-default', 'id' => 'crePlan']) !!}

    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        {!! Form::close() !!}

     </div>