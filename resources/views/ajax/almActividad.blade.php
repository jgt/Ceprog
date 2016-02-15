<div id="Almact" class="col-md-6 col-md-offset-1 alert">
        
        <a href="{{ Auth::user()}}" id="AuthUser" class="alert"></a>
        <a href="{{ route('pdf')}}" id="pdfAct" class="alert"></a>
        <a href="{{ route('fileentry')}}" id="fileentry" class="alert"></a>
        <a href="{{ route('borrar')}}" id="borrarA" class="alert"></a>
        <a href="{{ route('material')}}" id="materialAlm" class="alert"></a>
        <a href="" id="a" class="alert"></a>

       <table class="table">
          <thead>
            <td><strong>Actividad</strong></td>
            <td><strong>Responder actividad</strong></td>
            <td><strong>Material de Apoyo</strong></td>
            <td><strong>Ver actividad</strong></td>
            <td><strong>Archivos enviados</strong></td>
            <td><strong>Fecha de inicio</strong></td>
            <td><strong>Fecha limite</strong></td>
          </thead> 
          <tbody id="tablaAlmact">
            
          </tbody>
       </table>

     </div>