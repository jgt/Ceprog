<?php

Route::get('fileSend/{id}', ['as' => 'fileSend', 'uses' => 'DescargaController@index']);
Route::post('terminarExamen/{id}', ['as' => 'terminarExamen', 'uses' => 'ExamenController@terminarExamen']);
Route::post('resultadoExamen/{id}', ['as' => 'resultadoExamen', 'uses' => 'ExamenController@resultadoExamen']);
Route::get('realizarExamen/{id}', ['as' => 'realizarExamen', 'uses' => 'ExamenController@realizarExamen']);
	

Route::get('archivosUserList', ['as' => 'archivosUserList', 'uses' => 'FileEntryController@enviado']);
Route::get('calCarrera/{id}', ['as' => 'calCarrera', 'uses' => 'ActividadController@calCarrera']);	
Route::get('download/{filename}', ['as' => 'download', 'uses' => 'VideosController@download']);


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