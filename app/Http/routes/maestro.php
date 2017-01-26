<?php

Route::get('matDelete/{id}/{semestre}', ['as' => 'matDelete', 'uses' => 'MateriaController@matDelete']);

Route::get('calUnidad/{id}', ['as' => 'calUnidad', 'uses' => 'MenuController@calUnidad']);

Route::get('borrarSemestre/{id}', ['as' => 'borrarSemestre', 'uses' => 'SemestreController@borrarSemestre']);
Route::get('reporteUser/{id}/{materia}', ['as' => 'reporteUser', 'uses' => 'MenuController@reporteUser']);
Route::get('reporteGeneral/{id}', ['as' => 'reporteGeneral', 'uses' => 'MenuController@reporteGeneral']);

Route::get('listActUser/{id}', ['as' => 'listActUser', 'uses' => 'MenuController@listActUser']);
Route::get('almSem/{id}', ['as' => 'almSem', 'uses' => 'MenuController@listAlumnos']);
Route::get('borrarImg/{id}', ['as' => 'borrarImg', 'uses' => 'SubtemasController@borrarImg']);
Route::get('listImagenes/{id}', ['as' => 'listImagenes', 'uses' => 'SubtemasController@listImagenes']);
Route::post('imagenSubtema/{id}', ['as' => 'imagenSubtema', 'uses' => 'SubtemasController@imagenSubtema']);
Route::get('showSubtema/{id}', ['as' => 'showSubtema', 'uses' => 'SubtemasController@showSubtema']);
Route::post('storeSubtemas', ['as' => 'storeSubtemas', 'uses' => 'SubtemasController@storeSubtemas']);
Route::get('deleteSubtemas/{id}', ['as' => 'deleteSubtemas', 'uses' => 'SubtemasController@deleteSubtemas']);
Route::get('listSubtemas/{id}', ['as' => 'listSubtemas', 'uses' => 'SubtemasController@listSubtemas']);
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

Route::get('pdfExamen/{id}', ['as' => 'pdfExamen', 'uses' => 'ExamenController@pdfExamen']);
Route::get('exmImprimirPdf/{id}', ['as' => 'exmImprimirPdf', 'uses' => 'ExamenController@exmImprimirPdf']);
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
Route::get('borrarM/{id}', ['as' => 'borrarM', 'uses' => 'FileEntryController@borrarM']);

Route::get('verArchivos/{id}', ['as' => 'verArchivos', 'uses' => 'PortafolioController@verArchivos']);

Route::get('calificacion/{id}/{user}', ['as' => 'calificacion', 'uses' => 'PortafolioController@calificacion']);
Route::post('nota/{id}', ['as' => 'nota', 'uses' => 'PortafolioController@nota']);
Route::get('notaAlumno/{id}', ['as' => 'notaAlumno', 'uses' => 'PortafolioController@notaAlumno']);

Route::get('deleteRubrica/{id}', ['as' => 'deleteRubrica', 'uses' => 'RubricaController@deleteRubrica']);
Route::get('editrubrica/{id}', ['as' => 'editrubrica', 'uses' => 'RubricaController@editRubrica']);
Route::post('updaterubrica/{id}', ['as' => 'updaterubrica', 'uses' => 'RubricaController@updateRubrica']);
Route::get('listrubrica/{id}', ['as' => 'listrubrica', 'uses' => 'RubricaController@listRubrica']);

Route::get('rubrica/{id}', ['as' => 'rubrica', 'uses' => 'RubricaController@create']);
Route::post('storeRubrica', ['as' => 'storeRubrica', 'uses' => 'RubricaController@storeRubrica']);

	
Route::get('listplan/{id}', ['as' => 'listplan', 'uses' => 'DisenoController@listPlan']);

Route::get('editplan/{id}', ['as' => 'editplan', 'uses' => 'DisenoController@editPlan']);
Route::post('updateplan/{id}', ['as' => 'updateplan', 'uses' => 'DisenoController@updateplan']);
Route::post('storePlan', ['as' => 'storePlan', 'uses' => 'DisenoController@storePlan']);
Route::get('planeacion/{id}', ['as' => 'planeacion', 'uses' => 'DisenoController@planeacion']);
Route::get('show/{id}', ['as' => 'showPdf', 'uses' => 'DisenoController@show']);

Route::get('deleteActividad/{id}', ['as' => 'deleteActividad', 'uses' => 'ActividadController@deleteActividad']);
Route::get('showActividad/{id}', ['as' => 'showActividad', 'uses' => 'ActividadController@rubricas']);
Route::post('storeActividad', ['as' => 'storeActividad', 'uses' => 'ActividadController@storeActividad']);
Route::post('updateActividad/{id}', ['as' => 'updateActividad', 'uses' => 'ActividadController@updateActividad']);

Route::post('plcStore/{id}', ['as' => 'plcStore', 'uses' => 'PlaneacionController@plcStore']);
Route::post('borrarPlc/{id}', ['as' => 'borrarPlc', 'uses' => 'PlaneacionController@borrarPlc']);

Route::get('actEdit/{id}', ['as' => 'actEdit', 'uses' => 'ActividadController@editarAct']);




