<?php
use App\Routes\Route;

Route::get('/', 'LivreController@index');

Route::get('/livres', 'LivreController@index');
Route::get('/livre/show', 'LivreController@show');
Route::get('/livre/create', 'LivreController@create');
Route::post('/livre/create', 'LivreController@store');
Route::get('/livre/edit', 'LivreController@edit');
Route::post('/livre/edit', 'LivreController@update');
Route::post('/livre/delete', 'LivreController@delete');

Route::dispatch();