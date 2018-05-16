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
Route::get('/people/create', 'PersonController@create')
    ->name('people.create');
Route::post('/people/store', 'PersonController@store')
    ->name('people.store');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/people/index', 'PersonController@index')
        ->name('people.index');
    Route::get('/people/show/{id}', 'PersonController@show')
        ->name('people.show');
    Route::get('/people/edit/{id}', 'PersonController@edit')
        ->name('people.edit');
    Route::put('/people/update{id}', 'PersonController@update')
        ->name('people.update');
    Route::delete('/people/destroy/{id}', 'PersonController@destroy')
        ->name('people.destroy');
    Route::resource('workshops', 'WorkshopController');
});
