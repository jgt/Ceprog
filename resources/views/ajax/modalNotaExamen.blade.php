<div id="notaExamen" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      
      <a href="{{ route('notaExamen')}}" id="ntoExamen" Style="display:none"></a>

       <table class="table">
         <thead>
  
           <td><strong>Examen</strong></td>
           <td><strong>Nota</strong></td>
          
         </thead>
         <tbody id="tablaNexamen"></tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>