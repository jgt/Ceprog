<div id="listPersonal"  Style="display:none">
        
        <a href="{{route('admin.index')}}" id="admIndex" Style="display:none"></a>  
        <a href="{{route('admin.show')}}" id="adminShow" Style="display:none"></a>
        <a href="{{route('deleteU')}}" id="adminDelete" Style="display:none"></a>
        <a href="{{route('admin.edit')}}" id="adminEdit" Style="display:none"></a>
        <a href="{{ route('picturePerfil') }}" id="pctrDownload" Style="display:none"></a>
        <a href="{{ route('notification') }}" id="notification" Style="display:none"></a>

       <table class="table table-bordered" id="users-table">
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Cuenta</th>
                <th>Acciones</th>
            </tr>
        </thead>

    </table>
      
     </div>