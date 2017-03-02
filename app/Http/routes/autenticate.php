<?php

// usuarios autentificados en la aplicacion.
Route::get('addImg/{id}', ['as' => 'addImg', 'uses' => 'ResetController@addImg']);
Route::get('home', 'HomeController@index');
Route::get('allVideos/{id}', ['as' => 'allVideos', 'uses' => 'VideosController@allVideos']);
Route::get('showVideos/{id}', ['as' => 'showVideos', 'uses' => 'VideosController@showVideos']);//verificar
Route::get('tutorial', ['as' => 'tutorial', 'uses' => 'VideosController@tutorial']);

Route::get('allTutorial', ['as' => 'allTutorial', 'uses' => 'VideosController@allTutorial']);
Route::get('dwTutorial/{fileName}', ['as' => 'dwTutorial', 'uses' => 'VideosController@dwTutorial']);
Route::get('dlTutorial/{id}', ['as' => 'dlTutorial', 'uses' => 'VideosController@dlTutorial']);