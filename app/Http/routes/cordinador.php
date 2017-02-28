<?php


Route::get('cdoMaterias', ['as' => 'cdoMaterias', 'uses' => 'CordinadorController@create']);
Route::get('cdoDocentes', ['as' => 'cdoDocentes', 'uses' => 'CordinadorController@listDocente']);
Route::get('planeacion/{id}', ['as' => 'planeacion', 'uses' => 'DisenoController@planeacion']);

Route::post('rptSemestral', ['as' => 'rptSemestral', 'uses' => 'CordinadorController@crearReporteSem']);
Route::post('cdoStore', ['as' => 'cdoStore', 'uses' => 'CordinadorController@store']);
;



//Paquetes de cada materia
Route::get('editplan/{id}', ['as' => 'editplan', 'uses' => 'DisenoController@editPlan']);
Route::get('listplan/{id}', ['as' => 'listplan', 'uses' => 'DisenoController@listPlan']);
Route::post('storePlan', ['as' => 'storePlan', 'uses' => 'DisenoController@storePlan']);
Route::post('updateplan/{id}', ['as' => 'updateplan', 'uses' => 'DisenoController@updateplan']);
Route::get('pdf/{id}', ['as' => 'pdf', 'uses' => 'ActividadController@verPdf']);

//Actividades de cada paquete
Route::post('storeActividad', ['as' => 'storeActividad', 'uses' => 'ActividadController@storeActividad']);
Route::get('actEdit/{id}', ['as' => 'actEdit', 'uses' => 'ActividadController@editarAct']);
Route::post('updateActividad/{id}', ['as' => 'updateActividad', 'uses' => 'ActividadController@updateActividad']);

Route::get('showActividad/{id}', ['as' => 'showActividad', 'uses' => 'ActividadController@rubricas']);
Route::get('deleteActividad/{id}', ['as' => 'deleteActividad', 'uses' => 'ActividadController@deleteActividad']);
Route::get('portafolio/{id}', ['as' => 'portafolio', 'uses' => 'PortafolioController@portafolio']);
Route::get('material/{id}', ['as' => 'material', 'uses' => 'FileEntryController@material']);
Route::get('listPlaneacion/{id}', ['as' => 'listPlaneacion', 'uses' => 'PlaneacionController@listPlaneacion']);
Route::get('planpdf/{id}', ['as' => 'planpdf', 'uses' => 'ActividadController@planPdf']);

//Rubricas de las actvidades
Route::get('deleteRubrica/{id}', ['as' => 'deleteRubrica', 'uses' => 'RubricaController@deleteRubrica']);
Route::get('editrubrica/{id}', ['as' => 'editrubrica', 'uses' => 'RubricaController@editRubrica']);
Route::post('updaterubrica/{id}', ['as' => 'updaterubrica', 'uses' => 'RubricaController@updateRubrica']);
Route::get('listrubrica/{id}', ['as' => 'listrubrica', 'uses' => 'RubricaController@listRubrica']);

Route::get('rubrica/{id}', ['as' => 'rubrica', 'uses' => 'RubricaController@create']);
Route::post('storeRubrica', ['as' => 'storeRubrica', 'uses' => 'RubricaController@storeRubrica']);


//Subtemas de los paquetes
Route::get('borrarImg/{id}', ['as' => 'borrarImg', 'uses' => 'SubtemasController@borrarImg']);
Route::get('listImagenes/{id}', ['as' => 'listImagenes', 'uses' => 'SubtemasController@listImagenes']);
Route::post('imagenSubtema/{id}', ['as' => 'imagenSubtema', 'uses' => 'SubtemasController@imagenSubtema']);
Route::get('showSubtema/{id}', ['as' => 'showSubtema', 'uses' => 'SubtemasController@showSubtema']);
Route::post('storeSubtemas', ['as' => 'storeSubtemas', 'uses' => 'SubtemasController@storeSubtemas']);
Route::get('deleteSubtemas/{id}', ['as' => 'deleteSubtemas', 'uses' => 'SubtemasController@deleteSubtemas']);
Route::get('listSubtemas/{id}', ['as' => 'listSubtemas', 'uses' => 'SubtemasController@listSubtemas']);
Route::post('updateSubtemas/{id}', ['as' => 'updateSubtemas', 'uses' => 'SubtemasController@updateSubtemas']);


//Videos de los paquetes
Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'VideosController@delete']);
Route::get('index/{id}', ['as' => 'index', 'uses' => 'VideosController@index']);
Route::post('storeSubir/{id}', ['as' => 'storeSubir', 'uses' => 'VideosController@storeSubir']);

//Material de apoyo de las actividades
Route::get('apollo/{id}', ['as' => 'apollo', 'uses' => 'FileEntryController@create']);
Route::post('material/{id}', ['as' => 'material', 'uses' => 'FileEntryController@add']);
Route::get('borrarM/{id}', ['as' => 'borrarM', 'uses' => 'FileEntryController@borrarM']);

//descargar archivos
Route::get('descarga/get/{filename}', ['as' => 'getentry', 'uses' => 'DescargaController@get']);
Route::get('fileentry/{filename}', ['as' => 'apoyo', 'uses' => 'FileEntryController@get']);
Route::post('update/{id}', ['as' => 'archivoupdate', 'uses' => 'FileEntryController@update']);

//base teorica
Route::get('baseTeorica/{id}', ['as' => 'idUnidad', 'uses' => 'DisenoController@baseTeorica']);
Route::get('baseTeoricaSubTemas/{id}', ['as' => 'idSubtemas', 'uses' => 'DisenoController@baseTeoricaSubTemas']);

//Reporte de nota de las actividades
Route::get('rptAlmCdo/{id}/{materia}', ['as' => 'rptAlmCdo', 'uses' => 'CordinadorController@reporteAlumnos']);
Route::get('listActUser/{id}', ['as' => 'listActUser', 'uses' => 'MenuController@listActUser']);
Route::get('almSem/{id}', ['as' => 'almSem', 'uses' => 'MenuController@listAlumnos']);

//Crear examenes
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

//Planeacion
Route::resource('plc', 'PlaneacionController');

