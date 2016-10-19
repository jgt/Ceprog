<div id="listRec" class="col-md-10 col-md-offset-1" Style="display:none">
        
        <a href="{{ route('recursos.show') }}" Style="display:none" id="recursoShow"></a>
        <a href="{{ route('downloadRecursos') }}" Style="display:none" id="downloadRecursos"></a>
        <a href="{{ route('deleteRecurso') }}" Style="display:none" id="deleteRecurso"></a>
        <a href="{{ route('recursos.index') }}" Style="display:none" id="allRecursos"></a>
        <a href="{{ route('recursos.edit') }}" Style="display:none" id="updateRecursos"></a>

       <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
       </div>
       <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Nombre</strong></td>
            <td><strong>Editar</strong></td>
            <td><strong>Descripcion</strong></td>
            <td><strong>Ver video/archivo</strong></td>
            <td><strong>Descargar</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaRecurso">
            
          </tbody>
       </table>
  </div>
     </div>