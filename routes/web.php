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

Route::post('/user/test-creado','Crear@test')
->middleware('auth');

Route::post('/user/apunte-creado','Crear@apunte')
->middleware('auth');

Route::post('/user/entrada-creada','Crear@entrada')
->middleware('auth');

Route::get('/buscar', 'PagesController@usuario');
Route::get('/user/red-social', 'RedSocialController@usuario');
Route::get('/buscar-preparador', 'PagesController@usuario');
Route::get('/red-social/buscar-usuario','RedSocialController@buscar');
Route::post('/user/anadir-preparador','PeticionesController@anadir')
->middleware('auth');

Route::post('/user/aceptar-peticion','PeticionesController@aceptar')
->middleware('auth');
Route::post('/user/eliminar-profesor','PeticionesController@eliminar')
->middleware('auth');
Route::post('/user/enviar-mensaje','MensajesController@enviar')
->middleware('auth');
Route::post('/red-social/follow','RedSocialController@follow');
Route::post('/red-social/unfollow','RedSocialController@unfollow');
Route::post('/red-social/crear-post','RedSocialController@post');
Route::get('/user/red-social/{id}','RedSocialController@show');
Route::post('/user/red-social/subir-portada','RedSocialController@portada');
Route::post('paypal','PaymentController@payWithpaypal');
Route::get('status', [ 'as' => 'status', 'uses' => 'PaymentController@getPaymentStatus']);




