<div id="listExamenAdmin" Style="display:none">
      
        <a href="{{ route('listaPreguntasDocente')}}" Style="display:none" id="listPregDocente"></a>
        <a href="{{ route('examenDocente.edit') }}" Style="display:none" id="editdocenteExa"></a>
        <a href="{{ route('examenDocentePdf') }}" Style="display:none" id="exmDocPdf"></a>
        <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Nombre</strong></td>
            <td><strong>Editar</strong></td>
            <td><strong>Crear Pregunta</strong></td>
            <td><strong>Lista de preguntas</strong></td>
            <td><strong>Ver PDF</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaExamenesAdm"></tbody>
       </table>
    </div>
     </div>