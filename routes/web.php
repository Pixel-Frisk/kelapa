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
Route::post('/postLogin', 'AuthController@Post_Login');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkUserRole:admin']],function(){
  Route::get('/pedagang', 'AdminController@ListPb');
  Route::get('/searchPB', 'AdminController@searchPB');
  Route::post('/users/createPB', 'AdminController@createPb');
  Route::get('/users/{id}/edit', 'AdminController@edit');
  Route::get('/users/{id}/detail', 'AdminController@detail');
  Route::post('/users/{id}/update', 'AdminController@update');
  // Route::get('/users/{id}/delete', 'UserController@delete');
  Route::get('/sopir', 'AdminController@listSopir');
  Route::get('/searchSopir', 'AdminController@searchSopir');
  Route::post('/users/createSopir', 'AdminController@createSopir');
  Route::get('/transaksi', 'AdminController@transaksi');
  Route::post('/transaksi/create', 'AdminController@transaksiCreate');
  Route::get('/editPenjualan/{id}', 'AdminController@editPenjualan');
  Route::get('/editPembelian/{id}', 'AdminController@editPembelian');
  Route::post('/updatePenjualan/{id}', 'AdminController@updatePenjualan');
  Route::post('/updatePembelian/{id}', 'AdminController@updatePembelian');
  Route::get('/stok', 'AdminController@stok');
  Route::get('/editStok/{id}', 'AdminController@editStok');
  Route::post('/updateStok/{id}', 'AdminController@updateStok');
});

Route::group(['middleware' => ['auth','checkUserRole:admin,pedagang,sopir']],function(){
  Route::get('/profilPB/{id}', 'PbController@profil');
  Route::get('/profilSopir/{id}', 'SopirController@profil');
  Route::get('/dashboard', 'HomeController@dashboard');
});

Route::group(['middleware' => ['auth','checkUserRole:pedagang']],function(){
  Route::get('/sop/{id}', 'PbController@sopir');
});

Route::group(['middleware' => ['auth','checkUserRole:sopir']],function(){
  Route::get('/ped/{id}', 'SopirController@pb');
});
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
