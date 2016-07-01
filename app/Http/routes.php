<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/', 'WelcomeController@index');


//creo la solicitud de admision online
Route::get('inscripcion', 'InscripcionController@index');
Route::get('solicitud', 'InscripcionController@create');
Route::get('reinscripcion', ['as' => 'reinscripcion', 'uses' => 'ReinscripcionController@index']);
Route::post('reinscripcion', ['as' => 'reinscripcion', 'uses' => 'ReinscripcionController@store']);
Route::get('admision', ['as' => 'admision', 'uses' => 'AdmisionController@index']);
Route::post('enviar', ['as' => 'enviar', 'uses' => 'AdmisionController@store']);

//para envio de correo
Route::get('contact', ['as' => 'contact', 'uses' => 'MailController@index'] );
Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );
Route::get('info', ['as' => 'info', 'uses' => 'MailController@show'] );




//Aqui estan las routas del login de la aplicacion//



Route::group(['middleware' => 'auth'], function(){

	Route::get('addImg/{id}', ['as' => 'addImg', 'uses' => 'ResetController@addImg']);

	Route::get('idUnidad/{id}', ['as' => 'idUnidad', 'uses' => 'DisenoController@idUnidad']);
	Route::get('idSubtemas/{id}', ['as' => 'idSubtemas', 'uses' => 'DisenoController@idSubtemas']);

	Route::get('menu', ['as' => 'menu', 'uses' => 'MenuController@index']);

	Route::get('menutest', ['as' => 'menutest', 'uses' => 'MenuController@index']);

	Route::get('home', 'HomeController@index');

	Route::get('enviado', ['as' => 'enviado', 'uses' => 'FileEntryController@enviado']);

	Route::get('archivos/{id}', ['as' => 'archivos', 'uses' => 'FileEntryController@edit']);


		Route::get('portafolio/{id}', ['as' => 'portafolio', 'uses' => 'PortafolioController@portafolio']);
		Route::get('cloTutores/{id}', ['as' => 'cloTutores', 'uses' => 'AdmisionController@cloTutores']);
		Route::get('notaTutores/{id}', ['as' => 'nto', 'uses' => 'AdmisionController@notaTutores']);
		Route::get('allVideos/{id}', ['as' => 'allVideos', 'uses' => 'VideosController@allVideos']);
		Route::get('showVideos/{id}', ['as' => 'showVideos', 'uses' => 'VideosController@showVideos']);
	
		Route::get('pdf/{id}', ['as' => 'pdf', 'uses' => 'ActividadController@verPdf']);

		Route::get('material/{id}', ['as' => 'material', 'uses' => 'FileEntryController@material']);

		Route::get('tutorial', ['as' => 'tutorial', 'uses' => 'VideosController@tutorial']);
		Route::post('storeTutorial', ['as' => 'storeTutorial', 'uses' => 'VideosController@storeTutorial']);
		Route::get('allTutorial', ['as' => 'allTutorial', 'uses' => 'VideosController@allTutorial']);
		Route::get('dwTutorial/{fileName}', ['as' => 'dwTutorial', 'uses' => 'VideosController@dwTutorial']);
		Route::get('dlTutorial/{id}', ['as' => 'dlTutorial', 'uses' => 'VideosController@dlTutorial']);
});

