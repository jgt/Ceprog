<div id="listSubtemas" class="col-md-6 col-md-offset-1 alert">


		<a href="{{ route('updateSubtemas')}}" id="updateSubtemas" class="alert"></a>
    <a href="{{ route('deleteSubtemas')}}" id="deleteSub" class="alert"></a>
    <a href="{{ route('showSubtema')}}" id="showSubtema" class="alert"></a>
    <a href="{{ route('listImagenes')}}" id="imgList" class="alert"></a>
    <a href="{{ route('borrarImg')}}" id="imgBorrar" class="alert"></a>
      
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