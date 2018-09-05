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

/*

 Route::get('/', function () {
    return view('welcome');
});
 
 
 */




Route::get('/','TodoController@index')->name('todo.index')->middleware('verified');
Route::post('store','TodoController@store')->name('todo.store');
Route::get('edit/{$id}','TodoController@edit')->name('todo.edit')->middleware('verified');
Route::post('update/{$id}','TodoController@update')->name('todo.update');
Route::get('delete','TodoController@delete')->name('todo.delete');


Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home');
