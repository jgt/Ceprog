<?php

//rutas para el usuario no autentificado.
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/', 'WelcomeController@index');
//Solicitud de inscricion.
Route::get('inscripcion', 'InscripcionController@index');
Route::get('solicitud', 'InscripcionController@create');
Route::get('reinscripcion', ['as' => 'reinscripcion', 'uses' => 'ReinscripcionController@index']);
Route::post('reinscripcion', ['as' => 'reinscripcion', 'uses' => 'ReinscripcionController@store']);
Route::get('admision', ['as' => 'admision', 'uses' => 'AdmisionController@index']);
Route::post('enviar', ['as' => 'enviar', 'uses' => 'AdmisionController@store']);

//para envio de correo
Route::get('contact', ['as' => 'contact', 'uses' => 'MailController@index'] );
Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );
Route::get('info', ['as' => 'info', 'uses' => 'MailController@show'] );