Route::group(['middleware' => 'admin',], function(){

	Route::get('pdfCarrera/{id}', ['as' => 'pdfCarrera', 'uses' => 'MenuController@pdfCarrera']);
	Route::get('reporteCarrera', ['as' => 'reporteCarrera', 'uses' => 'MenuController@reporteCarrera']);

	Route::get('buscarUser', ['as' => 'buscarUser', 'uses' => 'AdminController@buscarUser']);

	Route::get('deleteU/{id}', ['as' => 'deleteU', 'uses' => 'AdminController@delete']);

	Route::get('createTutor', ['as' => 'createTutor', 'uses' => 'AdmisionController@createTutor']);
	Route::post('storeTutor', ['as' => 'storeTutor', 'uses' => 'AdmisionController@storeTutor']);
	Route::get('verTutores', ['as' => 'verTutores', 'uses' => 'AdmisionController@verTutores']);
	Route::get('editarTutor/{id}', ['as' => 'editarTutor', 'uses' => 'AdmisionController@editarTutor']);
	Route::post('updateTutor/{id}', ['as' => 'updateTutor', 'uses' => 'AdmisionController@updateTutor']);

	Route::resource('admin', 'AdminController');
	Route::get('foro', ['as' => 'foro', 'uses' => 'ForoController@create']);
	Route::post('foro', ['as' => 'foro.store', 'uses' => 'ForoController@foro']);
	Route::get('editForo/{id}', ['as' => 'editForo', 'uses' => 'ForoController@editForo']);
	Route::post('updateForo/{id}', ['as' => 'updateForo', 'uses' => 'ForoController@updateForo']);
	
	Route::resource('role', 'RoleController');

	Route::resource('permiso', 'PermisosController');

	Route::get('plan/{id}', ['as' => 'plan', 'uses' => 'AdminController@createMateria']);
	Route::post('materia', ['as' => 'materia', 'uses' => 'AdminController@materia']);


	Route::get('editmat/{id}', ['as' => 'editmat', 'uses' => 'AdminController@editmat']);
	Route::post('updatemat/{id}', ['as' => 'updatemat', 'uses' => 'AdminController@updatemat']);

	Route::get('listmaterias', ['as' => 'listmaterias', 'uses' => 'AdminController@listmaterias']);

	Route::get('list', ['as' => 'list', 'uses' => 'AdminController@listSemestre']);

	Route::resource('carrera', 'CarreraController');
	Route::get('deleteCarrera/{id}', ['as' => 'deleteCarrera', 'uses' => 'CarreraController@deleteCarrera']);
	Route::resource('semestre', 'SemestreController');
	Route::resource('materia', 'MateriaController');
	Route::get('crearSemestre/{id}', ['as' => 'crearSemestre', 'uses' => 'SemestreController@crearSemestre']);
	Route::get('createMateria/{id}', ['as' => 'createMateria', 'uses' => 'MateriaController@createMateria']);

});

Route::group(['middleware' => 'alumnosMaestros'], function(){

	Route::get('reset', ['as' => 'reset', 'uses' => 'ResetController@reset']);
	Route::post('resetC/{id}', ['as' => 'resetC', 'uses' => 'ResetController@resetC']);

	Route::get('listExamen/{id}', ['as' => 'listExamen', 'uses' => 'ActividadController@verExamen']);
	Route::get('forosMateria/{id}', ['as' => 'forosMateria', 'uses' => 'ForoController@forosMaterias']);
	Route::get('comentario/{id}', ['as' => 'comentario', 'uses' => 'ForoController@comentario']);
	Route::post('preguntas/{id}', ['as' => 'preguntas', 'uses' => 'ForoController@store']);	

	Route::get('planpdf/{id}', ['as' => 'planpdf', 'uses' => 'DisenoController@planPdf']);

	Route::get('descarga/get/{filename}', ['as' => 'getentry', 'uses' => 'DescargaController@get']);
	Route::get('fileentry/get/{filename}', ['as' => 'apoyo', 'uses' => 'FileEntryController@get']);
	Route::post('update/{id}', ['as' => 'archivoupdate', 'uses' => 'FileEntryController@update']);


});

Route::group(['middleware' => 'alumnosAdmision'], function(){

	
	
});

Route::group(['middleware' => 'adminMaestro'], function(){

	Route::get('showForo/{id}', ['as' => 'showForo', 'uses' => 'ForoController@showForo']);
	Route::get('listForo', ['as' => 'listForo', 'uses' => 'ForoController@listForo']);
	Route::get('deleteForo/{id}', ['as' => 'deleteForo', 'uses' => 'ForoController@deleteForo']);

});

