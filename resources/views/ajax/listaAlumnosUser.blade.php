<div id="alumnosListUser" class="col-md-6 col-md-offset-1 alert ">
		
		<a href="{{ route('listActUser')}}" id="prb" class="alert"></a>   
    <a href="{{ route('getentry')}}" id="download" class="alert"></a>   
       @include('include.bucaralumno', ['submitButtonText' => 'Buscar'])
       <table class="table">
          <thead>
            <td><strong>Alumnos</strong></td>
            <td><strong>Actividades</strong></td>
          </thead> 
          <tbody id="tablaAlumnosList">
            
          </tbody>
       </table>

     </div>