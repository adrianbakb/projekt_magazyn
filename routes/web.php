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
Auth::routes();
//routes dla funkcji Produkty
Route::group(['middleware' => 'auth'], function () {
  Route::get('/product/edit/{id}','App\Http\Controllers\ProductController@edit');                 //formularz edycji rekordu
  Route::post('/product/edit/','App\Http\Controllers\ProductController@editStore');               //zapisywanie edytowanych danych
  Route::get('/product/create','App\Http\Controllers\ProductController@create');                  //formularz dodawania rekordu
  Route::post('/product','App\Http\Controllers\ProductController@store');                         //zapisywanie dodanego rekordu
  Route::get('/product/', 'App\Http\Controllers\ProductController@index');                        //dane z tabeli w formie listy
  Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show');                     //szczegóły wybranego rekordu
  Route::get('/product/magazine/{id}', 'App\Http\Controllers\ProductController@listByMagazine');  //"id" magazynu dla danego produktu
  Route::get('/product/delete/{id}', 'App\Http\Controllers\ProductController@delete');            //usuwanie rekordu
});

//routes dla funkcji Magazyny
Route::group(['middleware' => 'auth'], function () {
  Route::get('/magazine/edit/{id}','App\Http\Controllers\MagazineController@edit');
  Route::post('/magazine/edit/','App\Http\Controllers\MagazineController@editStore');
  Route::get('/magazine/create','App\Http\Controllers\MagazineController@create');
  Route::post('/magazine','App\Http\Controllers\MagazineController@store');
  Route::get('/magazine/', 'App\Http\Controllers\MagazineController@index');
  Route::get('/magazine/{id}', 'App\Http\Controllers\MagazineController@show');
  Route::get('/magazine/delete/{id}', 'App\Http\Controllers\MagazineController@delete');
});

//routes login
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});
//routes panel uzytkownika
Route::group(['middleware' => 'auth'], function () {
	Route::resource('/user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit');
	Route::put('/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
