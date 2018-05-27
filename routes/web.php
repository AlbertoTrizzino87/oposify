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
Route::get('/user','PagesController@usuario');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/user/curso-creado','Crear@curso')
->middleware('auth');

Route::post('/user/video-creado','Crear@video')
->middleware('auth');

Route::post('/user/tema-creado','Crear@tema')
->middleware('auth');





