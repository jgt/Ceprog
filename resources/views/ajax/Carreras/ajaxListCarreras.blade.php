<div id="crr" class="col-md-10 col-md-offset-1" Style="display:none">
       
       <a href="{{ route('carrera.index')}}" id="craList" Style="display:none"></a>
       <a href="{{ route('carrera.edit')}}" id="editcrra" Style="display:none"></a>
       <a href="{{ route('deleteCarrera')}}" id="crrDelete" Style="display:nonde"></a>
       <a href="{{ route('semestre.show')}}" id="smeList" Style="display:none"></a>
       <a href="{{ route('matDelete')}}" id="matDelete" Style="display:none"></a>
       <a href="{{ route('updatePreguntaDocente')}}" id="uptPregDoc" Style="display:none"></a>

       <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
       </div>
       <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Carrera</strong></td>
            <td><strong>Crear Semestre</strong></td>
            <td><strong>Editar Carrera</strong></td>
            <td><strong>Lista Semestres</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaDataCarrera">
            
          </tbody>
       </table>
  </div>
     </div>