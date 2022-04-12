<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//Visualizzare tutti i Task
Route::get('/tasks', 'TaskController@index')->name('tasks.index');

//Mostrare il form
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');

//Archiviare un Task
Route::post('/tasks/store', 'TaskController@store')->name('tasks.store');

//Mostrare un Task specifico
Route::get('/tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');

//Aggiornare un Task
Route::patch('/tasks/update/{id}', 'TaskController@update')->name('tasks.update');

//Eliminare un Task
Route::delete('/tasks/{id}', 'TaskController@destroy')->name('tasks.destroy');

//Completare un Task
Route::get('/task/complete/{id}', 'TaskController@complete')->name('tasks.complete');
Route::get('/task/uncomplete/{id}', 'TaskController@uncomplete')->name('tasks.uncomplete');