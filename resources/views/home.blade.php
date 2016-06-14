@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
 @include('ajax.modalUnidad')
 @include('ajax.modalRespuestas')
 @include('ajax.modalEditUnidad')
 @include('ajax.modalEditsubtemas')
 @include('ajax.modalImagen')
 @include('ajax.modalListImagenes') 
 @include('ajax.modalCrearSubtema')
 @include('ajax.modalRubricas')
 @include('ajax.modalArchivos')
 @include('ajax.modalMaterial')
 @include('ajax.modalNota')
 @include('ajax.modalEditar')
 @include('ajax.modalMapoyo')
 @include('ajax.modalEditRubricas')
 @include('ajax.modalVideos')
 @include('ajax.modalListVideos')
 @include('ajax.modalListVideoDocente')
 @include('ajax.modalActUser')
 @include('ajax.modalListVideos')
 @include('ajax.modalCalificacion')
 @include('ajax.modalMapoyoAlm')
 @include('ajax.modalResponder')
 @include('ajax.modalFile')
 @include('ajax.modalTutoPrf')
 @include('ajax.modalPlan')
 @include('ajax.modalPlanMateria')
 @include('ajax.modalShowUser')
 @include('ajax.modalUpdateUser')
 @include('ajax.Carreras.modalPlan')
 @include('ajax.Carreras.modalPlanMateria')
 @include('ajax.Carreras.modalEditPlan')
 @include('ajax.Usuarios.modalEditUser')
 @include('ajax.modalQuiz')
 @include('ajax.modalNotaExamen')
 @include('ajax.modalEditarExamen')
 @include('ajax.modalEditPregunta')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				
					@include('ajax.planeacion')
					@include('ajax.listRubricas')
					@include('ajax.vizualizacionUnidad')
					@include('ajax.admRole')
					@include('ajax.ListaActividades')
					@include('ajax.listUnidades')
					@include('ajax.listSubtemas')
					@include('ajax.crearActividad')
					@include('ajax.Carreras.ajaxListCarreras')
					@include('ajax.admForo')
					@include('ajax.chatCeprog')
					@include('ajax.listForoadm')
					@include('ajax.admPlan')
					@include('ajax.listaPreguntas')
					@include('ajax.listaExamenesMaestros')
					@include('ajax.VunidadEstudiante')
					@include('ajax.admListaPersonal')
					@include('ajax.subirTutorial')
					@include('ajax.listaExamenes')
					@include('ajax.listTutorialAlm')
					@include('ajax.listTutorial')
					@include('ajax.crearUsuario')
					@include('ajax.alumnosListUnidad')
					@include('ajax.almActividad')
					@include('ajax.listPrfTuto')
					@include('ajax.listaUser')
					@include('ajax.listaAlumnosUser')
					@include('ajax.crearExamen')
					@include('ajax.crearPregunta')
					@include('ajax.archivosCalificaciones')
					@include('ajax.notasRubricas')


		</div>
	</div>
</div>

@endsection


