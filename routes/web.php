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

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');
Route::resource('chat', 'ChatController');
Route::resource('posts', 'PostController');

Route::patch('read', function()
{
	if (request()->ajax()) {
		$notifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\PostPublished');
	    foreach ($notifications as $notification) {
	        $notification->markAsRead();
	    }
	    return auth()->user()->unreadNotifications->where('type', 'App\Notifications\PostPublished');
	}
});
Route::get('chat/create/{id}',['as' => 'chat.create', 'uses' => 'ChatController@create']);
Route::post('chat/select/',['as' => 'chat.select', 'uses' => 'PagesController@select']);

Route::get('/home', 'HomeController@index')->name('home');
