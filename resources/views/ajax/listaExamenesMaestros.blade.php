<div id="listExamenDocente"  Style="display:none">
        <div class="table-responsive">
      
        <a href="{{ route('deleteExamen')}}" id="deleteEx" Style="display:none"></a>
        <a href="{{ route('editarExamen')}}" id="editExamen" Style="display:none"></a>
        <a href="{{ route('updateExamen')}}" id="updateExamen" Style="display:none"></a>
        <a href="{{ route('listPreguntas')}}" id="listPreguntas" Style="display:none"></a>
        <a href="{{ route('examenPreguntas')}}" id="examenPreguntas" Style="display:none"></a>
        <a href="{{ route('exmImprimirPdf') }}" id="exmPdf" Style="display:none"></a>

       <table class="table">
          <thead>
            <td><strong>Modulo</strong></td>
            <td><strong>Editar</strong></td>
            <td><strong>Crea Preguntas</strong></td>
            <td><strong>Preguntas</strong></td>
            <td><strong>Hoja de Respuestas</strong></td>
            <td><strong>Examen Pdf</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaExamenesDocente"></tbody>
       </table>
    </div>
     </div>