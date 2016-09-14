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

require __DIR__ .'/routes/website.php';

//Aqui estan las routas del login de la aplicacion//

Route::group(['middleware' => 'auth'], function(){

	require __DIR__ .'/routes/autenticate.php';
});

Route::group(['middleware' => 'admin',], function(){

	require __DIR__ .'/routes/admin.php';
	
	Route::group(['namespace' => 'administrador'], function(){

		Route::resource('examenDocente', 'ExamenDocenteController');
		Route::post('createPregDocente', ['as' => 'createPregDocente', 'uses' => 'ExamenDocenteController@createPregunta']);
		Route::post('createRespuestaDocente', ['as' => 'createRespuestaDocente', 'uses' => 'ExamenDocenteController@createRespuesta']);
		Route::get('listexaDocente', ['as' => 'listexaDocente', 'uses' => 'ExamenDocenteController@listexaDocente']);
		Route::get('updatePreguntaDocente/{id}', ['as' => 'updatePreguntaDocente', 'uses' => 'ExamenDocenteController@updatePregunta']);
		Route::get('borrarExamenDocente/{id}', ['as' => 'borrarExamenDocente', 'uses' => 'ExamenDocenteController@borrarExamenDocente']);
		Route::get('edtPrtDoc/{id}', ['as' => 'edtPrtDoc', 'uses' => 'ExamenDocenteController@editarPregunta']);
		Route::post('actualizarPregunta/{id}', ['as' => 'actualizarPregunta', 'uses' => 'ExamenDocenteController@actualizarPregunta']);
		Route::get('borrarPreguntaDocente/{id}', ['as' => 'borrarPreguntaDocente', 'uses' => 'ExamenDocenteController@borrarPreguntaDocente']);
		Route::get('listMateriasDocente', ['as' => 'listMateriasDocente', 'uses' => 'ExamenDocenteController@listMateias']);
		Route::get('resporteExamenDocente/{id}', ['as' => 'resporteExamenDocente', 'uses' => 'ExamenDocenteController@resporteExamenDocente']);
		Route::get('examenDocentePdf/{id}', ['as' => 'examenDocentePdf', 'uses' => 'ExamenDocenteController@examenDocentePdf']);
	});

});

Route::group(['middleware' => 'alumnosMaestros'], function(){

	require __DIR__ .'/routes/alumnos_maestros.php';
});

Route::group(['middleware' => 'alumnosAdmision'], function(){
	
});

Route::group(['middleware' => 'adminMaestro'], function(){

	Route::get('showForo/{id}', ['as' => 'showForo', 'uses' => 'ForoController@showForo']);
	Route::get('listForo', ['as' => 'listForo', 'uses' => 'ForoController@listForo']);

});

Route::group(['middleware' => 'maestro'], function(){

	require __DIR__ .'/routes/maestro.php';
});

	

Route::group(['middleware' => 'alumnos'], function(){

	Route::group(['namespace' => 'administrador'], function(){

		Route::resource('quizDocente', 'QuizDocenteController');
		Route::get('listaPreguntasDocente/{id}/{materia}', ['as' => 'listaPreguntasDocente', 'uses' => 'QuizDocenteController@examenPreguntas']);
		Route::post('respDocente/{id}', ['as' => 'respDocente', 'uses' => 'QuizDocenteController@respDocente']);
		Route::post('endQuiz', ['as' => 'endQuiz', 'uses' => 'QuizDocenteController@endQuiz']);
	});

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





