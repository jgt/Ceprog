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

		Route::get('deleteRecurso/{id}', ['as' => 'deleteRecurso', 'uses' => 'RecursosControllers@deleteRecurso']);
		Route::get('downloadRecursos/{filename}', ['as' => 'downloadRecursos', 'uses' => 'RecursosControllers@downloadRecursos']);
		Route::get('recursoIndex', ['as' => 'recursoIndex', 'uses' => 'RecursosControllers@index']);
		Route::post('recursoStore', ['as' => 'recursoStore', 'uses' => 'RecursosControllers@store']);
		Route::get('recursoShow/{id}', ['as' => 'recursoShow', 'uses' => 'RecursosControllers@show']);
		Route::get('recursoEdit/{id}', ['as' => 'recursoEdit', 'uses' => 'RecursosControllers@edit']);
		Route::post('recursoUpdate/{id}', ['as' => 'recursoUpdate', 'uses' => 'RecursosControllers@update']);
		

		Route::resource('examenDocente', 'ExamenDocenteController');
		Route::post('createPregDocente', ['as' => 'createPregDocente', 'uses' => 'ExamenDocenteController@createPregunta']);
		Route::post('createRespuestaDocente', ['as' => 'createRespuestaDocente', 'uses' => 'ExamenDocenteController@createRespuesta']);
		Route::get('listexaDocente', ['as' => 'listexaDocente', 'uses' => 'ExamenDocenteController@listexaDocente']);
		Route::get('updatePreguntaDocente/{id}', ['as' => 'updatePreguntaDocente', 'uses' => 'ExamenDocenteController@updatePregunta']);
		Route::get('borrarExamenDocente/{id}', ['as' => 'borrarExamenDocente', 'uses' => 'ExamenDocenteController@borrarExamenDocente']);
		Route::get('edtPrtDoc/{id}', ['as' => 'edtPrtDoc', 'uses' => 'ExamenDocenteController@editarPregunta']);
		Route::post('actualizarPregunta/{id}', ['as' => 'actualizarPregunta', 'uses' => 'ExamenDocenteController@actualizarPregunta']);
		Route::get('borrarPreguntaDocente/{id}', ['as' => 'borrarPreguntaDocente', 'uses' => 'ExamenDocenteController@borrarPreguntaDocente']);
		Route::get('resporteExamenDocente/{id}', ['as' => 'resporteExamenDocente', 'uses' => 'ExamenDocenteController@resporteExamenDocente']);
		Route::get('examenDocentePdf/{id}', ['as' => 'examenDocentePdf', 'uses' => 'ExamenDocenteController@examenDocentePdf']);
	});

	Route::group(['namespace' => 'SigaEdu'], function(){

		Route::get('siga', ['as' => 'siga', 'uses' => 'SigaEduController@show']);

	});

});

Route::group(['middleware' => 'alumnosMaestros'], function(){

	require __DIR__ .'/routes/alumnos_maestros.php';

	Route::group(['namespace' => 'menuMaestro'], function(){

		Route::get('verPaquete/{id}', ['as' => 'verPaquete', 'uses' => 'MenuController@verPaquete']);
		Route::get('pdfUndprf/{id}', ['as' => 'pdfUndprf', 'uses' => 'MenuController@pdfPaquete']);
		Route::get('verAct/{id}', ['as' => 'verAct', 'uses' => 'MenuController@verActividad']);
		Route::get('pdfActMaestro/{id}', ['as' => 'pdfActMaestro', 'uses' => 'MenuController@pdfActividad']);
	});

});


Route::group(['middleware' => 'adminMaestro'], function(){

	Route::get('showForo/{id}', ['as' => 'showForo', 'uses' => 'ForoController@showForo']);
	Route::get('listForo', ['as' => 'listForo', 'uses' => 'ForoController@listForo']);
});

Route::group(['middleware' => 'maestro'], function(){

	require __DIR__ .'/routes/maestro.php';

	Route::group(['namespace' => 'administrador'], function(){

		Route::get('downRecurso/{filename}', ['as' => 'downRecursos', 'uses' => 'RecMaestroControllers@downloadRecursos']);
		Route::get('recIndex', ['as' => 'recIndex', 'uses' => 'RecMaestroControllers@index']);
		Route::get('recShow/{id}', ['as' => 'recShow', 'uses' => 'RecMaestroControllers@show']);
		
	});

	Route::group(['namespace' => 'menuMaestro'], function(){

		Route::post('uploadsVideo/{id}', ['as' => 'uploadsVideo', 'uses' => 'MenuController@uploads']);
		Route::post('uploadsApoyo/{id}', ['as' => 'uploadsApoyo', 'uses' => 'MenuController@uploadsApoyo']);
		Route::get('calificarAlm/{id}', ['as' => 'calificarAlm', 'uses' => 'MenuController@calificar']);
		Route::get('rptPaquete/{id}/{materia}', ['as' => 'rptPaquete', 'uses', 'MenuController@reporteUser']);
		Route::get('consultarUser/{id}/{act}', ['as' => 'consultarUser', 'uses' => 'MenuController@consultar']);
		Route::post('editComentario/{id}', ['as' => 'editComentario', 'uses' => 'MenuController@editComentario']);
		Route::get('mtaExmlist/{id}', ['as' => 'mtaExmlist', 'uses' => 'MenuController@listExamen']);
		Route::get('hojaResp/{id}', ['as' => 'hojaResp', 'uses' => 'MenuController@hojaRespuestas']);
		Route::get('impExamen/{id}', ['as' => 'impExamen', 'uses' => 'MenuController@imprimirExam']);

		//reporte de examenes respuestas estudiantes
		Route::get('exmMaestro/{materia}', ['as' => 'exmMaestro', 'uses' => 'MenuController@exmMaestro']);
		Route::get('ntoExam/{id}/{examen}', ['as' => 'ntoExam', 'uses' => 'MenuController@notaExamenes']);
		
	});
	
});

	

