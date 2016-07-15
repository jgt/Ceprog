
<div id="modalCalificacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      
      <a href="{{ route('cloTutores')}}" Style="display:none" id="clotutores"></a>
      <a href="{{ route('nto')}}" Style="display:none" id="ntoAct"></a>

       <table class="table">
         <thead>

           <td><strong>Actividades</strong></td>
           <td><strong>Nota</strong></td>
         
         </thead>
         <tbody id="tablaCalificacion"></tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>