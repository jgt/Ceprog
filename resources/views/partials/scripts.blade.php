<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/vendor/moments.js')}}"  type="text/javascript"></script>

<script src="{{ asset('js/vendor/momentlocal.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/vendor/select2.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/vendor/alertify.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/vendor/datetime.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/vendor/blockUi.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/vendor/jquery.fresh-tilled-soil-webrtc.js')}}" type="text/javascript"></script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script src="{{ asset('js/vendor/datatables.js')}}"></script>
<script src="{{ asset('js/vendor/datatables.responsive.js')}}"></script>
<script src="{{ asset('js/vendor/datatables.tableTools.min.js')}}"></script>

@include('script.Cordinador.crearDocente')

@include('script.Cordinador.crearUnidad')

@include('script.Cordinador.menuPaquetes')

@include('script.Maestros.subirVideo')

@include('script.Maestros.pdfUnidad')

@include('script.Maestros.calificar')

@include('script.Maestros.listaExamen')

@include('script.Maestros.verPaquete')

@include('script.Maestros.actividadPdf')

@include('script.Maestros.subirApoyo')

@include('script.Maestros.verActividad')

@include('script.Alumnos.verSemana')

@include('script.Alumnos.pdfSemana')

@include('script.Alumnos.notaPdf')

@include('script.Alumnos.activarAct')

@include('script.Alumnos.responderAct')

@include('script.Alumnos.verActividad')

@include('script.Alumnos.pdfActividad')

@include('script.Alumnos.documentosEnviados')

@include('script.Alumnos.verNota')

@include('script.Recursos.recursosMaestro')

@include('script.Planeacion.PlanAdm')

@include('script.Planeacion.planeacion')

@include('script.Planeacion.planeacionAlm')

@include('script.Recursos.recurso')

@include('script.ExamenDocente.ajaxListaExamen')

@include('script.ExamenDocente.ajaxExamenDocente')

@include('script.select')

@include('script.menu')

@include('script.UserImg')

@include('script.ajaxForosMaterias')

@include('script.ajaxUsuario')

@include('script.ajaxExamen')

@include('script.ajaxListExamenes')

@include('script.ajaxListUnidad')

@include('script.ajaxImagen')

@include('script.ajaxVisualizacion')

@include('script.tutorialFile')

@include('script.ajaxAdministrador')

@include('script.ajaxTutorial')

@include('script.reportes.ajaxReportes')

@include('script.listCarreras.ajaxListCarreras')

@include('script.datetime')


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->