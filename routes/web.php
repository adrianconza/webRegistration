<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/people/create');
Route::get('/people/create', 'PersonController@create');
Route::post('/people/store', 'PersonController@store');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('people', 'PersonController');
    Route::resource('workshops', 'WorkshopController');
});
