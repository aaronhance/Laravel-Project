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

Route::get('/', 'HomeController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('/information', 'HomeController@information')->middleware('auth');
//need post

Route::get('services/servers', 'ServiceController@servers')->middleware('auth');
Route::get('services/servers/{server}', 'ServiceController@server')->middleware('auth');


//admin

Route::get('/admin/clients', 'AdminController@clients');
Route::get('/admin/clients/{client}', 'AdminController@client');
Route::get('/admin/servers', 'AdminController@servers');
Route::get('/admin/servers/new', 'AdminController@newServer');
Route::post('/admin/servers/new', 'AdminController@createServer');

//dev 
Route::get('/test', 'HomeController@test');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);