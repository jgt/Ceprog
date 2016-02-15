
<div id="modalListVideos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      {!!Form::text('promedio', null, ['class' => 'alert', 'id' => 'prmId'])!!}
      <div class="modal-body">
       <table class="table">
         <thead>
           <td><strong>Nombre</strong></td>
           <td><strong>Descargar</strong></td>
         </thead>
         <tbody id="tablaVideosList"></tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>