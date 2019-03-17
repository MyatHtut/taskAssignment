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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/task/create', 'TaskController@create')->name('create.task');
Route::post('/task/insert', 'TaskController@store')->name('task.insert');
Route::get('/tasks', 'TaskController@index')->name('task.index');
Route::get('/send', 'TaskController@sendEmail')->name('task.email');
Route::get('/task/detail/{id}', 'TaskController@show')->name('task.detail');
Route::get('/task/edit/{id}', 'TaskController@edit')->name('task.edit');
Route::post('/task/update/{id}', 'TaskController@update')->name('task.update');
Route::view('/view', 'tasks.email');
