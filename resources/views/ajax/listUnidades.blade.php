<div id="listUnidades" class="col-md-6 col-md-offset-1 alert">
      
       <a href="{{ route('listplan')}}" id="uniList" class="alert"></a> 
       <a href="{{ route('portafolio')}}" id="port" class="alert"></a>
       <a href="{{ route('editSubtemas')}}" id="editSubtemas" class="alert"></a>
       <a href="{{ route('showVideos')}}" id="showVideosDocente" class="alert"></a>
       <a href="{{ route('delete')}}" id="deleteVideos" class="alert"></a>
       <a href="{{ route('pdf')}}" id="pdfunidad" class="alert"></a>

       <table class="table">
          <thead>
            <td><strong>Unidad</strong></td>
            <td><strong>Ver/Editar</strong></td>
            <td><strong>Editar SubTemas</strong></td>
            <td><strong>Crear subtemas</strong></td>
            <td><strong>Crear Actividad</strong></td>
            <td><strong>Ver Actividades</strong></td>
            <td><strong>Videos</strong></td>
            <td><strong>Lista de videos</strong></td>
            <td><strong>Ver Pdf</strong></td>
          </thead> 
          <tbody id="tablaUnidad">
            
          </tbody>
       </table>

     </div>