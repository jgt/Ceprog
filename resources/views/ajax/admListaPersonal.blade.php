<div id="listPersonal" class="col-md-6 col-md-offset-1 alert">
        
        <a href="{{route('admin.index')}}" id="admIndex" class="alert"></a>  
        <a href="{{route('admin.show')}}" id="adminShow" class="alert"></a>
        <a href="{{route('deleteU')}}" id="adminDelete" class="alert"></a>
        <a href="{{route('admin.edit')}}" id="adminEdit" class="alert"></a>

        @include('include.buscar', ['submitButtonText' => 'Buscar'])  

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