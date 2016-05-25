<div id="listPersonal" class="col-md-10 col-md-offset-1" Style="display:none">
        
        <a href="{{route('admin.index')}}" id="admIndex" Style="display:none"></a>  
        <a href="{{route('admin.show')}}" id="adminShow" Style="display:none"></a>
        <a href="{{route('deleteU')}}" id="adminDelete" Style="display:none"></a>
        <a href="{{route('admin.edit')}}" id="adminEdit" Style="display:none"></a>

        @include('include.buscar', ['submitButtonText' => 'Buscar'])  
        <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Usuarios</strong></td>
            <td><strong>Ver</strong></td>
            <td><strong>Editar</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaPersonal">
          </tbody>
       </table>

       {!! $users->render() !!}
       
  </div>
     </div>