Route::group(['middleware' => 'alumnos'], function(){

	require __DIR__ .'/routes/alumnos.php';

	Route::group(['namespace' => 'administrador'], function(){

		Route::resource('quizDocente', 'QuizDocenteController');
		Route::get('listaPreguntasDocente/{id}/{materia}', ['as' => 'listaPreguntasDocente', 'uses' => 'QuizDocenteController@examenPreguntas']);
		Route::post('respDocente/{id}', ['as' => 'respDocente', 'uses' => 'QuizDocenteController@respDocente']);
		Route::post('endQuiz', ['as' => 'endQuiz', 'uses' => 'QuizDocenteController@endQuiz']);
		Route::get('alumnoReportePdf/{id}', ['as' => 'alumnoReportePdf', 'uses' => 'QuizDocenteController@alumnoReportePdf']);
	});

	Route::group(['namespace' => 'menuAlumnos'], function(){

		Route::get('promedio/{id}', ['as' => 'promedio', 'uses' => 'AlumnoMenuController@promedio']);
		Route::get('activarAct/{id}', ['as' => 'activarAct', 'uses' => 'AlumnoMenuController@activacionAct']);
		Route::get('verNotaAlm/{id}', ['as' => 'verNotaAlm', 'uses' => 'AlumnoMenuController@verNota']);

	});

	Route::group(['namespace' => 'ExamenDiagnostico'], function(){


		Route::post('nxtQuestion/{id}', ['as' => 'nxtQuestion', 'uses' => 'ExamenDiagController@nextQuestion']);
		Route::get('diagAlm/{id}', ['as' => 'diagAlm', 'uses' => 'ExamenDiagController@indexAlumnos']);
		Route::get('realizarEva/{id}', ['as' => 'realizarEva', 'uses' => 'ExamenDiagController@realizarExamen']);
		Route::post('resultadoEva', ['as' => 'resultadoEva', 'uses' => 'ExamenDiagController@terminarExamen']);

	});

});


Route::group(['middleware' => 'allRoles'], function(){

	Route::get('plcDescargar/{filename}', ['as' => 'plcDescargar', 'uses' => 'PlaneacionController@plcDescargar']);
});

Route::group(['middleware' => 'adminCordinador'], function(){

	Route::post('datosMaestro', ['as' => 'datosMaestro', 'uses' => 'CordinadorController@datosDocente']);

});


Route::group(['middleware' => 'cordinador'], function(){

	require __DIR__ .'/routes/cordinador.php';

	Route::group(['namespace' => 'administrador'], function(){

		//Reporte Opinion estudiantil
		Route::get('reporteGeneralDoc', ['as' => 'reporteGeneralDoc', 'uses' => 'ExamenDocenteController@reporteGeneral']);
		Route::get('listMateriasDocente', ['as' => 'listMateriasDocente', 'uses' => 'ExamenDocenteController@listMateias']);
		Route::get('campusReporte/{id}', ['as' => 'campusReporte', 'uses' => 'ExamenDocenteController@reporteCampus']);
		Route::get('almEncuesta/{id}', ['as' => 'almEncuesta', 'uses' => 'ExamenDocenteController@alumnosEncuestados']);

	});

	Route::group(['namespace' => 'ExamenDiagnostico'], function(){


		Route::post('exaDiag', ['as' => 'exaDiag', 'uses' => 'ExamenDiagController@store']);
		Route::post('crtPrediag', ['as' => 'crtPrediag', 'uses' => 'ExamenDiagController@createPregunta']);
		Route::post('crtRespdiag', ['as' => 'crtRespdiag', 'uses' => 'ExamenDiagController@createRespuesta']);
		Route::post('updateEva/{id}', ['as' => 'updateEva', 'uses' => 'ExamenDiagController@updateEva']);
		Route::post('deleteEva/{id}', ['as' => 'deleteEva', 'uses' => 'ExamenDiagController@borrarEva']);
		Route::post('deletePeva/{id}', ['as' => 'deletePeva', 'uses' => 'ExamenDiagController@deletePregunta']);
		Route::post('borrarReporte/{id}/{user}', ['as' => 'borrarReporte', 'uses' => 'ReporteExamenController@borrarReporte']);

		Route::get('areas', ['as' => 'areas', 'uses' => 'ExamenDiagController@areas']);
		Route::get('evdList', ['as' => 'evdList', 'uses' => 'ExamenDiagController@index']);
		Route::get('carrEva', ['as' => 'carrEva', 'uses' => 'ExamenDiagController@carreras']);
		Route::get('evaPdf/{id}', ['as' => 'evaPdf', 'uses' => 'ExamenDiagController@evaPdf']);

		//Reportes del examen diagnostico

		Route::get('userDiag', ['as' => 'userDiag', 'uses' => 'ReporteExamenController@index']);
		Route::get('pdfUserdiag/{id}', ['as' => 'pdfUserdiag', 'uses' => 'ReporteExamenController@pdfDiag']);
		Route::get('carrerasEvadiag', ['as' => 'carrerasEvadiag', 'uses' => 'ReporteExamenController@listaCarreras']);
		Route::get('carrPdfdiag/{id}', ['as' => 'carrPdfdiag', 'uses' => 'ReporteExamenController@carreraPdf']);
		

	});
	
});





