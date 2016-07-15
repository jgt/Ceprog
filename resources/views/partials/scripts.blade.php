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

<script src="{{ asset('js/vendor/datatables.js')}}"></script>


@include('script.select')

@include('script.menu')

@include('script.UserImg')

@include('script.ajaxForosMaterias')

@include('script.ajaxUsuario')

@include('script.ajaxExamen')

@include('script.ajaxListExamenes')

@include('script.ajaxPlaneacion')

@include('script.ajaxListUnidad')

@include('script.ajaxAlumnos')

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