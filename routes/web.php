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
/*
Route::get('test', function(){
	$user = new App\User;
	$user->name = 'DanielUser';
	$user->email = 'Usuario@gmail.com';
	$user->password = bcrypt('123123');
	$user->save();

	return $user;
});
*/

/*
App\User::create([
	'name' => 'Daniel',
	'email' => 'rated@gmail.com',
	'password' => bcrypt('qwerty')
]);
*/

/*
App\Role::create([
	'name' => 'estudiante',
	'display_name' => 'Estudiante ',
	'description' => 'Este role tiene los permisos de estudiante',
]);
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
/*
Route::get('contactanos', ['as'=>'contacto', 'uses' => 'PagesController@contact']);

Route::post('contacto', 'PagesController@mensajes');

Route::get('mensajes', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);
Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);
Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);
