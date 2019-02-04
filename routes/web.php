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

Route::get('roles', function(){
	return App\Role::with('user')->get();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);


Route::get('saludos/{nombre?}', ['as' => 'saludos','uses' => 'PagesController@saludo'])->where("nombre", "[A-Za-z]+");

Route::get('login', ['as'=> 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as'=> 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as'=> 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');
Route::resource('chat', 'ChatController');
Route::get('chat/create/{id}',['as' => 'chat.create', 'uses' => 'ChatController@create']);