Route::group(['middleware' => 'maestro'], function(){


	Route::get('listActUser/{id}', ['as' => 'listActUser', 'uses' => 'MenuController@listActUser']);
	Route::get('almSem/{id}', ['as' => 'almSem', 'uses' => 'MenuController@listAlumnos']);
	Route::get('borrarImg/{id}', ['as' => 'borrarImg', 'uses' => 'SubtemasController@borrarImg']);
	Route::get('listImagenes/{id}', ['as' => 'listImagenes', 'uses' => 'SubtemasController@listImagenes']);
	Route::post('imagenSubtema/{id}', ['as' => 'imagenSubtema', 'uses' => 'SubtemasController@imagenSubtema']);
	Route::get('showSubtema/{id}', ['as' => 'showSubtema', 'uses' => 'SubtemasController@showSubtema']);
	Route::post('storeSubtemas', ['as' => 'storeSubtemas', 'uses' => 'SubtemasController@storeSubtemas']);
	Route::get('deleteSubtemas/{id}', ['as' => 'deleteSubtemas', 'uses' => 'SubtemasController@deleteSubtemas']);
	Route::get('editSubtemas/{id}', ['as' => 'editSubtemas', 'uses' => 'SubtemasController@editSubtemas']);
	Route::post('updateSubtemas/{id}', ['as' => 'updateSubtemas', 'uses' => 'SubtemasController@updateSubtemas']);

	Route::get('examenPreguntas/{id}', ['as' => 'examenPreguntas', 'uses' => 'ExamenController@examenPreguntas']);
	Route::get('editRespuesta/{id}', ['as' => 'editRespuesta', 'uses' => 'ExamenController@editRespuesta']);
	Route::post('updateRespuesta/{id}', ['as' => 'updateRespuesta', 'uses' => 'ExamenController@updateRespuesta']);
	Route::get('verExamen/{id}', ['as' => 'verExamen', 'uses' => 'ExamenController@verExamen']);
	Route::get('deletePregunta/{id}', ['as' => 'deletePregunta', 'uses' => 'ExamenController@deletePregunta']);
	Route::post('updatePregunta/{id}', ['as' => 'updatePregunta', 'uses' => 'ExamenController@updatePregunta']);
	Route::get('editarPregunta/{id}', ['as' => 'editarPregunta', 'uses' => 'ExamenController@editarPregunta']);
	Route::get('listPreguntas/{id}', ['as' => 'listPreguntas', 'uses' => 'ExamenController@listPreguntas']);
	Route::post('updateExamen/{id}', ['as' => 'updateExamen', 'uses' => 'ExamenController@updateExamen']);
	Route::get('editarExamen/{id}', ['as' => 'editarExamen', 'uses' => 'ExamenController@editarExamen']);
	Route::get('deleteExamen/{id}', ['as' => 'deleteExamen', 'uses' => 'ExamenController@deleteExamen']);
	Route::get('notaExamen{id}', ['as' => 'notaExamen', 'uses' => 'ExamenController@notaExamen']);
	Route::get('pdfExamen/{id}', ['as' => 'pdfExamen', 'uses' => 'ExamenController@pdfExamen']);
	Route::post('storeRespuesta', ['as' => 'storeRespuesta', 'uses' => 'ExamenController@storeRespuesta']);
	Route::get('createRespuesta/{id}', ['as' => 'createRespuesta', 'uses' => 'ExamenController@createRespuesta']);
	Route::post('storePregunta', ['as' => 'storePregunta', 'uses' => 'ExamenController@storePregunta']);
	Route::get('examenP/{id}', ['as' => 'examenP', 'uses' => 'ExamenController@createPregunta']);
	Route::get('examen/{id}', ['as' => 'examen', 'uses' => 'ExamenController@createExamen']);
	Route::post('storeExamen', ['as' => 'storeExamen', 'uses' => 'ExamenController@storeExamen']);

	Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'VideosController@delete']);

	Route::get('index/{id}', ['as' => 'index', 'uses' => 'VideosController@index']);
	Route::post('storeSubir/{id}', ['as' => 'storeSubir', 'uses' => 'VideosController@storeSubir']);

	Route::get('notaMateria/{id}', ['as' => 'notaMateria', 'uses' => 'PortafolioController@notaMateria']);
	Route::get('totalCal/{id}', ['as' => 'totalCal', 'uses' => 'PortafolioController@totalCal']);

	Route::get('apollo/{id}', ['as' => 'apollo', 'uses' => 'FileEntryController@create']);
	Route::post('material/{id}', ['as' => 'material', 'uses' => 'FileEntryController@add']);
	Route::get('borrarM/{filename}', ['as' => 'borrarM', 'uses' => 'FileEntryController@borrarM']);

	Route::get('verArchivos/{id}', ['as' => 'verArchivos', 'uses' => 'PortafolioController@verArchivos']);

	Route::get('calificacion/{id}', ['as' => 'calificacion', 'uses' => 'PortafolioController@calificacion']);
	Route::post('nota/{id}', ['as' => 'nota', 'uses' => 'PortafolioController@nota']);
	Route::get('notaAlumno/{id}', ['as' => 'notaAlumno', 'uses' => 'PortafolioController@notaAlumno']);

	Route::get('deleteRubrica/{id}', ['as' => 'deleteRubrica', 'uses' => 'RubricaController@deleteRubrica']);
	Route::get('editrubrica/{id}', ['as' => 'editrubrica', 'uses' => 'RubricaController@editRubrica']);
	Route::post('updaterubrica/{id}', ['as' => 'updaterubrica', 'uses' => 'RubricaController@updateRubrica']);
	Route::get('listrubrica/{id}', ['as' => 'listrubrica', 'uses' => 'RubricaController@listRubrica']);

	Route::get('rubrica/{id}', ['as' => 'rubrica', 'uses' => 'RubricaController@create']);
	Route::post('storeRubrica', ['as' => 'storeRubrica', 'uses' => 'RubricaController@storeRubrica']);

	
	Route::get('listplan/{id}', ['as' => 'listplan', 'uses' => 'DisenoController@listPlan']);

	Route::get('editplan/{id}', ['as' => 'editplan', 'uses' => 'DisenoController@editplan']);
	Route::post('updateplan/{id}', ['as' => 'updateplan', 'uses' => 'DisenoController@updateplan']);

	Route::post('storePlan', ['as' => 'storePlan', 'uses' => 'DisenoController@storePlan']);
	Route::get('planeacion/{id}', ['as' => 'planeacion', 'uses' => 'DisenoController@planeacion']);
	Route::get('show/{id}', ['as' => 'showPdf', 'uses' => 'DisenoController@show']);

	
	Route::resource('profesor', 'ProfesorController');
	Route::get('deleteActividad/{id}', ['as' => 'deleteActividad', 'uses' => 'ProfesorController@deleteActividad']);
	Route::get('createActividad/{id}', ['as' => 'createAct', 'uses' => 'ProfesorController@createActividad']);


});

	

