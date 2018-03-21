<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pins', 'PinsController@index')->middleware('auth');
Route::get('/pins/create', 'PinsController@create')->middleware('auth');
Route::post('/pins/create', 'PinsController@store')->middleware('auth');
Route::get('/pins/delete/{pin}', 'PinsController@twoFactor')->middleware('auth');
Route::delete('/pins/delete/{pin}', 'PinsController@destroy')->middleware('auth');
Route::get('/pins/update/{pin}', 'PinsController@edit')->middleware('auth');
Route::patch('/pins/update/{pin}', 'PinsController@update')->middleware('auth');
Route::get('/pins/{pin}', 'PinsController@show')->middleware('auth');

Route::get('/boards', 'BoardsController@index')->middleware('auth');
Route::get('/boards/create', 'BoardsController@create')->middleware('auth');
Route::post('/boards/create', 'BoardsController@store')->middleware('auth');
Route::get('/boards/delete/{board}', 'BoardsController@twoFactor')->middleware('auth');
Route::delete('/boards/delete/{board}', 'BoardsController@destroy')->middleware('auth');
Route::get('/boards/update/{board}', 'BoardsController@edit')->middleware('auth');
Route::patch('/boards/update/{board}', 'BoardsController@update')->middleware('auth');
Route::get('/boards/{board}', 'BoardsController@show')->middleware('auth');

Route::get('/categories', 'CategoriesController@index')->middleware('auth');
Route::get('/categories/create', 'CategoriesController@create')->middleware('auth');
Route::post('/categories/create', 'CategoriesController@store')->middleware('auth');
Route::get('/categories/delete/{category}', 'CategoriesController@twoFactor')->middleware('auth');
Route::delete('/categories/delete/{category}', 'CategoriesController@destroy')->middleware('auth');
Route::get('/categories/update/{category}', 'CategoriesController@edit')->middleware('auth');
Route::patch('/categories/update/{category}', 'CategoriesController@update')->middleware('auth');
Route::get('/categories/{category}', 'CategoriesController@show')->middleware('auth');

Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('home');


