<?php

//busca un usuario en la lita del personal
Route::get('buscarUser', ['as' => 'buscarUser', 'uses' => 'AdminController@buscarUser']);
Route::get('picturePerfil/{id}', ['as' => 'picturePerfil', 'uses' => 'AdminController@picturePerfil']);
Route::get('notification/{id}', ['as' => 'notification', 'uses' => 'AdminController@notification']);
Route::post('downCarrera/{id}', ['as' => 'downCarrera', 'uses' => 'AdminController@downCarrera']);
//borra un usuario de la lista del personal.
Route::post('deleteU/{id}', ['as' => 'deleteU', 'uses' => 'AdminController@delete']);

Route::get('foro', ['as' => 'foro', 'uses' => 'ForoController@create']);//verificar
Route::post('foro', ['as' => 'foro.store', 'uses' => 'ForoController@foro']);
Route::get('deleteForo/{id}', ['as' => 'deleteForo', 'uses' => 'ForoController@deleteForo']);

//resource controller
Route::resource('admin', 'AdminController');	
Route::resource('role', 'RoleController');
Route::resource('permiso', 'PermisosController');
Route::resource('carrera', 'CarreraController');
Route::resource('semestre', 'SemestreController');
Route::resource('materia', 'MateriaController');

Route::post('agregarRole/{id}', ['as' => 'agregarRole', 'uses' => 'RoleController@agregarRole']);
Route::post('deleteCarrera/{id}', ['as' => 'deleteCarrera', 'uses' => 'CarreraController@deleteCarrera']);

Route::post('storeTutorial', ['as' => 'storeTutorial', 'uses' => 'VideosController@storeTutorial']);

Route::get('alumnosSem/{id}', ['as' => 'alumnosSem', 'uses' => 'SemestreController@alumnosSem']);
Route::resource('plc', 'PlaneacionController');

//agregar programas
Route::get('agregarPrograma', ['as' => 'agregarPrograma', 'uses' => 'CarreraController@agregarPrograma']);
Route::post('attachPrograma/{id}', ['as' => 'attachPrograma', 'uses' => 'CarreraController@attachPrograma']);
Route::post('attachMaterias/{id}', ['as' => 'attachMaterias', 'uses' => 'MateriaController@attachMaterias']);

Route::get('campus', ['as' => 'campus', 'uses' => 'CarreraController@campusCarrera']);
Route::get('smetrList/{id}', ['as' => 'smetrList', 'uses' => 'SemestreController@smetrList']);

