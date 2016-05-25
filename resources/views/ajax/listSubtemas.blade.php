<div id="listSubtemas" class="col-md-10 col-md-offset-1" Style="display:none">


		<a href="{{ route('updateSubtemas')}}" id="updateSubtemas" Style="display:none"></a>
    <a href="{{ route('deleteSubtemas')}}" id="deleteSub" Style="display:none"></a>
    <a href="{{ route('showSubtema')}}" id="showSubtema" Style="display:none"></a>
    <a href="{{ route('listImagenes')}}" id="imgList" Style="display:none"></a>
    <a href="{{ route('borrarImg')}}" id="imgBorrar" Style="display:none"></a>
      
      <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Subtemas</strong></td>
            <td><strong>Ver/Editar</strong></td>
            <td><strong>Subir Imagen</strong></td>
            <td><strong>lista Imagenes</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaSubtemas">
            
          </tbody>
       </table>
      </div>
     </div>