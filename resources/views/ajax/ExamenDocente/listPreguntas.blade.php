<div id="listExaPregDocente" Style="display:none">
      
        <a href="{{ route('examenDocente.show')}}" Style="display:none" id="lstDocPreg"></a>
        <a href="{{ route('examenDocente.edit') }}" Style="display:none" id="editdocenteExa"></a>
        <a href="{{ route('edtPrtDoc') }}" Style="display:none" id="preguntaLts"></a>
        <a href="{{ route('borrarPreguntaDocente') }}" Style="display:none" id="deletePregDocente"></a>

        <a href="" Style="display:none" id="dltIdpreg"></a>
        <div class="table-responsive">
       <table class="table">
          <thead>
            <td>#</td>
            <td><strong>Nombre</strong></td>
            <td><strong>Editar</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tblPregDocente"></tbody>
       </table>
    </div>
    <a href="#" class="btn btn-warning" id="backListPreg">Atras</a>
     </div>