<div id="semm" class="col-md-10 col-md-offset-1" Style="display:none">
       
       <a href="{{ route('semestre.edit') }}" id="semmEdit" Style="display:none"></a>
       <a href="{{ route('borrarSemestre') }}" id="borrarSemm" Style="display:none"></a>
       <a href="{{ route('materia.show') }}" id="listMta" Style="display:none"></a>
       <a href="{{ route('alumnosSem') }}" id="almListSem" Style="display:none"></a>
       
       <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
       </div>
       <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Semestre</strong></td>
            <td><strong>Alumnos</strong></td>
            <td><strong>Editar Semestre</strong></td>
            <td><strong>Lista Materias</strong></td>
            <td><strong>Crear Materias</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaDataSemestre">
            
          </tbody>
       </table>
       <a href="#" id="backCarrera" class="btn btn-warning">Atras</a>

  </div>
     </div>