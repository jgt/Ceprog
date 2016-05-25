<div id="listUnidades" class="col-md-10 col-md-offset-1" Style="display:none">
      
       <a href="{{ route('listplan')}}" id="uniList" Style="display:none"></a> 
       <a href="{{ route('portafolio')}}" id="port" Style="display:none"></a>
       <a href="{{ route('editSubtemas')}}" id="editSubtemas" Style="display:none"></a>
       <a href="{{ route('showVideos')}}" id="showVideosDocente" Style="display:none"></a>
       <a href="{{ route('delete')}}" id="deleteVideos" Style="display:none"></a>
       <a href="{{ route('pdf')}}" id="pdfunidad" Style="display:none"></a>
      
      <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Unidad</strong></td>
            <td><strong>Ver/Editar</strong></td>
            <td><strong>Lista de SubTemas</strong></td>
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
     </div>