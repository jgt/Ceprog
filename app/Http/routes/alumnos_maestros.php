<?php

Route::get('notaExamen{id}', ['as' => 'notaExamen', 'uses' => 'ExamenController@notaExamen']);
//edicion de usuarios tipo maestros y alumnos
Route::get('reset', ['as' => 'reset', 'uses' => 'ResetController@reset']);
Route::post('resetC/{id}', ['as' => 'resetC', 'uses' => 'ResetController@resetC']);
//foros para estudiantes y maestros.
Route::get('listExamen/{id}', ['as' => 'listExamen', 'uses' => 'ActividadController@verExamen']);
Route::get('forosMateria/{id}', ['as' => 'forosMateria', 'uses' => 'ForoController@forosMaterias']);
Route::get('comentario/{id}', ['as' => 'comentario', 'uses' => 'ForoController@comentario']);
Route::post('preguntas/{id}', ['as' => 'preguntas', 'uses' => 'ForoController@store']);	
//muestra la actividad creada en formato PDF.
Route::get('planpdf/{id}', ['as' => 'planpdf', 'uses' => 'DisenoController@planPdf']);
//descargar de archivos tanto maestros como estudiantes.
Route::get('descarga/get/{filename}', ['as' => 'getentry', 'uses' => 'DescargaController@get']);
Route::get('fileentry/get/{filename}', ['as' => 'apoyo', 'uses' => 'FileEntryController@get']);
Route::post('update/{id}', ['as' => 'archivoupdate', 'uses' => 'FileEntryController@update']);
//me muestra las unidades que tiene la materia  con sus subtemas y las actividades que tiene cada unidad. 
Route::get('baseTeorica/{id}', ['as' => 'idUnidad', 'uses' => 'DisenoController@baseTeorica']);
Route::get('baseTeoricaSubTemas/{id}', ['as' => 'idSubtemas', 'uses' => 'DisenoController@baseTeoricaSubTemas']);
Route::get('portafolio/{id}', ['as' => 'portafolio', 'uses' => 'PortafolioController@portafolio']);
//muestra la unidad del alumno y maestro en formato pdf
Route::get('pdf/{id}', ['as' => 'pdf', 'uses' => 'ActividadController@verPdf']);
//te muestra el material de apoyo de una actividad.
Route::get('material/{id}', ['as' => 'material', 'uses' => 'FileEntryController@material']);

