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


//Authentication
Auth::routes();
Route::get('/home', 'Admin\HomeController@index');
Route::get('/admin/home', 'Admin\HomeController@index');
Route::get('/admin/change', 'Admin\HomeController@change');
Route::post('/admin/change_password', 'Admin\HomeController@change_password');

//Satuan
Route::get('/admin/satuan', 'Admin\SatuanController@read');
Route::get('/admin/satuan/add', 'Admin\SatuanController@add');
Route::post('/admin/satuan/create', 'Admin\SatuanController@create');
Route::get('/admin/satuan/edit/{id}', 'Admin\SatuanController@edit');
Route::post('/admin/satuan/update/{id}', 'Admin\SatuanController@update');
Route::get('/admin/satuan/delete/{id}', 'Admin\SatuanController@delete');

//Jenis
Route::get('/admin/jenis_produk', 'Admin\JenisController@read');
Route::get('/admin/jenis_produk/add', 'Admin\JenisController@add');
Route::post('/admin/jenis_produk/create', 'Admin\JenisController@create');
Route::get('/admin/jenis_produk/edit/{id}', 'Admin\JenisController@edit');
Route::post('/admin/jenis_produk/update/{id}', 'Admin\JenisController@update');
Route::get('/admin/jenis_produk/delete/{id}', 'Admin\JenisController@delete');

//Banner
Route::get('/admin/banner', 'Admin\BannerController@read');
Route::get('/admin/banner/add', 'Admin\BannerController@add');
Route::post('/admin/banner/create', 'Admin\BannerController@create');
Route::get('/admin/banner/edit/{id}', 'Admin\BannerController@edit');
Route::post('/admin/banner/update/{id}', 'Admin\BannerController@update');
Route::get('/admin/banner/delete/{id}', 'Admin\BannerController@delete');

//Client
Route::get('/admin/client', 'Admin\ClientController@read');
Route::get('/admin/client/add', 'Admin\ClientController@add');
Route::post('/admin/client/create', 'Admin\ClientController@create');
Route::get('/admin/client/edit/{id}', 'Admin\ClientController@edit');
Route::post('/admin/client/update/{id}', 'Admin\ClientController@update');
Route::get('/admin/client/delete/{id}', 'Admin\ClientController@delete');

//Produk
Route::get('/admin/produk', 'Admin\ProdukController@read');
Route::get('/admin/produk/add', 'Admin\ProdukController@add');
Route::post('/admin/produk/create', 'Admin\ProdukController@create');
Route::get('/admin/produk/edit/{id}', 'Admin\ProdukController@edit');
Route::post('/admin/produk/update/{id}', 'Admin\ProdukController@update');
Route::get('/admin/produk/delete/{id}', 'Admin\ProdukController@delete');
