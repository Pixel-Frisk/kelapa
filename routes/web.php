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

Route::get('/login', 'AuthController@login');
Route::post('/postLogin', 'AuthController@postLogin');

Route::get('/pedagang', 'UserController@pedagang');
Route::post('/users/createPB', 'UserController@createPB');
Route::get('/users/{id}/editPB', 'UserController@editPB');
Route::post('/users/{id}/updatePB', 'UserController@updatePB');
Route::get('/users/{id}/delete', 'UserController@delete');
Route::get('/sopir', 'UserController@sopir');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