Route::group(['middleware' => 'alumnos'], function(){

	Route::get('fileentry/{id}', ['as' => 'fileentry', 'uses' => 'DescargaController@index']);

	Route::post('terminarExamen/{id}', ['as' => 'terminarExamen', 'uses' => 'ExamenController@terminarExamen']);
	Route::post('resultadoExamen/{id}', ['as' => 'resultadoExamen', 'uses' => 'ExamenController@resultadoExamen']);
	Route::get('realizarExamen/{id}', ['as' => 'realizarExamen', 'uses' => 'ExamenController@realizarExamen']);
	

	Route::get('archivosUserList', ['as' => 'archivosUserList', 'uses' => 'FileEntryController@enviado']);
	Route::get('calCarrera/{id}', ['as' => 'calCarrera', 'uses' => 'ActividadController@calCarrera']);
	
	Route::get('download/{filename}', ['as' => 'download', 'uses' => 'VideosController@download']);

	Route::get('promedio/{id}', ['as' => 'promedio', 'uses' => 'ActividadController@promedio']);

	Route::get('verPlaneacion/{id}', ['as' => 'verPlaneacion', 'uses' => 'ActividadController@verActividades']);
	Route::get('verPlaneacionPdf/{id}', ['as' => 'verPlaneacionPdf', 'uses' => 'ActividadController@verPdf']);

	Route::get('Ecomentario/{id}', ['as' => 'Ecomentario', 'uses' => 'ForoEstudianteController@comentario']);

	Route::get('mat', ['as' => 'mat', 'uses' => 'ActividadController@verCarreras']);

	Route::get('materias/{id}', ['as' => 'materias', 'uses' => 'ActividadController@verMaterias']);

	Route::get('act/{id}', ['as' => 'act', 'uses' => 'ActividadController@verUnidades']);

	Route::get('archivos', ['as' => 'archivos', 'uses' => 'DescargaController@index']);

	Route::get('descarga/{id}', ['as' => 'descarga', 'uses' => 'DescargaController@create']);
	Route::post('descarga/{id}', ['as' => 'descarga', 'uses' => 'DescargaController@add']);
	Route::get('borrar/{filename}', ['as' => 'borrar', 'uses' => 'DescargaController@borrar']);

});


