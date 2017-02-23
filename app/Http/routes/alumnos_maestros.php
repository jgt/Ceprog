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



