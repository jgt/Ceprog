<div id="alumnosListUser" Style="display:none">
		
		<a href="{{ route('listActUser')}}" id="prb" Style="display:none"></a>   
    <a href="{{ route('getentry')}}" id="download" Style="display:none"></a> 
    <a href="{{ route('reporteUser')}}" id="reportePdf" Style="display:none"></a>  
    
       @include('include.bucaralumno', ['submitButtonText' => 'Buscar'])
       <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Alumnos</strong></td>
            <td><strong>Carrera</strong></td>
            <td><strong>Actividades</strong></td>
            <td><strong>Reportes</strong></td>
          </thead> 
          <tbody id="tablaAlumnosList">
            
          </tbody>
       </table>
      </div>
     </div>