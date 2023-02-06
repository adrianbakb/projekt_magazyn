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

//routes dla funkcji Kontrahenci
Route::group(['middleware' => 'auth'], function () {
  Route::get('/client/edit/{id}','App\Http\Controllers\ClientController@edit');
  Route::post('/client/edit/','App\Http\Controllers\ClientController@editStore');
  Route::get('/client/create','App\Http\Controllers\ClientController@create');
  Route::post('/client','App\Http\Controllers\ClientController@store');
  Route::get('/client/', 'App\Http\Controllers\ClientController@index');
  Route::get('/client/{id}', 'App\Http\Controllers\ClientController@show');
  Route::get('/client/delete/{id}', 'App\Http\Controllers\ClientController@delete');
});

//routes dla funkcji Przyjęcia
Route::group(['middleware' => 'auth'], function () {
  Route::get('/order/edit/{id}','App\Http\Controllers\OrderController@edit');
  Route::post('/order/edit/','App\Http\Controllers\OrderController@editStore');
  Route::get('/order/create','App\Http\Controllers\OrderController@create');
  Route::post('/order','App\Http\Controllers\OrderController@store');
  Route::get('/order/', 'App\Http\Controllers\OrderController@index');
  Route::get('/order/{id}', 'App\Http\Controllers\OrderController@report');
  Route::get('pdf', 'App\Http\Controllers\OrderController@pdf');
  Route::get('/order/delete/{id}', 'App\Http\Controllers\OrderController@delete');
});

//routes dla funkcji Wydania
Route::group(['middleware' => 'auth'], function () {
  Route::get('/issue/edit/{id}','App\Http\Controllers\IssueController@edit');
  Route::post('/issue/edit/','App\Http\Controllers\IssueController@editStore');
  Route::get('/issue/create','App\Http\Controllers\IssueController@create');
  Route::post('/issue','App\Http\Controllers\IssueController@store');
  Route::get('/issue/', 'App\Http\Controllers\IssueController@index');
  Route::get('/issue/{id}', 'App\Http\Controllers\IssueController@report');
  Route::get('/issue/delete/{id}', 'App\Http\Controllers\IssueController@delete');
});
//routes documents
Route::group(['middleware' => 'auth'], function () {
  Route::get('/documents/','App\Http\Controllers\DocumentsController@index');
  Route::get('/documents/listPZ','App\Http\Controllers\DocumentsController@indexPZ');
  Route::get('/documents/listWZ','App\Http\Controllers\DocumentsController@indexWZ');
});

//routes usermanagment
Route::group(['middleware' => 'auth'], function () {
  Route::get('/users/','App\Http\Controllers\UserManagment@index');
  Route::get('/users/edit/{id}','App\Http\Controllers\UserManagment@edit');
  Route::post('/users/edit/','App\Http\Controllers\UserManagment@editStore');
  Route::get('/users/create','App\Http\Controllers\UserManagment@create');
  Route::post('/users','App\Http\Controllers\UserManagment@store');
  Route::get('/users/delete/{id}', 'App\Http\Controllers\UserManagment@delete');
});

//routes login
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});
