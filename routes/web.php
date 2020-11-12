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
Route::get('/', function(){
  return view('home');
});
Route::get('/login', 'AuthController@login_t')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','CheckStatus:admin']],function(){
  Route::get('/pedagang', 'UserController@getDataPB');
  Route::post('/users/createPB', 'UserController@createPB');
  Route::get('/users/{id}/edit', 'UserController@edit');
  Route::post('/users/{id}/update', 'UserController@update');
  // Route::get('/users/{id}/delete', 'UserController@delete');
  Route::get('/sopir', 'UserController@getDataSopir');
  Route::post('/users/createSopir', 'UserController@createSopir');
});

Route::group(['middleware' => ['auth','CheckStatus:admin,pedagang,sopir']],function(){
  Route::get('/profile/{id}', 'HomeController@profile');
  Route::get('/dashboard', 'HomeController@dashboard');
});

Route::group(['middleware' => ['auth','CheckStatus:pedagang']],function(){
  Route::get('/sop/{id}', 'PBController@sopir');
});

Route::group(['middleware' => ['auth','CheckStatus:sopir']],function(){
  Route::get('/ped/{id}', 'SopirController@pedagang');
});
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
