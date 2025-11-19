<?php
use App\Routes\Route;
use App\Controllers\LivreController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/', 'LivreController@index');

Route::get('/livres', 'LivreController@index');
Route::get('/livre/show', 'LivreController@show');
Route::get('/livre/create', 'LivreController@create');
Route::post('/livre/create', 'LivreController@store');
Route::get('/livre/edit', 'LivreController@edit');
Route::post('/livre/edit', 'LivreController@update');
Route::post('/livre/delete', 'LivreController@delete');

Route::get('/users', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
Route::post('/user/delete', 'UserController@delete');

Route::get('/login', 'AuthController@create');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();