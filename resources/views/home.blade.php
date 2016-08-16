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
 @include('ajax.modalEditar')
 @include('ajax.modalMapoyo')
 @include('ajax.modalEditRubricas')
 @include('ajax.modalVideos')
 @include('ajax.modalListVideos')
 @include('ajax.modalListVideoDocente')
 @include('ajax.modalActUser')
 @include('ajax.modalListVideos')
 @include('ajax.modalMapoyoAlm')
 @include('ajax.modalResponder')
 @include('ajax.modalFile')
 @include('ajax.modalTutoPrf')
 @include('ajax.modalTutorialAlm')
 @include('ajax.modalTutorial')
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
 @include('ajax.modalEditRespuesta')
 @include('ajax.modalPreguntas')
 @include('ajax.modalRespuestasIncompletas')
 @include('ajax.Semestres.modalEditSemestre')
 @include('ajax.Materias.modalEditMateria')
 @include('ajax.modalCrtRubricas')
 @include('ajax.modalUserNota')
 @include('ajax.ExamenDocente.modalRespuestas')
 @include('ajax.ExamenDocente.modalQuizDocente')
 @include('ajax.ExamenDocente.modalEditexamenDocente')
 
<div class="container">

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
					
					@include('ajax.ExamenDocente.listExamenAdmin')
					@include('ajax.ExamenDocente.listaExamenDocente')
					@include('ajax.ExamenDocente.crearPreguntaDocente')
					@include('ajax.ExamenDocente.crearExamenDocente')
					@include('ajax.Materias.listMaterias')
					@include('ajax.Semestres.listSemestres')
					@include('ajax.planeacion')
					@include('ajax.crearActividad')
					@include('ajax.subirTutorial')
					@include('ajax.admPlan')
					@include('ajax.crearPregunta')
					@include('ajax.crearExamen')
					@include('ajax.listaAlumnosUser')
					@include('ajax.listaUser')
					@include('ajax.listPrfTuto')
					@include('ajax.almActividad')
					@include('ajax.alumnosListUnidad')
					@include('ajax.crearUsuario')
					@include('ajax.listTutorial')
					@include('ajax.listTutorialAlm')
					@include('ajax.listaExamenes')
					@include('ajax.admListaPersonal')
					@include('ajax.VunidadEstudiante')
					@include('ajax.listaExamenesMaestros')
					@include('ajax.listaPreguntas')
					@include('ajax.chatCeprog')
					@include('ajax.admForo')
					@include('ajax.Carreras.ajaxListCarreras')
					@include('ajax.listSubtemas')
					@include('ajax.listUnidades')
					@include('ajax.ListaActividades')
					@include('ajax.admRole')
					@include('ajax.listForoadm')
					@include('ajax.listRubricas')
					@include('ajax.vizualizacionUnidad')
					@include('ajax.notasRubricas')
					@include('ajax.crearCalificacion')






					
					
			</div>
		</div>
	</div>
</div>

@endsection



