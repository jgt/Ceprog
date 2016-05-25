<div id="alumnosListUser" class="col-md-10 col-md-offset-1" Style="display:none">
		
		<a href="{{ route('listActUser')}}" id="prb" Style="display:none"></a>   
    <a href="{{ route('getentry')}}" id="download" Style="display:none"></a>   
       @include('include.bucaralumno', ['submitButtonText' => 'Buscar'])
       <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Alumnos</strong></td>
            <td><strong>Actividades</strong></td>
          </thead> 
          <tbody id="tablaAlumnosList">
            
          </tbody>
       </table>
      </div>
     </div>