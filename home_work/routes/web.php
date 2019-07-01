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
Route::get('/index','PageController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test-login',function (){
    return view('login.login');
});
Route::get('/level/{idLevel}','PageController@getDescLevel')->name('getDesc');

Route::get('/method/{idTemplate}/{idLevel}','PageController@getMethods');

Route::get('/suggest/{idTemplate}/{idLevel}','PageController@getSuggest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/admin', 'AdminController@login');

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
    Route::match(['get', 'post'], '/admin/list', 'AdminController@list');
    Route::post('/admin/listProducts', 'AdminController@listProducts');
    Route::get('/admin/edit/{id}', 'AdminController@edit');
    Route::post('/admin/editProduct/{id}', 'AdminController@editProduct');
    Route::get('/admin/delete/{id}', 'AdminController@deleteProduct');
    Route::match(['get', 'post'], '/admin/customer', 'AdminController@customer');
    Route::post('/admin/listCustomer', 'AdminController@listCustomer');
    Route::get('/admin/ordersShipped', 'AdminController@ordersShipped');
    Route::match(['get', 'post'], '/admin/ordersPending', 'AdminController@ordersPending');
    Route::get('admin/actionShip/{id}', 'AdminController@actionShip');
});
Route::get('/logout', 'AdminController@logout');
