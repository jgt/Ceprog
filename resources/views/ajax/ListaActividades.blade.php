<div id="listAct" class="col-md-6 col-md-offset-1 alert ">
      
       <a href="{{ route('verArchivos')}}" id="archivosRoute" class="alert"></a> 
       <a href="{{ route('calificacion')}}" id="calificacionRoute" class="alert"></a> 
       <a href="{{ route('getentry')}}" id="descargarRoute" class="alert"></a> 
       <a href="{{ route('apoyo')}}" id="apoyoRoute" class="alert"></a> 
       <a href="{{ route('material')}}" id="materialRoute" class="alert"></a>
        <a href="{{ route('apollo')}}" id="apolloRoute" class="alert"></a> 
        <a href="{{ route('planpdf')}}" id="actPdf" class="alert"></a>
        <a href="{{ route('deleteActividad')}}" id="deleteActividad" class="alert"></a>
        <a href="{{ route('borrarM')}}" id="borrarM" class="alert"></a>
        <a href="{{ route('listrubrica')}}" id="listRubrica" class="alert"></a>

       <table class="table">
          <thead>
            <td><strong>Actividades</strong></td>
            <td><strong>Material de apoyo</strong></td>
            <td><strong>Archivos</strong></td>
            <td><strong>Activar/Editar</strong></td>
            <td><strong>Nota de Alumnos</strong></td>
            <td><strong>Subir Material</strong></td>
            <td><strong>Ver Pdf</strong></td>
            <td><strong>Rubricas</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaActividad">
            
          </tbody>
       </table>

     </div>