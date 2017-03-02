<?php

Route::get('matDelete/{id}/{semestre}', ['as' => 'matDelete', 'uses' => 'MateriaController@matDelete']);

Route::get('calUnidad/{id}', ['as' => 'calUnidad', 'uses' => 'MenuController@calUnidad']);

Route::get('borrarSemestre/{id}', ['as' => 'borrarSemestre', 'uses' => 'SemestreController@borrarSemestre']);

Route::get('reporteGeneral/{id}', ['as' => 'reporteGeneral', 'uses' => 'MenuController@reporteGeneral']);


Route::get('notaMateria/{id}', ['as' => 'notaMateria', 'uses' => 'PortafolioController@notaMateria']);
Route::get('totalCal/{id}', ['as' => 'totalCal', 'uses' => 'PortafolioController@totalCal']);



Route::get('verArchivos/{id}', ['as' => 'verArchivos', 'uses' => 'PortafolioController@verArchivos']);

Route::get('calificacion/{id}/{user}', ['as' => 'calificacion', 'uses' => 'PortafolioController@calificacion']);
Route::post('nota/{id}', ['as' => 'nota', 'uses' => 'PortafolioController@nota']);
Route::get('notaAlumno/{id}', ['as' => 'notaAlumno', 'uses' => 'PortafolioController@notaAlumno']);

Route::get('planeacion/{id}', ['as' => 'planeacion', 'uses' => 'DisenoController@planeacion']);
Route::post('plcStore/{id}', ['as' => 'plcStore', 'uses' => 'PlaneacionController@plcStore']);
Route::post('borrarPlc/{id}', ['as' => 'borrarPlc', 'uses' => 'PlaneacionController@borrarPlc']);
Route::get('reporteUser/{id}/{materia}', ['as' => 'reporteUser', 'uses' => 'MenuController@reporteUser']);