Route::group(['middleware' => 'admision'], function(){


	Route::get('tutores', ['as' => 'tutores', 'uses' => 'AdmisionController@verCarreraTutores']);

	Route::get('mtmTutores/{id}', ['as' => 'mtm', 'uses' => 'AdmisionController@mtmTutores']);

	Route::get('actTutores/{id}', ['as' => 'actTutores', 'uses' => 'AdmisionController@actTutores']);

	Route::get('sinNota/{id}', ['as' => 'sinNota', 'uses' => 'AdmisionController@sinNota']);

	Route::get('admcreate', ['as' => 'admcreate', 'uses' => 'AdmisionController@createUser']);
	Route::post('storeUser', ['as' => 'storeUser', 'uses' => 'AdmisionController@storeUser']);

	Route::get('editaralumno/{id}', ['as' => 'edt', 'uses' => 'AdmisionController@editar']);
	Route::post('updateAlumno/{id}', ['as' => 'updateAlumno', 'uses' => 'AdmisionController@update']);

	Route::get('ver', ['as' => 'ver', 'uses' => 'AdmisionController@ver']);

});


Route::group(['middleware' => 'cordinador'], function(){


	Route::resource('cordinador', 'CordinadorController');

	Route::get('mtmCordinador', ['as' => 'mtmCordinador', 'uses' => 'CordinadorController@materiaCordinador']);

	Route::get('actCordinador/{id}', ['as' => 'actCordinador', 'uses' => 'CordinadorController@actividadCordinador']);

	Route::get('actividadMateria/{id}', ['as' => 'actividadMateria', 'uses' => 'CordinadorController@actividadMateria']);

	Route::get('notaCordinador/{id}', ['as' => 'notaCordinador', 'uses' => 'CordinadorController@notaCordinador']);

	Route::get('ntCordinador/{id}', ['as' => 'ntCordinador', 'uses' => 'CordinadorController@notaRubricaCordinador']);

	Route::get('videoCordinador/{id}', ['as' => 'videoCordinador', 'uses' => 'CordinadorController@videoCordinador']);

	Route::get('archivoCordinador/{id}', ['as' => 'archivoCordinador', 'uses' => 'CordinadorController@archivoCordinador']);


});





